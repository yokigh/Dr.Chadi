@extends('admin.layout.app')
@section('title', 'event')
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
                    <h4 class="header-title">{{ __('pages.event') }}</h4>
                    <p class="card-title-desc">{{ __('pages.text_event') }}</p>
                    <a href="{{ route('event.create', ['lang' => app()->getLocale()]) }}">
                        <button class="btn btn-primary waves-effect waves-light">{{ __('pages.create_event') }}</button>
                    </a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('pages.name') }}</th>
                                <th>{{ __('pages.desc') }}</th>
                                <th>{{ __('pages.date') }}</th>
                                <th>{{ __('pages.img') }}</th>
                                <th>{{ __('pages.imgs') }}</th>
                                <th>{{ __('pages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->{'name_' . app()->getLocale()} }}</td>
                                    <td>{!! $event->{'desc_' . app()->getLocale()} !!}</td>
                                    <td>{{ $event->{'event_date'} }}</td>
                                    <td>
                                        <img src="{{ asset($event->image) }}" alt="event Image" class="avatar-sm"
                                            onclick="showImageModal('{{ asset($event->image) }}')"
                                            style="cursor: pointer;">
                                    </td>
                                    <td>
                                        @if (!empty($event->images))
                                            @php
                                                $images = is_array($event->images)
                                                    ? $event->images
                                                    : json_decode($event->images, true);
                                            @endphp
                                            @foreach ($images as $image)
                                                <a href="{{ asset($image) }}" data-fancybox="gallery">
                                                    <img src="{{ asset($image) }}" width="50" class="image-preview"
                                                        alt="event Image" />
                                                </a>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('event.edit', ['lang' => app()->getLocale(), 'event' => $event->id]) }}"
                                            class="btn btn-warning">{{ __('pages.edit') }}</a>
                                        <form id="delete-form-{{ $event->id }}"
                                            action="{{ route('event.destroy', ['lang' => app()->getLocale(), 'event' => $event->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="javascript:void(0);" onclick="confirmDelete({{ $event->id }})"
                                            class="btn btn-danger">{{ __('pages.delete') }}</a>
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
        function confirmDelete(eventId) {
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
                    document.getElementById(`delete-form-${eventId}`).submit();
                } else {
                    Swal.fire("تم الإلغاء", "لم يتم حذف السلايدر", "info");
                }
            });
        }

        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'event Image',
                showConfirmButton: false,
                padding: '20px',
            });
        }
    </script>
@endsection