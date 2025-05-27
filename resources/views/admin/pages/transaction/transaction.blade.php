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
        <h6 class="fw-semibold mb-0">Transaction Table</h6>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i> <a
                        href="{{ route('transaction.add') }}">Create
                        Transaction</a></button>
            </div>
        </div>

        <div class="card overflow-auto">
            <div class="card-body">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Transaction Code</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Check-in Date</th>
                            <th scope="col">Check-out Date</th>
                            {{-- <th scope="col">Total Campsite Price</th>
                        <th scope="col">Total Addons Price</th>
                        <th scope="col">Total People Entry Price</th> --}}
                            <th scope="col">Create at</th>
                            <th scope="col">Upload at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>
                                    {{ $data->transaction_code }}
                                </td>
                                <td>
                                    {{ $data->transaction_date }}
                                </td>
                                <td>
                                    {{ $data->payment_date }}
                                </td>
                                <td>
                                    {{ $data->payment_status }}
                                </td>
                                <td>
                                    {{ $data->customer_name }}
                                </td>
                                <td>
                                    {{ $data->checkin_date }}
                                </td>
                                <td>
                                    {{ $data->checkout_date }}
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
                                                href="{{ route('package.edit', ['id' => $data->package_code]) }}"><iconify-icon
                                                    icon="mdi:edit" class="text-xl"></iconify-icon></a>
                                            <a href="{{ route('package.destroy', ['id' => $data->package_code]) }}"
                                                class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-red">
                                                <iconify-icon icon="mdi:delete-outline" class="text-xl"></iconify-icon>
                                            </a>
                                            <button type="button"
                                                class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#transactiondetailModal-{{ $data->package_code }}"><iconify-icon
                                                    icon="mdi:eye-outline" class="text-xl"></iconify-icon></button>
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
