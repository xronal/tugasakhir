@extends('admin.layout.app')

@section('title')
    Admin Dashboard
@endsection

@push('after-main-style')
    <link rel="stylesheet" href="{{ asset('wowdash/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/full-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/jquery-jvectormap-2.0.5.css') }}">
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
                    url: "{{ route('campsite.show') }}",
                    data: {
                        "id": $(this).data('id')
                    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        $('#campsiteEditModal').modal('show');
                        $('#campsiteEditForm [name="campsites_code"]').val(res.campsite_code);
                        $('#campsiteEditForm [name="campsites_name"]').val(res.campsite_name);
                        $('#campsiteEditForm [name="weekday_price"]').val(res.weekday_price);
                        $('#campsiteEditForm [name="weekend_price"]').val(res.weekend_price);
                        $('#campsiteEditForm [name="description"]').val(res.description);
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Campsite</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Campsite</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600" data-bs-toggle="modal" data-bs-target="#campsiteAddModal"><i
                        class="ri-add-line"></i> Create
                    Campsite</button>
            </div>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Campsite Code</th>
                        <th scope="col">Campsite Name</th>
                        <th scope="col">Weekday Price</th>
                        <th scope="col">Weekend Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Upload at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $data->campsite_code }}
                            </td>
                            <td>
                                {{ $data->campsite_name }}
                            </td>
                            <td>
                                {{ $data->weekday_price }}
                            </td>
                            <td>
                                {{ $data->weekend_price }}
                            </td>
                            <td>
                                {{ $data->description }}
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
                                            data-id="{{ $data->campsite_code }}">
                                            <iconify-icon icon="mdi:edit" class="text-xl"></iconify-icon>
                                        </button>
                                        <a href="{{ route('campsite.destroy', ['id' => $data->campsite_code]) }}"
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

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-24">
                <span>Showing 1 to 10 of 12 entries</span>
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                            href="javascript:void(0)"><iconify-icon icon="ep:d-arrow-left"
                                class="text-xl"></iconify-icon></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-600 text-white fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                            href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                            href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                            href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                            href="javascript:void(0)"> <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('admin.pages.campsite.modal-campsite')
@endsection
