@extends('admin.layout.app')

@section('title', __('pages.certificate_details'))

@section('header')
    <link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('pages.certificate_details') }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>{{ __('pages.name') }}:</strong>
                        <p>{{ $certificate->{'name_' . app()->getLocale()} ?? $certificate->name_en }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>{{ __('pages.desc') }}:</strong>
                        <p>{!! $certificate->{'desc_' . app()->getLocale()} ?? $certificate->desc_en !!}</p>
                    </div>

                    <div class="mb-3">
                        <strong>{{ __('pages.img') }}:</strong><br>
                        <img src="{{ asset($certificate->image) }}" alt="certificate image" class="img-fluid img-thumbnail"
                            style="max-width: 300px; cursor: pointer;" onclick="showImageModal('{{ asset($certificate->image) }}')">
                    </div>

                    <a href="{{ route('certificates.index', ['lang' => app()->getLocale()]) }}" class="btn btn-secondary">
                        {{ __('pages.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
    <script>
        function showImageModal(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageAlt: 'Certificate Image',
                showConfirmButton: false,
                padding: '20px',
            });
        }
    </script>
@endsection
