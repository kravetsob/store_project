@extends('dashboard.index')

@section('title', 'Orders')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Orders</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
            <tr>
                <th>Number</th>
                <th>Date</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $item)
                <tr>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->state->name}}
                    <td class="text-center">
                        <a href="{{ route('dashboard.orders.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No orders found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
