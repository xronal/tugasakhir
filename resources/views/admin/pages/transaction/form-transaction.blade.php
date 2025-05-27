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
    <script src="{{ asset('wowdash/js/full-calendar.js') }}"></script>
    <script src="{{ asset('wowdash/js/flatpickr.js') }}"></script>
    <script>
        // Campsite Transaction Table
        $('#add-row').click(function(e) {
            e.preventDefault();
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select campsite" aria-label="Default select example" >
                            <option selected>Open this select menu</option>
                            @foreach ($campsites as $data)
                                <option value="{{ $data->campsite_code }}">{{ $data->campsite_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-select ground" aria-label="Default select example" >
                            <option selected>Open this select menu</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control campsite_price" name="price[]" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                </tr>
            `;
            $('#campsite-table tbody').append(newRow);
        });

        $('#campsite-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
        $('#campsite-table').on('change', '.campsite', function(e) {
            e.preventDefault();
            // $(this).closest('tr').remove();
            var groundSelect = $(this).closest('tr').find('.ground');
            var campsite_price = $(this).closest('tr').find('.campsite_price');
            groundSelect.empty(); // Kosongkan dropdown sebelum request baru

            $.ajax({
                type: "GET",
                url: "{{ route('transaction.getGroundByCampsite') }}",
                data: {
                    "campsite_code": $(this).val()
                },
                dataType: "JSON",
                success: function(res) {
                    console.log(res);
                    groundSelect.append(
                        '<option selected disabled value="">Open this select menu</option>');

                    if (res.grounds.length > 0) {
                        res.grounds.forEach(d => {
                            groundSelect.append('<option value="' + d.ground_code + '">' +
                                d.ground_code + '</option>');
                        });
                    }
                }.bind(this)
            });

            $.ajax({
                type: "GET",
                url: "{{ route('transaction.getDetailCampsite') }}",
                data: {
                    "campsite_code": $(this).val()
                },
                dataType: "JSON",
                success: function(res) {
                    console.log(res);
                    campsite_price.val(res.weekend_price);
                }.bind(this)
            });


        });

        // Addons Transaction Table
        $('#add-row2').click(function(e) {
            e.preventDefault();
            var newRow = `
                <tr>

                    <td>
                        <select class="form-select" aria-label="Default select example" >
                            <option selected>Open this select menu</option>
                            @foreach ($items as $data)
                                <option value="{{ $data->item_code }}">{{ $data->item_name }}
                                </option>
                            @endforeach
                    </td>
                    <td><input type="text" class="form-control" name="quantity[]"></td>
                    <td><input type="text" class="form-control" name="price[]" readonly></td>
                    <td><input type="text" class="form-control" name="amount[]" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                </tr>
            `;
            $('#addons-table tbody').append(newRow);
        });

        $('#addons-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        // Person Entry Transaction Table
        $('#add-row3').click(function(e) {
            e.preventDefault();
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select" aria-label="Default select example" >
                            <option selected>Open this select menu</option>
                            @foreach ($personentry as $data)
                                <option value="{{ $data->person_entry_code }}">{{ $data->person_type }}
                                </option>
                            @endforeach
                    </td>
                    <td><input type="text" class="form-control" name="quantity[]"></td>
                    <td><input type="text" class="form-control" name="price[]" readonly></td>
                    <td><input type="text" class="form-control" name="amount[]" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                </tr>
            `;
            $('#person-table tbody').append(newRow);
        });

        $('#person-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
    </script>

    <script>
        // Flat pickr or date picker js 
        function getDatePicker(receiveID) {
            flatpickr(receiveID, {
                enableTime: true,
                dateFormat: "d/m/Y H:i",
            });
        }
        getDatePicker('#startDate');
        getDatePicker('#endDate');

        getDatePicker('#editstartDate');
        getDatePicker('#editendDate');
    </script>
    <script>
        // Flat pickr or date picker js 
        function getDatePicker(receiveID) {
            flatpickr(receiveID, {
                enableTime: true,
                dateFormat: "d/m/Y H:i",
            });
        }
        getDatePicker('#payment_date');
        getDatePicker('#transaction_date');

        getDatePicker('#editpayment_date');
        getDatePicker('#edittransaction_date');
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">New Transaction</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Transaction Code :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Package Code "
                            name="transaction_code">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Transaction Date :
                        </label>
                        <div class="col-md-6 mb-20">
                            <div class=" position-relative">
                                <input class="form-control radius-8 bg-base" id="transaction_date" type="text"
                                    placeholder="Masukkan tanggal Transaction">
                                <span
                                    class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                        icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Payment Date :
                        </label>
                        <div class="col-md-6 mb-20">
                            <div class=" position-relative">
                                <input class="form-control radius-8 bg-base" id="payment_date" type="text"
                                    placeholder="Masukkan tanggal Pembayaran">
                                <span
                                    class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                        icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Payment Status:
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Package Code "
                            name="payment_status">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Customer name :
                        </label>
                        {{-- <select class="form-select" aria-label="Default select example" name="customer_name">
                            <option selected>Open this select menu</option>
                            @foreach ($customer as $data)
                                <option value="{{ $data->customer_code }}">{{ $data->customer_name }}
                                </option>
                            @endforeach
                        </select> --}}
                        <input type="text" class="form-control radius-8" placeholder="Enter Customer Name "
                            name="customer_name">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label for="startDate"
                            class="form-label fw-semibold text-primary-light text-sm mb-8">Check-in</label>
                        <div class=" position-relative">
                            <input class="form-control radius-8 bg-base" id="startDate" type="text"
                                placeholder="Masukkan tanggal dan jam kedatangan">
                            <span
                                class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                    icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-20">
                        <label for="endDate"
                            class="form-label fw-semibold text-primary-light text-sm mb-8">Check-out</label>
                        <div class=" position-relative">
                            <input class="form-control radius-8 bg-base" id="endDate" type="text"
                                placeholder="Masukkan tanggal dan jam keluar">
                            <span
                                class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                    icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                        </div>
                    </div>

                    <div class="overflow-auto">
                        <span class="text-lg fw-semibold mb-1">Campsite Transaction</span>
                        <table class="table bordered-table mb-0" id="campsite-table">
                            <thead>
                                <tr>
                                    <th scope="col">Campsite Code</th>
                                    <th scope="col">Ground Code</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button id="add-row">Add Row</button>

                    </div>


                    <div class="overflow-auto" style="margin-top: 3.5rem;">
                        <span class="text-lg fw-semibold mb-1">Addons Transaction</span>
                        <table class="table bordered-table mb-0" id="addons-table">
                            <thead>
                                <tr>
                                    <th scope="col">Item Code</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button id="add-row2">Add Row</button>
                    </div>

                    <div class="overflow-auto" style="margin-top: 3.5rem;">
                        <span class="text-lg fw-semibold mb-1">Person Entry Transaction</span>
                        <table class="table bordered-table mb-0" id="person-table">
                            <thead>
                                <tr>
                                    <th scope="col">Person Entry Code</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button id="add-row3">Add Row</button>
                    </div>

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
