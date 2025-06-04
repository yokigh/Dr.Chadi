@extends('admin.layout.app')
@section('title', __('pages.edit_condition'))
@section('header')
    <style>
        .upload-area {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            transition: 0.3s ease;
            background-color: #f9f9f9;
        }

        .upload-area.dragover {
            border-color: #3b82f6;
            background-color: #eef6ff;
        }

        .upload-area input[type="file"] {
            display: none;
        }

        .preview-img {
            max-width: 100px;
            max-height: 100px;
            margin: 10px;
        }
    </style>
    <script src="{{ asset('admin/assets/libs/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('conditions.update', ['lang' => app()->getLocale(), 'condition' => $condition->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('pages.edit_condition') }}</h4>

                        <div class="row">
                            @php
                                $languages = ['en', 'ar'];
                            @endphp

                            @foreach ($languages as $lang)
                                <div class="form-group mb-3 row">
                                    <label class="col-md-2 col-form-label">{{ __('pages.title') }}
                                        ({{ strtoupper($lang) }})
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name_{{ $lang }}"
                                            value="{{ $condition->{'name_' . $lang} }}">
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <label class="col-md-2 col-form-label">{{ __('pages.desc') }}
                                        ({{ strtoupper($lang) }})</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="desc_{{ $lang }}" name="desc_{{ $lang }}">{{ $condition->{'desc_' . $lang} }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Single Image -->
                            <div class="col-md-4">
                                <label>{{ __('pages.img') }}</label>
                                <div class="upload-area" id="singleImageArea" style="cursor: pointer">
                                    <p>{{ __('pages.dragdrop') }}</p>
                                    <input type="file" name="image" id="image" accept="image/*">
                                    <div id="imagePreview">
                                        @if ($condition->image)
                                            <img src="{{ asset($condition->image) }}" class="preview-img">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Multiple Images -->
                            <div class="col-md-4">
                                <label>{{ __('pages.images') }}</label>
                                <div class="upload-area" id="galleryArea" style="cursor: pointer">
                                    <p>{{ __('pages.dragdrop') }}</p>
                                    <input type="file" name="images[]" id="images" accept="image/*" multiple>
                                    <div id="galleryPreview" class="d-flex flex-wrap">
                                        @php
                                            $gallery = is_string($condition->images)
                                                ? json_decode($condition->images, true)
                                                : $condition->images;
                                        @endphp
                                        @if (is_array($gallery))
                                            @foreach ($gallery as $img)
                                                <img src="{{ asset($img) }}" class="preview-img">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Video -->
                            <div class="col-md-4">
                                <label>{{ __('pages.video') }}</label>
                                <div class="upload-area" id="videoArea" style="cursor: pointer">
                                    <p>{{ __('pages.dragdrop') }}</p>
                                    <input type="file" name="video" id="video" accept="video/*">
                                    <div id="videoPreview">
                                        @if ($condition->video)
                                            <video src="{{ asset($condition->video) }}" controls width="150"></video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">{{ __('pages.save') }}</button>
                            <a href="{{ route('conditions.index', ['lang' => app()->getLocale()]) }}"
                                class="btn btn-secondary">{{ __('pages.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function setupDropArea(areaId, inputId, previewId, multiple = false, type = 'image') {
            const area = document.getElementById(areaId);
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            area.addEventListener('click', () => input.click());

            area.addEventListener('dragover', e => {
                e.preventDefault();
                area.classList.add('dragover');
            });

            area.addEventListener('dragleave', () => {
                area.classList.remove('dragover');
            });

            area.addEventListener('drop', e => {
                e.preventDefault();
                area.classList.remove('dragover');
                input.files = e.dataTransfer.files;
                displayPreview(e.dataTransfer.files);
            });

            input.addEventListener('change', () => {
                displayPreview(input.files);
            });

            function displayPreview(files) {
                preview.innerHTML = '';
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        if (type === 'image') {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('preview-img');
                            preview.appendChild(img);
                        } else if (type === 'video') {
                            const video = document.createElement('video');
                            video.src = e.target.result;
                            video.controls = true;
                            video.width = 150;
                            preview.appendChild(video);
                        }
                    };
                    reader.readAsDataURL(file);
                });
            }
        }

        setupDropArea('singleImageArea', 'image', 'imagePreview', false, 'image');
        setupDropArea('galleryArea', 'images', 'galleryPreview', true, 'image');
        setupDropArea('videoArea', 'video', 'videoPreview', false, 'video');
    </script>
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
