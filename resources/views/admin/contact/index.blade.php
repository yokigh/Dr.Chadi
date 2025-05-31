@extends('admin.layout.app')
@section('title', 'Contacts')

@section('content')
    <div class="container">
        <h4 class="mb-3">{{ __('pages.contactlist') }}</h4>
        <a href="{{ route('contacts.create', ['lang' => app()->getLocale()]) }}"
            class="btn btn-primary mb-3">{{ __('pages.createcontact') }}</a>

        <table class="table table-bordered">
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
                        <td><a href="{{ $contact->location_url }}" target="_blank">View Map</a></td>
                        <td><a href="{{ $contact->facebook_link }}" target="_blank">Facebook</a></td>
                        <td><a href="{{ $contact->instagram_link }}" target="_blank">Instagram</a></td>
                        <td>
                            <a href="{{ route('contacts.edit', ['lang' => app()->getLocale(), 'contact' => $contact->id]) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form id="delete-form-{{ $contact->id }}"
                                action="{{ route('contacts.destroy', ['lang' => app()->getLocale(), 'contact' => $contact->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $contact->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This contact will be deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
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
