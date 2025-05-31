@extends('admin.layout.app')

@section('title', __('pages.blog_details'))

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ __('pages.blog_details') }}</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>{{ __('messages.name') }}:</strong>
                <p>{{ $blog->{'name_' . app()->getLocale()} ?? $blog->name_en }}</p>
            </div>

            <div class="mb-3">
                <strong>{{ __('messages.description') }}:</strong>
                <p>{!! $blog->{'desc_' . app()->getLocale()} ?? $blog->desc_en !!}</p>
            </div>

            <div class="mb-3">
                <strong>{{ __('messages.files') }}:</strong><br>
                @if (!empty($blog->files) && is_array($blog->files))
                    @foreach ($blog->files as $file)
                        @php
                            $ext = pathinfo($file, PATHINFO_EXTENSION);
                            $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']);
                            $isVideo = in_array($ext, ['mp4', 'mov', 'avi']);
                            $isPdf = $ext === 'pdf';
                        @endphp

                        @if ($isImage)
                            <a href="{{ asset($file) }}" data-fancybox="gallery">
                                <img src="{{ asset($file) }}" width="100" class="img-thumbnail mb-2 me-2"
                                    alt="Image" />
                            </a>
                        @elseif ($isVideo)
                            <div class="mb-2">
                                <video width="300" controls>
                                    <source src="{{ asset($file) }}" type="video/{{ $ext }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @elseif ($isPdf)
                            <div class="mb-2">
                                <a href="{{ asset($file) }}" target="_blank" class="btn btn-outline-primary">
                                    {{ __('messages.view_pdf') }}
                                </a>
                            </div>
                        @else
                            <div class="mb-2">
                                <a href="{{ asset($file) }}" target="_blank" class="btn btn-outline-secondary">
                                    {{ __('messages.view_file') }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>{{ __('messages.no_files') }}</p>
                @endif
            </div>

            <a href="{{ route('blogs.index', ['lang' => app()->getLocale()]) }}" class="btn btn-secondary">
                {{ __('messages.back') }}
            </a>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox='gallery']", {
            animated: true,
            showClass: "fancybox-zoomIn",
            hideClass: "fancybox-zoomOut",
            closeButton: "top",
        });
    </script>
@endsection
