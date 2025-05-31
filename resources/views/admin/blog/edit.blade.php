@extends('admin.layout.app')

@section('title', __('pages.edit_blog'))

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

    <form action="{{ route('blogs.update', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}" method="POST"
        enctype="multipart/form-data" class="row">
        @csrf
        @method('PUT')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.edit_blog') }}</h4>

                    @foreach (['en', 'ar'] as $lang)
                        <div class="form-group">
                            <label for="name_{{ $lang }}">{{ __('messages.name') }}
                                ({{ strtoupper($lang) }}):</label>
                            <input type="text" class="form-control" name="name_{{ $lang }}"
                                id="name_{{ $lang }}" value="{{ old('name_' . $lang, $blog->{'name_' . $lang}) }}">
                            @error('name_' . $lang)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    @foreach (['en', 'ar'] as $lang)
                        <div class="form-group">
                            <label for="desc_{{ $lang }}">{{ __('messages.description') }}
                                ({{ strtoupper($lang) }}):</label>
                            <textarea class="form-control" name="desc_{{ $lang }}" id="desc_{{ $lang }}">{!! old('desc_' . $lang, $blog->{'desc_' . $lang}) !!}</textarea>
                            @error('desc_' . $lang)
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    {{-- Uploaded Files Preview --}}
                    @if (!empty($blog->files))
                        <div class="form-group">
                            <label>{{ __('pages.current_files') }}</label>
                            <div class="row">
                                @foreach ($blog->files as $file)
                                    <div class="col-md-4 mb-2">
                                        @if (in_array($blog->type, ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'svg', 'webp']))
                                            <img src="{{ asset($file) }}" class="img-fluid rounded" alt="File">
                                        @elseif ($blog->type === 'pdf')
                                            <a href="{{ asset($file) }}" target="_blank"
                                                class="btn btn-outline-primary w-100">
                                                <i class="fas fa-file-pdf"></i> PDF
                                            </a>
                                        @else
                                            <video src="{{ asset($file) }}" controls class="w-100 rounded"></video>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- File Upload --}}
                    <div class="form-group mb-3 row">
                        <label class="col-md-2 col-form-label">{{ __('pages.add_more_files') }}</label>
                        <div class="col-md-10">
                            <input type="file" name="files[]" class="form-control" multiple>
                            <small class="form-text text-muted">
                                {{ __('pages.allowed_file_types') }}: jpg, jpeg, png, bmp, gif, svg, webp, mp4, mov, avi,
                                pdf (max: 20MB per file)
                            </small>
                        </div>
                    </div>

                    @error('files')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    @error('files.*')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-success waves-effect waves-light">
                        {{ __('pages.update') }}
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
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    </script>

    {{-- File Type Validation --}}
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const input = document.querySelector('input[type="file"]');
            const files = input.files;

            if (files.length === 0) return;

            const allowedTypes = {
                image: ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'svg', 'webp'],
                video: ['mp4', 'mov', 'avi'],
                pdf: ['pdf']
            };

            let fileTypeGroup = null;

            for (let file of files) {
                const ext = file.name.split('.').pop().toLowerCase();
                let currentGroup = null;

                for (let group in allowedTypes) {
                    if (allowedTypes[group].includes(ext)) {
                        currentGroup = group;
                        break;
                    }
                }

                if (!currentGroup) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'نوع ملف غير مدعوم',
                        text: `الملف ${file.name} غير مسموح به.`,
                        confirmButtonText: 'حسناً'
                    });
                    return;
                }

                if (fileTypeGroup === null) {
                    fileTypeGroup = currentGroup;
                } else if (fileTypeGroup !== currentGroup) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ في أنواع الملفات',
                        text: 'يرجى اختيار نوع واحد فقط من الملفات (صور فقط أو فيديو فقط أو PDF فقط).',
                        confirmButtonText: 'حسناً'
                    });
                    return;
                }
            }
        });
    </script>
@endsection
