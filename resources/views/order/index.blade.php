@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Order List</h1>

    <form method="GET" action="{{ route('order.index') }}" class="mb-4">
        <label for="status" class="mr-2">Filter by status:</label>
        <select name="status" id="status" class="border border-gray-300 rounded p-2">
            <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All</option>
            <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="preparing" {{ $status == 'preparing' ? 'selected' : '' }}>Preparing</option>
            <option value="ready" {{ $status == 'ready' ? 'selected' : '' }}>Ready</option>
            <option value="delivered" {{ $status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="closed" {{ $status == 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Filter
        </button>
    </form>

    @if ($orders->isEmpty())
        <p>No orders available.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($orders as $order)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Order #{{ $order->id }}</h2>
                    <p class="text-sm text-gray-600 mb-2">Status: {{ $order->status }}</p>
                    <p class="text-sm text-gray-600 mb-2">User: {{ $order->user->name }}</p>
                    <p class="text-sm text-gray-600 mb-2">Date: {{ $order->created_at }}</p>
                    <a href="{{ route('order.show', $order->id) }}" class="text-blue-500 hover:text-blue-700">View details</a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
