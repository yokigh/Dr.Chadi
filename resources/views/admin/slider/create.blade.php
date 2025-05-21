@extends('admin.layout.app')
@section('title', __('pages.Create Slider'))
@section('header')
    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>

@endsection
@section('content')

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonText: 'حسناً'
                });
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'نجاح!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'موافق'
                });
            });
        </script>
    @endif

    <form action="{{ route('sliders.store', ['lang' => app()->getLocale()]) }}" method="POST" enctype="multipart/form-data"
        class="row">
        @csrf
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.Create Slider') }}</h4>
                    @php
                        $languages = ['en', 'ar'];
                    @endphp

                    @foreach ($languages as $lang)
                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.title') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name_{{ $lang }}" value="">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.desc') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="desc_{{ $lang }}" name="desc_{{ $lang }}"></textarea>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="image">{{ __('messages.slider_image') }}</label>
                        <div id="drop-area" class="drop-area">
                            <p>{{ __('messages.drag_drop_image') }}</p>
                            <input type="file" name="image" id="image" class="form-control" style="display: none;">
                            <img id="image-preview"
                                src="{{ isset($slider) && $slider->image ? asset('storage/' . $slider->image) : '#' }}"
                                alt="Image Preview"
                                style="{{ isset($slider) && $slider->image ? 'display: block; margin-top: 10px; max-width: 100%;' : 'display: none;' }}">
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-primary waves-effect waves-light">{{ __('pages.create_slider') }}</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('script')

    <style>
        .drop-area {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }

        .drop-area.hover {
            border-color: #333;
        }
    </style>

    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('hover'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('hover'), false);
        });

        dropArea.addEventListener('drop', handleDrop, false);
        dropArea.addEventListener('click', () => fileInput.click());

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            if (files.length) {
                const file = files[0];
                fileInput.files = files;
                displayImage(file);
            }
        }

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                displayImage(file);
            }
        });

        function displayImage(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }

    </script>
    <script>
    tinymce.init({
        selector: 'textarea[id^="desc_"]', // Targets desc_en and desc_ar
        plugins: 'link image code lists',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        height: 300,
        directionality: '{{ app()->getLocale() === "ar" ? "rtl" : "ltr" }}',
        language: '{{ app()->getLocale() }}',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save(); // Updates the textarea content on change
            });
        }
    });
</script>

@endsection
