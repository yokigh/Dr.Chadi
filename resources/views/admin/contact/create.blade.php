@extends('admin.layout.app')
@section('title', 'Create Contact')

@section('content')
<div class="container">
    <h4 class="mb-3">{{ __('pages.addnewcontact') }}</h4>

    <form action="{{ route('contacts.store', ['lang' => app()->getLocale()]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label>{{ __('pages.address_en') }}</label>
            <input type="text" name="address_en" class="form-control" value="{{ old('address_en') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('pages.address_ar') }}</label>
            <input type="text" name="address_ar" class="form-control" value="{{ old('address_ar') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('pages.location') }}(Google Maps)</label>
            <input type="url" name="location_url" class="form-control" value="{{ old('location_url') }}">
        </div>

        <div class="form-group">
            <label>{{ __('pages.email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('pages.phone') }}</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('pages.facebook') }}</label>
            <input type="url" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
        </div>

        <div class="form-group">
            <label>{{ __('pages.instagram') }}</label>
            <input type="url" name="instagram_link" class="form-control" value="{{ old('instagram_link') }}">
        </div>

        <button type="submit" class="btn btn-success mt-2">{{ __('pages.create') }}</button>
    </form>
</div>
@endsection
