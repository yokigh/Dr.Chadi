@extends('admin.layout.app')
@section('title', 'about')
@section('header')

    <!-- DataTables -->
    <link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ __('pages.about') }}</h4>
                    <p class="card-title-desc">{{ __('pages.text_about') }}</p>
                    <a href="{{ route('abouts.create', ['lang' => app()->getLocale()]) }}">
                        <button class="btn btn-primary waves-effect waves-light">{{ __('pages.create_about') }}</button>
                    </a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.description') }}</th>
                                <th>{{ __('messages.image') }}</th>
                                <th>{{ __('messages.images') }}</th>
                                <th>{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <td>{{ $about->{'name_' . app()->getLocale()} ?? $about->name_en }}</td>
                                    <td>{!! $about->{'desc_' . app()->getLocale()} ?? $about->desc_en !!}</td>
                                    <td>
                                        @if ($about->image)
                                            <a href="{{ asset($about->image) }}" data-fancybox="gallery">
                                                <img src="{{ asset($about->image) }}" width="50" class="image-preview"
                                                    alt="Event Image" />
                                            </a>
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>

                                        @if (!empty($about->images))
                                            @php
                                                $images = is_array($about->images)
                                                    ? $about->images
                                                    : json_decode($about->images, true);
                                            @endphp

                                            @foreach ($images as $image)
                                                <a href="{{ asset($image) }}" data-fancybox="gallery">
                                                    <img src="{{ asset($image) }}" width="50" class="image-preview"
                                                        alt="Event Image" />
                                                </a>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('abouts.show', ['lang' => app()->getLocale(), 'about' => $about->id]) }}"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('abouts.edit', ['lang' => app()->getLocale(), 'about' => $about->id]) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="delete-form-{{ $about->id }}"
                                            action="{{ route('abouts.destroy', ['about' => $about->id, 'lang' => app()->getLocale()]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="confirmDelete({{ $about->id }})">
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
    <script>
        function confirmDelete(aboutId) {
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
                    document.getElementById(`delete-form-${aboutId}`).submit();
                } else {
                    Swal.fire("تم الإلغاء", "لم يتم حذف السلايدر", "info");
                }
            });
        }

        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'about Image',
                showConfirmButton: false,
                padding: '20px',
            });
        }
    </script>
@endsection
