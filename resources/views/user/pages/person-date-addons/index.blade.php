@extends('user.layout.apps')

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
    <link rel="stylesheet" href="{{ asset('wowdash/css/responsive-package.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=source_environment" />
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('wowdash/js/full-calendar.js') }}"></script>
    <script src="{{ asset('wowdash/js/flatpickr.js') }}"></script>

    <script>
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
@endpush

@section('content')
    <div class="container mt-5">
        <div class="card h-100">
            <div class="card-body p-24">
                <form action="{{ route('diri.diri') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Pelanggan
                                    :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Masukkan Nama Pelanggan "
                                    name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Telepon
                                    :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Masukkan Nomor Telepon "
                                    name="telepon" value="{{ old('telepon') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Masukkan Email "
                                    name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Jenis
                                    Kendaraan :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Masukkan Nama Pelanggan "
                                    name="kendaraan" value="{{ old('kendaraan') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-20">
                            <label for="startDate"
                                class="form-label fw-semibold text-primary-light text-sm mb-8">Check-in</label>
                            <div class=" position-relative">
                                <input class="form-control radius-8 bg-base" id="startDate" type="text"
                                    placeholder="Masukkan tanggal Kedatangan" name="checkin_date"
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
                                    placeholder="Masukkan tanggal Keluar " name="checkout_date"
                                    value="{{ old('checkout_date') }}">
                                <span
                                    class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"><iconify-icon
                                        icon="solar:calendar-linear" class="icon text-lg"></iconify-icon></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-success w-160-px mt-10">Next</button>
                    </div>
                    <select class="d-none" id="personentry-template">
                        <option selected>Open this select menu</option>
                        @foreach ($personentry as $data)
                            <option value="{{ $data->person_entry_code }}" data-price="{{ $data->price }}">
                                {{ $data->person_type }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
@endsection
