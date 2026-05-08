<?php

namespace App\Http\Controllers;

use App\Models\Puppy;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function index()
    {
        $favoriteIds = session()->get('favorites', []);

        if (empty($favoriteIds)) {
            $puppies = collect();
        } else {
            $puppies = Puppy::with('puppy_images')
                ->whereIn('id', $favoriteIds)
                ->get()
                ->sortBy(function ($puppy) use ($favoriteIds) {
                    return array_search($puppy->id, $favoriteIds);
                })
                ->values();
        }

        return view('front.favorites.index', compact('puppies'));
    }

    public function toggle(Request $request, Puppy $puppy)
    {
        $favoriteIds = session()->get('favorites', []);

        if (in_array($puppy->id, $favoriteIds)) {
            $favoriteIds = array_values(array_filter($favoriteIds, function ($favoriteId) use ($puppy) {
                return $favoriteId !== $puppy->id;
            }));
            $message = 'Puppy removed from favorites';
        } else {
            $favoriteIds[] = $puppy->id;
            $favoriteIds = array_values(array_unique($favoriteIds));
            $message = 'Puppy added to favorites';
        }

        session()->put('favorites', $favoriteIds);

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'Success',
                'icon' => 'success',
                'message' => $message,
                'favoritesCount' => count($favoriteIds),
                'isFavorited' => in_array($puppy->id, $favoriteIds),
            ]);
        }

        return redirect()->back()->with('success', $message);
    }
}
