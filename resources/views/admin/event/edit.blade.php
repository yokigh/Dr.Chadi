@extends('admin.layout.app')
@section('title', __('pages.Editevent'))
@section('header')
    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')

    {{-- Show errors --}}
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

    {{-- Show success message --}}
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

    <form action="{{ route('event.update', ['lang' => app()->getLocale(), 'event' => $event->id]) }}" method="POST"
        enctype="multipart/form-data" class="row">
        @csrf
        @method('PUT')
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.Edit event') }}</h4>

                    @php $languages = ['en', 'ar']; @endphp

                    @foreach ($languages as $lang)
                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.title') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name_{{ $lang }}"
                                    value="{{ old('name_' . $lang, $event->{'name_' . $lang}) }}">
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label class="col-md-2 col-form-label">{{ __('pages.desc') }} ({{ strtoupper($lang) }})</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="desc_{{ $lang }}" name="desc_{{ $lang }}">{{ old('desc_' . $lang, $event->{'desc_' . $lang}) }}</textarea>
                            </div>
                        </div>
                    @endforeach

                    {{-- Start Date --}}
                    <div class="form-group mb-3 row">
                        <label class="col-md-2 col-form-label">{{ __('pages.start_date') }}</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="start_date"
                                value="{{ old('start_date', $event->start_date ?? '') }}" required>
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div class="form-group mb-3 row">
                        <label class="col-md-2 col-form-label">{{ __('pages.end_date') }}</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="end_date"
                                value="{{ old('end_date', $event->end_date ?? '') }}" required>
                        </div>
                    </div>

                    {{-- Single Image Upload --}}
                    <div id="single-drop-area" class="drop-area">
                        <p>{{ __('messages.drag_drop_image') }}</p>
                        <input type="file" name="image" id="image" class="form-control" style="display: none;">
                        <img id="single-image-preview" src="{{ $event->image ? asset($event->image) : '#' }}"
                            alt="Image Preview"
                            style="{{ $event->image ? '' : 'display: none;' }} margin-top: 10px; max-width: 100%;">
                    </div>

                    {{-- Multiple Image Upload --}}
                    <div id="multi-drop-area" class="drop-area mt-4">
                        <p>{{ __('messages.drag_drop_image') }}</p>
                        <input type="file" name="images[]" id="images" class="form-control" multiple
                            style="display: none;">
                        <div id="image-preview-container" class="row mt-3">
                            @if ($event->images)
                                @foreach (json_decode($event->images, true) as $img)
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ asset($img) }}" class="img-thumbnail" style="max-width: 150px;">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        {{ __('pages.update_event') }}
                    </button>
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

        .img-thumbnail {
            max-width: 150px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 4px;
        }
    </style>

    <script>
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // SINGLE image
        const singleDropArea = document.getElementById('single-drop-area');
        const singleInput = document.getElementById('image');
        const singlePreview = document.getElementById('single-image-preview');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
            singleDropArea.addEventListener(event, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(event => {
            singleDropArea.addEventListener(event, () => singleDropArea.classList.add('hover'), false);
        });

        ['dragleave', 'drop'].forEach(event => {
            singleDropArea.addEventListener(event, () => singleDropArea.classList.remove('hover'), false);
        });

        singleDropArea.addEventListener('click', () => singleInput.click());
        singleDropArea.addEventListener('drop', (e) => {
            const file = e.dataTransfer.files[0];
            singleInput.files = e.dataTransfer.files;
            showSingleImage(file);
        });

        singleInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            showSingleImage(file);
        });

        function showSingleImage(file) {
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                singlePreview.src = e.target.result;
                singlePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        // MULTIPLE images
        const multiDropArea = document.getElementById('multi-drop-area');
        const multiInput = document.getElementById('images');
        const previewContainer = document.getElementById('image-preview-container');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
            multiDropArea.addEventListener(event, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(event => {
            multiDropArea.addEventListener(event, () => multiDropArea.classList.add('hover'), false);
        });

        ['dragleave', 'drop'].forEach(event => {
            multiDropArea.addEventListener(event, () => multiDropArea.classList.remove('hover'), false);
        });

        multiDropArea.addEventListener('click', () => multiInput.click());
        multiDropArea.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            multiInput.files = files;
            displayMultipleImages(files);
        });

        multiInput.addEventListener('change', (e) => {
            const files = e.target.files;
            displayMultipleImages(files);
        });

        function displayMultipleImages(files) {
            previewContainer.innerHTML = '';
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>

    {{-- TinyMCE --}}
    <script>
        tinymce.init({
            selector: 'textarea[id^="desc_"]',
            plugins: 'link image code lists',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
            height: 300,
            directionality: '{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}',
            language: '{{ app()->getLocale() }}',
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>
@endsection
