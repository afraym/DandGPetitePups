@extends('layouts.back')
@section('content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Puppies Table</h4>
        </div>
        <div class="card-body">
          @include('back.inc.alerts')
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <th>
                  Name
                </th>
                <th>
                  Image
                </th>
                <th>
                  Edit
                </th>
                <th class="text-right">
                  Delete
                </th>
              </thead>
              <tbody>
                @foreach ($puppies as $puppy)
                <tr>
                  <td>
                    <a href="/puppy/{{ $puppy->id}}/{{ $puppy->name }}" target="_blank" rel="noopener noreferrer">{{ $puppy->name}}</a>
                  </td>
                  <td>
                    @if(!isset($puppy->puppy_images[0]))
                    <a href="/puppy/{{ $puppy->id}}/{{ $puppy->name }}" target="_blank" rel="noopener noreferrer">
                      <img src="/assets/images/bg/404image.jpg" alt="{{ $puppy->name}}" class="img-thumbnail" style="width: 20%; height:20%">
                    </a>
                    @else
                    <a href="/puppy/{{ $puppy->id}}/{{ $puppy->name }}" target="_blank" rel="noopener noreferrer">
                      <img src="/{{ $puppy->puppy_images['0']->link.$puppy->puppy_images[0]->name}}" alt="{{ $puppy->name}}" onerror="this.onerror=null; this.src='/assets/images/bg/404image.jpg'"  class="img-thumbnail" style="width: 20%; height:20%">
                    </a>
                    @endif
                  </td>
                  <td>
                    <a href="{{ Route('admin.puppy.edit', $puppy->id) }} "><button class="btn btn-info">Edit</button></a>
                  </td>
                  <td class="text-right">
                    <button class="btn btn-danger deleteitem" data-toggle="modal" data-target="#deleteModal" data-id="{{ $puppy->id }}" >Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{ $puppies->links() }}
    </div>
  </div>
</div>


<!-- The Delete Modal -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        This will delete this Puppy from database and all it's photos
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="{{ Route('admin.puppy.delete') }}" method="post">
          @csrf
          <input type="hidden" value="" id='deleteitem' name="id">
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </form>
      </div>

    </div>
  </div>
</div>

@endsection