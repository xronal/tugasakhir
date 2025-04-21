@extends('admin.layout.app')

@section('title')
    Admin Package
@endsection

@push('after-main-style')
    <link rel="stylesheet" href="{{ asset('wowdash/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/dataTables.min.css') }}">
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.table .btn-edit').click(function(e) {
                e.preventDefault();
                console.log($(this).data('id'));
                $.ajax({
                    type: "GET",
                    url: "{{ route('package.show') }}",
                    data: {
                        "id": $(this).data('id')
                    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        $('#PackageEditModal').modal('show');
                        $('#PackageEditForm [name="package_code"]').val(res.package_code);
                        $('#PackageEditForm [name="package_name"]').val(res.package_name);
                        $('#PackageEditForm [name="campsite_code"]').val(res.campsite_code);
                        $('#PackageEditForm [name="package_price"]').val(res.package_price);
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Package</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Package
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Package</li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600" data-bs-toggle="modal" data-bs-target="#PackageAddModal"><i
                        class="ri-add-line"></i> Create Package</button>
            </div>
        </div>
        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">Package Table</h5>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">
                                        No
                                    </label>
                                </div>
                            </th>
                            <th scope="col">Package Code</th>
                            <th scope="col">Package Name</th>
                            <th scope="col">Campsite Code</th>
                            <th scope="col">Package Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>
                                    {{ $data->package_code }}
                                </td>
                                <td>
                                    {{ $data->package_name }}
                                </td>
                                <td>
                                    {{ $data->campsite_code }}
                                </td>
                                <td>
                                    {{ $data->package_price }}
                                </td>
                                <td>
                                    {{ $data->created_at }}
                                </td>
                                <td>
                                    {{ $data->updated_at }}
                                </td>
                                <td>
                                    <div class="card-body p-24">
                                        <div class="d-flex flex-wrap align-items-center gap-3">
                                            <button type="button"
                                                class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-success btn-edit"
                                                data-id="{{ $data->package_code }}">
                                                <iconify-icon icon="mdi:edit" class="text-xl"></iconify-icon>
                                            </button>
                                            <a href="{{ route('package.destroy', ['id' => $data->package_code]) }}"
                                                class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-red">
                                                <iconify-icon icon="mdi:delete-outline" class="text-xl"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
