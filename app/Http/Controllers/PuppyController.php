<?php

namespace App\Http\Controllers;

use App\Models\Puppy;
use App\Models\PuppyImage;
use App\Models\PuppyDetails;
use App\Models\Breed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Gemini;

class PuppyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = DB::table('settings')->first();
        $puppies = Puppy::with('puppy_images')->orderBy('id','desc')->paginate(20);
        return view('front.index')->with(['puppies' => $puppies, 'settings' => $settings]);
    }

    /**
     * Display a listing of the resource.
     */
    public function shop()
    {
        $settings = DB::table('settings')->first();
        $puppies = Puppy::with('puppy_images')->orderBy('id','desc')->paginate(20);
        return view('front.shop')->with(['puppies' => $puppies, 'settings' => $settings]);
    }

    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        // $puppies = DB::table('puppies')->crossJoin('puppy_images', 'puppies.id', '=', 'puppy_images.puppy_id')->paginate(20);
        $puppies = Puppy::with('puppy_images')->orderBy('id','desc')->paginate(20);
        // dd($puppies);
        return view('back.puppy.index')->with('puppies', $puppies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Puppy::class);
        $breeds = Breed::Where('status','=', 1)->get();
        return view('back.puppy.create')->with('breeds', $breeds);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Puppy::class);

        $request->validate([
            'name' => 'required|max:255',
            'breed_id' => 'required',
          ]);

        $user = Auth::user();

         // Save its detais
         $details = $request->only([
            'Photo_Date', 'Gender', 'Size', 
            'Birth_Date', 'Color', 'Available_From', 'Available_To',
            'Champion_Bloodlines', 'Champion_Sired',
            'Vaccinations_And_Dewormings', 'Health_Certificate', 'Health_Record',
            'Health_Warranty','location',
          ]);


        //Create a new puppy
        $newPuppy = $request->only(['name', 'price', 'breed_id', 'puppyDescHtml', 'shortDescHtml', 'videoPreview']);

        $newPuppy = Puppy::create(array_merge( $newPuppy, ['user_id' => $user->id]));

        // Save the images
        $this->storeMedia($request, $newPuppy);

       

         
        $puppyDetails = PuppyDetails::create(array_merge( $details, ['puppy_id' => $newPuppy->id]));

        return Response()->json(['success' => '<strong>Success!</strong> Puppy addedd successfully <a href="/puppy/'.$newPuppy->id.'/'.$newPuppy->name.'" id="viewLink" target="_blank">View</a> ', 'url' => '/admin/puppy/new'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Puppy $puppy, Request $request)
    {
        // $this->authorize('view', $puppy);

        $puppy = Puppy::where('id', $request->id)->first();
        $puppyImages = PuppyImage::where('puppy_id', $request->id)->get();
        $puppyDetails = PuppyDetails::where('puppy_id', $request->id)->get();
        // dd($puppyimages);
        return view('front.puppy.show', ['puppy' => $puppy, 'puppyImages' => $puppyImages, 'puppyDetails' => $puppyDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puppy $puppy, Request $request)
    {
        $this->authorize('update', $puppy);
        $editPuppy = Puppy::with('puppy_images', 'puppy_details')->Where('id', $request->id)->first();
        $breeds = Breed::select('id','name', 'status')->get();

    //    foreach ($editPuppy->puppy_details as $key => $value) {
    //     $editPuppy->puppy_details->Photo_Date = $value['Photo_date'];
    //    }
        
        return view('back.puppy.edit')->with(['puppy' => $editPuppy,'breeds' => $breeds]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->authorize('update', $puppy);

        // dd($request);
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'breed_id' => 'required',
        //     'id' => 'required',
        //   ]);
        $puppy = Puppy::find($id);
        // dd($puppy->first()->user_id);

        //Create a new puppy
        $updatePuppy = request()->only(['name', 'price', 'breed_id', 'puppyDescHtml', 'shortDescHtml', 'videoPreview']);

        $updatePuppy = $puppy->update(array_merge($updatePuppy, ['user_id' => $puppy->first()->user_id]));

        // Save the images
        $this->storeMedia($request, $updatePuppy);

        // Save its detais
        $details = $request->only([
            'Photo_Date', 'Gender', 'Size', 
            'Birth_Date', 'Color', 'Available_From', 'Available_To',
            'Champion_Bloodlines', 'Champion_Sired',
            'Vaccinations_And_Dewormings', 'Health_Certificate', 'Health_Record',
            'Health_Warranty','location',
          ]);

         
        $puppyDetails = PuppyDetails::find()->whereI('puppy_id', $id);
        $puppyDetails->update($details);
        return Response()->json(['success' => '<strong>Success!</strong> Puppy Updated successfully
         <a href="/puppy/'.$updatePuppy->id.'/'.$updatePuppy->name.'" id="viewLink" target="_blank">View</a> ', 'url' => '/admin/puppy/new'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puppy $puppy, Request $request)
    {
        $this->authorize('delete', $puppy);
        $puppy = Puppy::find($request->id);
        $puppy->delete();
        return redirect()->back()
        ->with('success', 'Puppy deleted successfully');
    }

    /**
     * Uploads images to storage.
     */
    public function storeMedia(Request $request, $puppy)
    {
        $priority = -1;

        if($request->images){
           
        foreach ($request->images as $puppyimage) {
       
        $year = date('Y');
        $month = date('m');
        // $day = date('d');
        $path = "public/puppies/$year/$month/$puppy->id/";

        $imageName = time() .Str::random(5) . '.' . $puppyimage->getClientOriginalExtension();
        
        $newImage = Storage::putFileAs($path, $puppyimage, $imageName);

        $nameWithoutExt = pathinfo($newImage, PATHINFO_FILENAME);

        $link = "storage/puppies/$year/$month/$puppy->id/";

        //Save as webp copy
        Image::read(storage_path('app/'.$newImage))->save(storage_path('app/'.$path.$nameWithoutExt.".webp"));

        // Generate thumbnails
        Image::read(storage_path('app/'.$newImage))->scaleDown(284, 179)->save(storage_path('app/'.$path.$nameWithoutExt."-thumb.webp"));

        // Generate mini thumbnails
        Image::read(storage_path('app/'.$newImage))->scaleDown(150, 130)->save(storage_path('app/'.$path.$nameWithoutExt."-mini.webp"));

        $priority = $priority +1;

        $puppyimage = PuppyImage::create(['puppy_id' => $puppy->id, 'name' => $imageName, 'path' =>$path,'link' => $link, 'priority' => $priority, 'nameWithoutExt' => $nameWithoutExt]);

        
        // return response()->json([
        //     'name'          => $name,
        //     // 'original_name' => $puppyimage->getClientOriginalName(),
        // ]);
    }
    }
}

}
