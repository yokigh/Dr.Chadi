@extends('admin.layout.app')
@section('title', 'Condition')

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
                    <h4 class="header-title">{{ __('pages.conditions') }}</h4>
                    <p class="card-title-desc">{{ __('pages.text_conditions') }}</p>
                    <a href="{{ route('conditions.create', ['lang' => app()->getLocale()]) }}">
                        <button class="btn btn-primary waves-effect waves-light">{{ __('pages.create_condition') }}</button>
                    </a>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('pages.name') }}</th>
                                <th>{{ __('pages.desc') }}</th>
                                <th>{{ __('pages.img') }}</th>
                                <th>{{ __('pages.images') }}</th>
                                <th>{{ __('pages.video') }}</th>
                                <th>{{ __('pages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conditions as $condition)
                                <tr>
                                    <td>{{ $condition->{'name_' . app()->getLocale()} }}</td>
                                    <td>{!! $condition->{'desc_' . app()->getLocale()} !!}</td>
                                    {{-- Single image --}}
                                    <td>
                                        @if ($condition->image)
                                            <img src="{{ asset($condition->image) }}" alt="Condition Image"
                                                class="avatar-sm"
                                                onclick="showImageModal('{{ asset($condition->image) }}')"
                                                style="cursor: pointer;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>

                                    {{-- Image gallery --}}
                                    <td>
                                        @php
                                            $gallery = is_string($condition->images)
                                                ? json_decode($condition->images, true)
                                                : $condition->images;
                                        @endphp

                                        @if (is_array($gallery) && count($gallery) > 0)
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($gallery as $img)
                                                    <img src="{{ asset($img) }}" alt="Gallery Image" width="50"
                                                        height="50" class="rounded cursor-pointer"
                                                        onclick="showImageModal('{{ asset($img) }}')" />
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted">No Gallery</span>
                                        @endif

                                    </td>

                                    {{-- Video --}}
                                    <td>
                                        @if ($condition->video)
                                            <video width="150" controls>
                                                <source src="{{ asset($condition->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <span class="text-muted">No Video</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('conditions.edit', ['lang' => app()->getLocale(), 'condition' => $condition->id]) }}"
                                            class="btn btn-warning">{{ __('pages.edit') }}</a>

                                        <form id="delete-form-{{ $condition->id }}"
                                            action="{{ route('conditions.destroy', ['lang' => app()->getLocale(), 'condition' => $condition->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <a href="javascript:void(0);" onclick="confirmDelete({{ $condition->id }})"
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        function confirmDelete(conditionId) {
            Swal.fire({
                title: "{{ __('messages.are_you_sure') }}",
                text: "{{ __('messages.confirm_delete_text') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "{{ __('messages.yes_delete') }}",
                cancelButtonText: "{{ __('messages.cancel') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${conditionId}`).submit();
                } else {
                    Swal.fire("{{ __('messages.cancelled') }}", "{{ __('messages.not_deleted') }}", "info");
                }
            });
        }

        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'Condition Image',
                showConfirmButton: false,
                padding: '20px',
            });
        }
    </script>
@endsection
