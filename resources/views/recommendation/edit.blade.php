@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Recommendation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Recommendation</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('recommendations.update', $recommendation->id) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="branch_id">Branch:</label>
                                <select id="branch_id" name="branch_id" class="form-control">
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $branch->id == $recommendation->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recommendation_name">Recommendation Name:</label>
                                <input type="text" id="recommendation_name" name="recommendation_name" class="form-control" value="{{ $recommendation->recommendation_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Dishes:</label><br>
                                @foreach ($dishes as $dish)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dish_{{ $dish->id }}" name="dishes[]" value="{{ $dish->id }}" {{ $recommendation->dishes->contains($dish->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="dish_{{ $dish->id }}">{{ $dish->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label>Beverages:</label><br>
                                @foreach ($beverages as $beverage)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="beverage_{{ $beverage->id }}" name="beverages[]" value="{{ $beverage->id }}" {{ $recommendation->beverages->contains($beverage->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="beverage_{{ $beverage->id }}">{{ $beverage->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary">Update Recommendation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
