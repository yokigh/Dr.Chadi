@extends('admin.layout.app')
@section('title', 'Create Contact')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.addnewcontact') }}</h4>
                    <p class="card-title-desc">{{ __('pages.fill_contact_info') }}</p>

                    <form action="{{ route('contacts.store', ['lang' => app()->getLocale()]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.address_en') }}</label>
                                <input type="text" name="address_en" class="form-control" value="{{ old('address_en') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.address_ar') }}</label>
                                <input type="text" name="address_ar" class="form-control" value="{{ old('address_ar') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.location') }} (Google Maps)</label>
                                <input type="url" name="location_url" class="form-control"
                                    value="{{ old('location_url') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.phone') }}</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.facebook') }}</label>
                                <input type="url" name="facebook_link" class="form-control"
                                    value="{{ old('facebook_link') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>{{ __('pages.instagram') }}</label>
                                <input type="url" name="instagram_link" class="form-control"
                                    value="{{ old('instagram_link') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">{{ __('pages.create') }}</button>
                        <a href="{{ route('contacts.index', ['lang' => app()->getLocale()]) }}"
                            class="btn btn-secondary mt-3">
                            {{ __('pages.back') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
