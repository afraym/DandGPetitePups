@extends('layouts.back')
@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
          <h4 class="card-title mb-0"> Order #{{ $order->id }}</h4>
          <a href="{{ route('admin.order.list') }}" class="btn btn-secondary btn-sm">Back to Orders</a>
        </div>
        <div class="card-body">
          @include('back.inc.alerts')
          <div class="row mb-4">
            <div class="col-md-4"><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</div>
            <div class="col-md-4"><strong>Total:</strong> ${{ number_format($order->total_price ?? 0, 2) }}</div>
            <div class="col-md-4"><strong>Created:</strong> {{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : '-' }}</div>
          </div>

          <form action="{{ route('admin.order.update', $order->id) }}" method="post" class="mb-4">
            @csrf
            @method('PATCH')
            <div class="form-row align-items-end">
              <div class="col-md-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="pending" @selected($order->status === 'pending')>Pending</option>
                  <option value="processing" @selected($order->status === 'processing')>Processing</option>
                  <option value="completed" @selected($order->status === 'completed')>Completed</option>
                  <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Update Status</button>
              </div>
            </div>
          </form>

          <h5 class="mb-3">Order Items</h5>
          <div class="table-responsive mb-0">
            <table class="table">
              <thead class="text-primary">
                <th>Image</th>
                <th>Puppy</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Line Total</th>
              </thead>
              <tbody>
                @forelse($order->orderItems as $item)
                <tr>
                  <td style="width:80px">
                    @if($item->puppy && $item->puppy->puppy_images->first())
                      <a href="/puppy/{{ $item->puppy->id }}/{{ \Illuminate\Support\Str::slug($item->puppy->name ?? '') }}" target="_blank">
                        <img src="/{{ $item->puppy->puppy_images->first()->link . $item->puppy->puppy_images->first()->nameWithoutExt }}-thumb.webp" alt="{{ $item->puppy->name }}" class="img-thumbnail" style="width:64px;height:64px;object-fit:cover" onerror="this.onerror=null;this.src='/assets/images/bg/404image.jpg'" />
                      </a>
                    @else
                      <img src="/assets/images/bg/404image.jpg" alt="no image" class="img-thumbnail" style="width:64px;height:64px;object-fit:cover" />
                    @endif
                  </td>
                  <td>
                    @if($item->puppy)
                      <a href="/puppy/{{ $item->puppy->id }}/{{ \Illuminate\Support\Str::slug($item->puppy->name ?? '') }}" target="_blank">{{ $item->puppy->name }}</a>
                    @else
                      Deleted puppy
                    @endif
                  </td>
                  <td>{{ $item->quantity }}</td>
                  <td>${{ number_format($item->price, 2) }}</td>
                  <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="4">No order items found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
