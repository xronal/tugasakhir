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
                    url: "{{ route('grounds.show') }}",
                    data: {
                        "id": $(this).data('id')
                    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        $('#groundEditModal').modal('show');
                        $('#groundEditForm [name="ground_code"]').val(res.ground_code);
                        $('#groundEditForm [name="campsite_code"]').val(res.campsite_code);
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Ground Table</h6>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600" data-bs-toggle="modal" data-bs-target="#groundAddModal"><i
                        class="ri-add-line"></i> Create Ground</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Ground Code</th>
                        <th scope="col">Campsite Code</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Upload at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $data->ground_code }}
                            </td>
                            <td>
                                {{ $data->campsite_code }}
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
                                            data-id="{{ $data->ground_code }}">
                                            <iconify-icon icon="mdi:edit" class="text-xl"></iconify-icon>
                                        </button>
                                        <a href="{{ route('grounds.destroy', ['id' => $data->ground_code]) }}"
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
    @include('admin.pages.grounds.modal-ground')
@endsection
