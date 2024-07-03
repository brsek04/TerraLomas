@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Recommendation
@endsection

@section('content')
    <section class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">{{ __('Edit') }} Recommendation</h2>

        @includeif('partials.errors')

        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form method="POST" action="{{ route('recommendations.update', $recommendation->id) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="branch_id" class="block text-sm font-medium text-gray-700 dark:text-white">Branch:</label>
                    <select id="branch_id" name="branch_id" class="form-select mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white">
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $branch->id == $recommendation->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="recommendation_name" class="block text-sm font-medium text-gray-700 dark:text-white">Recommendation Name:</label>
                    <input type="text" id="recommendation_name" name="recommendation_name" class="form-input mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white" value="{{ $recommendation->recommendation_name }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Dishes:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($dishes as $dish)
                            <div class="flex items-center">
                                <input class="form-checkbox" type="checkbox" id="dish_{{ $dish->id }}" name="dishes[]" value="{{ $dish->id }}" {{ $recommendation->dishes->contains($dish->id) ? 'checked' : '' }}>
                                <label class="ml-2 text-sm text-gray-700 dark:text-white" for="dish_{{ $dish->id }}">{{ $dish->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Beverages:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($beverages as $beverage)
                            <div class="flex items-center">
                                <input class="form-checkbox" type="checkbox" id="beverage_{{ $beverage->id }}" name="beverages[]" value="{{ $beverage->id }}" {{ $recommendation->beverages->contains($beverage->id) ? 'checked' : '' }}>
                                <label class="ml-2 text-sm text-gray-700 dark:text-white" for="beverage_{{ $beverage->id }}">{{ $beverage->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Recommendation
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
