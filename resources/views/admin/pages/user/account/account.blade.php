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
                    url: "{{ route('user.show') }}",
                    data: {
                        "id": $(this).data('id')
                    },
                    dataType: "JSON",
                    success: function(res) {
                        console.log(res);
                        $('#userEditModal').modal('show');
                        $('#userEditForm [name="user_id"]').val(res.id);
                        $('#userEditForm [name="username"]').val(res.username);
                        $('#userEditForm [name="name"]').val(res.name);
                        $('#userEditForm [name="role"]').val(res.role);
                        $('#userEditForm [name="email"]').val(res.email);
                        $('#userEditForm [name="password"]').val(res.password);
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Account User Table</h6>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600" data-bs-toggle="modal" data-bs-target="#userAddModal"><i
                        class="ri-add-line"></i> Create User Account</button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Upload at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $data->id }}
                            </td>
                            <td>
                                {{ $data->username }}
                            </td>
                            <td>
                                {{ $data->name }}
                            </td>
                            <td>
                                {{ $data->role }}
                            </td>
                            <td>
                                {{ $data->email }}
                            </td>
                            <td>
                                ***
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
                                            data-id="{{ $data->id }}">
                                            <iconify-icon icon="mdi:edit" class="text-xl"></iconify-icon>
                                        </button>
                                        <a href="{{ route('user.destroy', ['id' => $data->id]) }}"
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
                <span>
                    Showing {{ $datas->firstItem() }} to {{ $datas->lastItem() }} of {{ $datas->total() }} entries
                </span>
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Tombol Previous --}}
                    @if ($datas->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link bg-base text-secondary-light">
                                <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link bg-base text-secondary-light" href="{{ $datas->previousPageUrl() }}">
                                <iconify-icon icon="ep:d-arrow-left" class="text-xl"></iconify-icon>
                            </a>
                        </li>
                    @endif

                    {{-- Nomor Halaman --}}
                    @for ($i = 1; $i <= $datas->lastPage(); $i++)
                        <li class="page-item">
                            <a class="page-link
                    {{ $datas->currentPage() == $i ? 'bg-primary-600 text-white' : 'bg-primary-50 text-secondary-light' }}
                    fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                                href="{{ $datas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($datas->hasMorePages())
                        <li class="page-item">
                            <a class="page-link bg-base text-secondary-light" href="{{ $datas->nextPageUrl() }}">
                                <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link bg-base text-secondary-light">
                                <iconify-icon icon="ep:d-arrow-right" class="text-xl"></iconify-icon>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>

    @include('admin.pages.user.account.modal-account')
@endsection
