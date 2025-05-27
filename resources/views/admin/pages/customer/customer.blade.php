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
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Customer Table</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Customer</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i> <a
                        href="{{ route('customer.add') }}">Create Customer</a></button>
            </div>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Customer Code</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Nomor tlp</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Create at</th>
                        <th scope="col">Upload at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>
                                {{ $data->customer_code }}
                            </td>
                            <td>
                                {{ $data->customer_name }}
                            </td>
                            <td>
                                {{ $data->phone }}
                            </td>
                            <td>
                                {{ $data->user_id }}
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
                                        <a class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-success btn-edit"
                                            href="{{ route('customer.edit', ['id' => $data->customer_code]) }}"><iconify-icon
                                                icon="mdi:edit" class="text-xl"></iconify-icon></a>
                                        <a href="{{ route('customer.destroy', ['id' => $data->customer_code]) }}"
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

    {{-- @include('admin.pages.customer.modal-customer') --}}
@endsection
