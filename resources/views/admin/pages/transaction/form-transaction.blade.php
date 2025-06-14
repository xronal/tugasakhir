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
        $('#add-row').click(function(e) {
            e.preventDefault();
            var newRow = `
                <tr>
                    <td>
                        <select class="form-select campsite" aria-label="Default select example"  name="campsite_code[]">
                            <option selected>Open this select menu</option>
                            @foreach ($campsites as $data)
                                <option value="{{ $data->campsite_code }}">{{ $data->campsite_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-select ground" aria-label="Default select example" name="ground_code[]">
                            <option selected>Open this select menu</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control campsite_price" name="campsite_price[]" readonly></td>
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
                        '<option selected value="">Open this select menu</option>');

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
            var options = $('#item-template').html();
            var newRow = `
                <tr>
                     <td>
                        <select class="form-select" name="addons_item_code[]">
                        <option selected>Open this select menu</option>
                        ${options}
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="addons_quantity[]"></td>
                    <td><input type="text" class="form-control" name="addons_price[]" readonly></td>
                    <td><input type="text" class="form-control" name="addons_amount[]" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>
                `;
            $('#addons-table tbody').append(newRow);
        });


        $('#addons-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        $('#addons-table').on('input', 'input[name="addons_quantity[]"]', function() {
            var row = $(this).closest('tr');
            var quantity = parseFloat($(this).val()) || 0;
            var price = parseFloat(row.find('input[name="addons_price[]"]').val()) || 0;
            row.find('input[name="addons_amount[]"]').val((quantity * price));
        });

        $('#addons-table').on('change', 'select', function(e) {
            var selectedOption = $(this).find('option:selected');
            var price = selectedOption.data('price') || 0;
            $(this).closest('tr').find('input[name="addons_price[]"]').val(price);
        });


        // Person Entry Transaction Table
        $('#add-row3').click(function(e) {
            e.preventDefault();
            var options = $('#personentry-template').html();
            var newRow = `
                    <tr>
                         <td>
                            <select class="form-select" name="person_entry_code[]">
                            ${options}
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="person_quantity[]"></td>
                        <td><input type="text" class="form-control" name="person_price[]" readonly></td>
                        <td><input type="text" class="form-control" name="person_amount[]" readonly></td>
                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>
                `;
            $('#person-table tbody').append(newRow);
        });

        $('#person-table').on('click', '.remove-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });


        $('#person-table').on('input', 'input[name="person_quantity[]"]', function() {
            var row = $(this).closest('tr');
            var quantity = parseFloat($(this).val()) || 0;
            var price = parseFloat(row.find('input[name="person_price[]"]').val()) || 0;
            row.find('input[name="person_amount[]"]').val((quantity * price));
        });

        $('#person-table').on('change', 'select', function(e) {
            var selectedOption = $(this).find('option:selected');
            var price = selectedOption.data('price') || 0;
            $(this).closest('tr').find('input[name="person_price[]"]').val(price);
        });
    </script>

    <script>
        function updateCampsitePricesBasedOnDate() {
            const checkinDateStr = $('#startDate').val();
            if (!checkinDateStr) return;

            const checkinDate = flatpickr.parseDate(checkinDateStr, "d/m/Y H:i");
            const isWeekend = checkinDate.getDay() === 0 || checkinDate.getDay() === 6;

            $('#campsite-table tbody tr').each(function() {
                const row = $(this);
                const campsiteSelect = row.find('.campsite');
                const campsiteCode = campsiteSelect.val();

                if (!campsiteCode) return;

                const priceInput = row.find('.campsite_price');

                $.ajax({
                    type: "GET",
                    url: "{{ route('transaction.getDetailCampsite') }}",
                    data: {
                        "campsite_code": campsiteCode
                    },
                    dataType: "JSON",
                    success: function(res) {
                        const price = isWeekend ? res.weekend_price : res.weekday_price;
                        priceInput.val(price);
                    }
                });
            });
        }


        // Trigger saat tanggal check-in berubah
        $('#startDate').on('change', updateCampsitePricesBasedOnDate);
    </script>

    <script>
        $('#startDate').change(function(e) {
            e.preventDefault();
            $('#package').trigger('change');
        });

        $('#package').change(function(e) {
            e.preventDefault();
            const checkinDateStr = $('#startDate').val();

            if ($(this).val() == "Open this select menu") {
                $('#campsite-table tbody').empty(); // Hapus campsite
                $('#addons-table tbody').empty(); // Hapus addons
                $('#package_price').val(0); // Reset harga
                $('#add-row').show();
                $('#add-row2').show();
                return;
            }

            if (!checkinDateStr) return;

            const checkinDate = flatpickr.parseDate(checkinDateStr, "d/m/Y H:i");
            const isWeekend = checkinDate.getDay() === 0 || checkinDate.getDay() === 6;

            $.ajax({
                type: "GET",
                url: "{{ route('transaction.getDetailPackage') }}",
                data: {
                    "package_code": $(this).val()
                },
                dataType: "JSON",
                success: function(res) {
                    const price = isWeekend ? res.weekly_price : res.weekday_price;
                    $('#package_price').val(price);

                    // ======== CAMPSITE ========
                    const campsite_code = res.campsite_code;
                    const campsites = @json($campsites);
                    let campsiteOptions = '';

                    campsites.forEach(data => {
                        const selected = data.campsite_code === campsite_code ? 'selected' : '';
                        campsiteOptions +=
                            `<option value="${data.campsite_code}" ${selected}>${data.campsite_name}</option>`;
                    });

                    const newCampsiteRow = `
                    <tr>
                        <td>
                            <select class="form-select campsite" name="campsite_code[]">
                                ${campsiteOptions}
                            </select>
                        </td>
                        <td>
                            <select class="form-select ground" name="ground_code[]">
                                <option selected>Open this select menu</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control campsite_price" name="campsite_price[]" readonly></td>
                        <td><button type="button" class="btn btn-danger remove-row" disabled>Remove</button></td>
                    </tr>
                `;
                    $('#campsite-table tbody').html(newCampsiteRow);
                    $('#campsite-table').find('.campsite').last().trigger('change');
                    $('#add-row').hide();

                    // ======== ADDONS (from packagedetail) ========
                    const addons = res.addons || [];
                    let addonRows = '';

                    addons.forEach(addon => {
                        addonRows += `
                        <tr>
                            <td>
                                <select class="form-select" name="addons_item_code[]">
                                    <option value="${addon.item_code}" selected>${addon.item_name}</option>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" name="addons_quantity[]" value="${addon.quantity}" readonly></td>
                            <td><input type="text" class="form-control" name="addons_price[]" value="${addon.price}" readonly></td>
                            <td><input type="text" class="form-control" name="addons_amount[]" value="${addon.amount}" readonly></td>
                            <td><button type="button" class="btn btn-danger remove-row" disabled>Remove</button></td>
                        </tr>
                    `;
                    });

                    $('#addons-table tbody').html(addonRows);
                    $('#add-row2').hide();
                }
            });
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
            <form method="POST" action="{{ route('transaction.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="row">
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Transaction Code :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Package Code "
                            name="transaction_code" value="{{ old('transaction_code') }}">
                    </div>
                    <div class="col-md-6 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Transaction Date :
                        </label>
                        <div class=" position-relative">
                            <input class="form-control radius-8 bg-base" id="transaction_date" type="text"
                                placeholder="Masukkan tanggal Transaction" name="transaction_date"
                                value="{{ old('transaction_date') }}">
                            <span
                                class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                    icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                        </div>
                    </div>

                    <div class="col-md-6 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Payment Date :
                        </label>
                        <div class=" position-relative">
                            <input class="form-control radius-8 bg-base" id="payment_date" type="text"
                                placeholder="Masukkan tanggal Pembayaran" name="payment_date"
                                value="{{ old('payment_date') }}">
                            <span
                                class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                    icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                        </div>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Payment Status:
                        </label>
                        <select class="form-select" aria-label="Default select example" name="payment_status">
                            <option selected>Pilih Status Pembayaran</option>
                            <option value="paid" {{ old('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="unpaid" {{ old('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid
                            </option>
                        </select>
                    </div>

                    <div class="col-12 mb-20">
                        <label>Customer Name</label>
                        <select class="form-select" aria-label="Default select example" name="customer_code">
                            <option selected>Pilih Nama Customer</option>
                            @foreach ($customers as $cust)
                                <option value="{{ $cust->customer_code }}"
                                    {{ old('customer_code') == $cust->customer_code ? 'selected' : '' }}>
                                    {{ $cust->customer_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-20">
                        <label for="startDate"
                            class="form-label fw-semibold text-primary-light text-sm mb-8">Check-in</label>
                        <div class=" position-relative">
                            <input class="form-control radius-8 bg-base" id="startDate" type="text"
                                placeholder="Masukkan tanggal dan jam kedatangan" name="checkin_date"
                                value="{{ old('checkin_date') }}">
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
                                placeholder="Masukkan tanggal dan jam keluar" name="checkout_date"
                                value="{{ old('checkout_date') }}">
                            <span
                                class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                    icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-20">
                        <label for="package" class="form-label fw-semibold text-primary-light text-sm mb-8">Package</label>
                        <div class=" position-relative">
                            <select class="form-select package" aria-label="Default select example" name="package_code"
                                id="package">
                                <option selected>Open this select menu</option>
                                @foreach ($packages as $data)
                                    <option value="{{ $data->package_code }}">{{ $data->package_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-20">
                        <label for="package_price" class="form-label fw-semibold text-primary-light text-sm mb-8">Package
                            Price</label>
                        <div class=" position-relative">
                            <input type="text" class="form-control package_price" name="package_price" id="package_price"
                                readonly>
                        </div>
                    </div>

                    <div class="overflow-auto" style="margin-top: 3.5rem;">
                        <span class="text-lg fw-semibold mb-1">Campsite Transaction</span>
                        <table class="table bordered-table mb-0" id="campsite-table">
                            <thead>
                                <tr>
                                    <th scope="col">Campsite Name</th>
                                    <th scope="col">Ground Code</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button id="add-row" class="btn btn-outline-primary w-auto mt-10">Add Row</button>
                    </div>


                    <div class="overflow-auto" style="margin-top: 3.5rem;">
                        <span class="text-lg fw-semibold mb-1">Addons Transaction</span>
                        <table class="table bordered-table mb-0" id="addons-table">
                            <thead>
                                <tr>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button id="add-row2" class="btn btn-outline-primary w-auto mt-10">Add Row</button>
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
                        <button id="add-row3" class="btn btn-outline-primary w-auto mt-10">Add Row</button>
                    </div>

                    {{-- select item --}}
                    <select id="item-template" class="d-none">
                        @foreach ($items as $data)
                            <option value="{{ $data->item_code }}" data-price="{{ $data->item_price }}">
                                {{ $data->item_name }}
                            </option>
                        @endforeach
                    </select>

                    {{-- select person entry type --}}
                    <select class="d-none" id="personentry-template">
                        <option selected>Open this select menu</option>
                        @foreach ($personentry as $data)
                            <option value="{{ $data->person_entry_code }}" data-price="{{ $data->price }}">
                                {{ $data->person_type }}
                            </option>
                        @endforeach
                    </select>

                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="button"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                            onclick="history.back()">
                            Back
                        </button>
                        <button class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8"
                            type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
