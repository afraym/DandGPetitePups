@extends('layouts.back')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
          <h4 class="card-title mb-0"> Orders Table</h4>
        </div>
        <div class="card-body">
          @include('back.inc.alerts')
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Created</th>
                <th>View</th>
                <th class="text-right">Delete</th>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td>#{{ $order->id }}</td>
                  <td>{{ $order->user->name ?? 'Guest' }}</td>
                  <td>
                    ${{ number_format(
                      $order->total_price ?? $order->orderItems->sum(function($it){ return ($it->price * $it->quantity); }),
                      2
                    ) }}
                  </td>
                  <td>
                    <span class="badge badge-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'completed' ? 'success' : 'info') }} text-uppercase">
                      {{ $order->status }}
                    </span>
                  </td>
                  <td>{{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : '-' }}</td>
                  <td>
                    <a href="{{ route('admin.order.show', $order->id) }}"><button class="btn btn-info">View</button></a>
                  </td>
                  <td class="text-right">
                    <button class="btn btn-danger deleteitem" data-toggle="modal" data-target="#deleteModal" data-id="{{ $order->id }}">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{ $orders->links() }}
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        This will delete this order from database.
      </div>
      <div class="modal-footer">
        <form action="{{ route('admin.order.delete') }}" method="post">
          @csrf
          <input type="hidden" value="" id="deleteitem" name="id">
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
