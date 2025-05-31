@extends('admin.layout.app')
@section('title', 'blog')
@section('header')

    <!-- DataTables -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css') }}" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.blog') }}</h4>
                    <p class="card-title-desc">{{ __('pages.text_blog') }}</p>
                    <a href="{{ route('blogs.create', ['lang' => app()->getLocale()]) }}">
                        <button class="btn btn-primary waves-effect waves-light">{{ __('pages.create_blog') }}</button>
                    </a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.description') }}</th>
                                <th>{{ __('messages.files') }}</th>
                                <th>{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->{'name_' . app()->getLocale()} ?? $blog->name_en }}</td>
                                    <td>{!! $blog->{'desc_' . app()->getLocale()} ?? $blog->desc_en !!}</td>
                                    <td>
                                        @if (!empty($blog->files) && is_array($blog->files))
                                            @foreach ($blog->files as $file)
                                                @php
                                                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                                                    $isImage = in_array($ext, [
                                                        'jpg',
                                                        'jpeg',
                                                        'png',
                                                        'gif',
                                                        'bmp',
                                                        'svg',
                                                        'webp',
                                                    ]);
                                                    $isVideo = in_array($ext, ['mp4', 'mov', 'avi']);
                                                    $isPdf = $ext === 'pdf';
                                                @endphp

                                                @if ($isImage)
                                                    <a href="{{ asset($file) }}" data-fancybox="gallery">
                                                        <img src="{{ asset($file) }}" width="50"
                                                            class="image-preview mb-1" alt="Blog File" />
                                                    </a>
                                                @elseif ($isVideo)
                                                    <video width="120" controls class="mb-1">
                                                        <source src="{{ asset($file) }}"
                                                            type="video/{{ $ext }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @elseif ($isPdf)
                                                    <a href="{{ asset($file) }}" target="_blank"
                                                        class="btn btn-sm btn-outline-primary mb-1">
                                                        View PDF
                                                    </a>
                                                @else
                                                    <a href="{{ asset($file) }}" target="_blank"
                                                        class="btn btn-sm btn-outline-secondary mb-1">
                                                        View File
                                                    </a>
                                                @endif
                                            @endforeach
                                        @else
                                            No Files
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('blogs.show', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('blogs.edit', ['lang' => app()->getLocale(), 'blog' => $blog->id]) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete-form-{{ $blog->id }}"
                                            action="{{ route('blogs.destroy', ['blog' => $blog->id, 'lang' => app()->getLocale()]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="confirmDelete({{ $blog->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js') }}"></script>
    <script>
        function confirmDelete(blogId) {
            Swal.fire({
                title: "هل أنت متأكد؟",
                text: "لن تتمكن من التراجع عن هذا!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "نعم، احذف!",
                cancelButtonText: "إلغاء"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${blogId}`).submit();
                } else {
                    Swal.fire("تم الإلغاء", "لم يتم حذف السلايدر", "info");
                }
            });
        }

        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'blog Image',
                showConfirmButton: false,
                padding: '20px',
            });
        }
        // Initialize Fancybox
        Fancybox.bind("[data-fancybox='gallery']", {
            // Optional settings
            animated: true,
            showClass: "fancybox-zoomIn",
            hideClass: "fancybox-zoomOut",
            closeButton: "top",
        });
    </script>
@endsection
