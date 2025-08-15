@extends('dashboard.index')

@section('title', 'Edit Order')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h4>Order #{{ $order->number }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
            <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
            <p><strong>Address:</strong> {{ $order->delivery_address }}</p>
            <p><strong>Date:</strong> {{ $order->created_at }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-info text-dark">{{ ucfirst($order->state->name) }}</span>
            </p>
            @include('common.errors')
            <form action="{{ route('dashboard.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <label for="status">Update Status</label>
                <select name="status" id="status" class="form-select">
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $order->state_id == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Products in Order</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderDetail as $detail)
                    <tr>
                        <td>{{ $detail->product->name ?? 'N/A' }}</td>
                        <td>{{ $detail->price }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>{{ $detail->price * $detail->qty}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
