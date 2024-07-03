@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Recommendation
@endsection

@section('content')
    <section class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">{{ __('Create') }} Recommendation</h2>

        @includeif('partials.errors')

        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form method="POST" action="{{ route('recommendations.store') }}" role="form" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="branch_id" class="block text-sm font-medium text-gray-700 dark:text-white">Branch:</label>
                        <select id="branch_id" name="branch_id" class="form-select mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white" required>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="recommendation_name" class="block text-sm font-medium text-gray-700 dark:text-white">Recommendation Name:</label>
                        <input type="text" id="recommendation_name" name="recommendation_name" class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Dishes:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($dishes as $dish)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="dish_{{ $dish->id }}" name="dishes[]" value="{{ $dish->id }}">
                                <label class="form-check-label" for="dish_{{ $dish->id }}">{{ $dish->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-white">Beverages:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($beverages as $beverage)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="beverage_{{ $beverage->id }}" name="beverages[]" value="{{ $beverage->id }}">
                                <label class="form-check-label" for="beverage_{{ $beverage->id }}">{{ $beverage->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
                    Create Recommendation
                </button>
            </form>
        </div>
    </section>
@endsection