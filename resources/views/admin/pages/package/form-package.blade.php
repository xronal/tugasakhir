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
        $('#add-row').click(function(e) {
            e.preventDefault();
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="item_code[]">
                            <option selected>Open this select menu</option>
                            @foreach ($items as $data)
                                <option value="{{ $data->item_code }}">{{ $data->item_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="quantity[]"></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                </tr>
            `;
            $('#package-table tbody').append(newRow);
        });

        $('#package-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
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
        <div class="card-body">
            <form action="{{ route('package.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Package Code :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Package Code "
                            name="package_code">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Package Name :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Item Name "
                            name="package_name">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                        </label>
                        <select class="form-select" aria-label="Default select example" name="campsite_code">
                            <option selected>Open this select menu</option>
                            @foreach ($campsites as $data)
                                <option value="{{ $data->campsite_code }}">{{ $data->campsite_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekday Price :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Weekday Price "
                            name="weekday_price">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekend Price :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Weekend Price "
                            name="weekend_price">
                    </div>

                    <table class="table bordered-table mb-0" id="package-table">
                        <thead>
                            <tr>
                                <th scope="col">Item Code</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <button id="add-row">Add Row</button>

                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="button"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                            onclick="history.back()">
                            Back
                        </button>
                        <button type="submit"
                            class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
