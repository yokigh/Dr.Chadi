@extends('admin.layout.app')
@section('title', 'Contacts')

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
                    <h4 class="header-title">{{ __('pages.contactlist') }}</h4>
                    <p class="card-title-desc">{{ __('pages.text_contacts') }}</p>
                    <a href="{{ route('contacts.create', ['lang' => app()->getLocale()]) }}">
                        <button
                            class="btn btn-primary waves-effect waves-light mb-3">{{ __('pages.createcontact') }}</button>
                    </a>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width: 100%;">
                        <thead>
                            <tr>
                                <th>{{ __('pages.address_en') }}</th>
                                <th>{{ __('pages.address_ar') }}</th>
                                <th>{{ __('pages.email') }}</th>
                                <th>{{ __('pages.phone') }}</th>
                                <th>{{ __('pages.location') }}</th>
                                <th>{{ __('pages.facebook') }}</th>
                                <th>{{ __('pages.instagram') }}</th>
                                <th>{{ __('pages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->address_en }}</td>
                                    <td>{{ $contact->address_ar }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td><a href="{{ $contact->location_url }}" target="_blank">Map</a></td>
                                    <td><a href="{{ $contact->facebook_link }}" target="_blank">Facebook</a></td>
                                    <td><a href="{{ $contact->instagram_link }}" target="_blank">Instagram</a></td>
                                    <td>
                                        <a href="{{ route('contacts.edit', ['lang' => app()->getLocale(), 'contact' => $contact->id]) }}"
                                            class="btn btn-warning btn-sm">{{ __('pages.edit') }}</a>

                                        <form id="delete-form-{{ $contact->id }}"
                                            action="{{ route('contacts.destroy', ['lang' => app()->getLocale(), 'contact' => $contact->id]) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $contact->id }})">{{ __('pages.delete') }}</button>
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
        function confirmDelete(contactId) {
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
                    document.getElementById('delete-form-' + contactId).submit();
                } else {
                    Swal.fire("{{ __('messages.cancelled') }}", "{{ __('messages.not_deleted') }}", "info");
                }
            });
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endsection
