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
    </script>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="card h-100">
            <div class="card-body p-24">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('tambah.store') }}" method="post">
                            @csrf
                            <span class="text-lg fw-semibold mb-1">Pilih Item Tambahan</span>
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
                            <div class="d-flex justify-content-center mt-3">
                                <button type="sumbit" class="btn btn-success w-160-px mt-10">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                <select id="item-template" class="d-none">
                    @foreach ($items as $data)
                        <option value="{{ $data->item_code }}" data-price="{{ $data->item_price }}">
                            {{ $data->item_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection
