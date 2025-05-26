@extends('admin.layout.app')
@section('title', __('pages.CreateProduct'))

@section('header')
    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')

    {{-- Show validation errors --}}
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonText: 'حسناً'
                });
            });
        </script>
    @endif

    {{-- Show success message --}}
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'success',
                    title: 'نجاح!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'موافق'
                });
            });
        </script>
    @endif

    <form action="{{ route('product.store', ['lang' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data" class="row">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.CreateProduct') }}</h4>

                    {{-- Select Category --}}
                    <div class="form-group mb-3 row">
                        <label class="col-md-2 col-form-label">{{ __('pages.category') }}</label>
                        <div class="col-md-10">
                            <select class="form-control" name="category_id" required>
                                <option value="">{{ __('pages.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Multilingual Fields --}}
                    @php $languages = ['en', 'ar']; @endphp
                    @foreach ($languages as $lang)
                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.title') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name_{{ $lang }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.desc') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="desc_{{ $lang }}" name="desc_{{ $lang }}"></textarea>
                            </div>
                        </div>
                    @endforeach

                    {{-- Price --}}
                    <div class="form-group mb-3 row">
                        <label class="col-md-2 col-form-label">{{ __('pages.price') }}</label>
                        <div class="col-md-10">
                            <input type="number" step="0.01" class="form-control" name="price">
                        </div>
                    </div>

                    {{-- Single Image --}}
                    <div class="form-group mb-3">
                        <label>{{ __('pages.single_image') }}</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    {{-- Multiple Images --}}
                    <div class="form-group mb-3">
                        <label>{{ __('pages.multiple_images') }}</label>
                        <input type="file" class="form-control" name="images[]" multiple accept="image/*">
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary">
                        {{ __('pages.create_product') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('script')
    {{-- TinyMCE --}}
    <script>
        tinymce.init({
            selector: 'textarea[id^="desc_"]',
            plugins: 'link image code lists',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
            height: 300,
            directionality: '{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}',
            language: '{{ app()->getLocale() }}',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    </script>
@endsection
