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
@endpush

@section('content')
    {{-- {{ dd(session()->all()) }} --}}
    <div class="card-body py-40">
        <div class="row justify-content-center" id="invoice">
            <div class="col-lg-8">
                <div class="shadow-4 border radius-8">
                    <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                        <div>
                            @php
                                $generatedTransactionCode = 'TRX-' . date('Ymd') . '-' . sprintf('%04d', rand(1, 9999));
                            @endphp
                            <h3 class="text-xl">Transaction Code #{{ $generatedTransactionCode }}</h3>
                            <p class="mb-1 text-sm">Tanggal Transaksi: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="py-28 px-20">
                        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                            <div>
                                <h6 class="text-md">Detail Order :</h6>
                                <table class="text-sm text-secondary-light">
                                    <tbody>
                                        @php
                                            $generatedCustomerCode =
                                                'CUST-' . date('Ymd') . '-' . sprintf('%04d', rand(1, 9999));
                                        @endphp

                                        <tr>
                                            <td>Customer Code</td>
                                            <td class="ps-8">:{{ $generatedCustomerCode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td class="ps-8">: {{ session('nama_pelanggan') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td class="ps-8">: {{ session('email') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td class="ps-8">: {{ session('telepon') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <table class="text-sm text-secondary-light">
                                    <tbody>
                                        <tr>
                                            <td>Jenis Kendaraan</td>
                                            <td class="ps-8">: {{ session('kendaraan') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Check-in</td>
                                            <td class="ps-8">: {{ session('checkin_date') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Check-out</td>
                                            <td class="ps-8">: {{ session('checkout_date') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-24">
                            <div class="table-responsive scroll-sm">
                                <span>Order Type</span>
                                <table class="table bordered-table text-sm">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>

                                                @if (session()->has('selected_package_code'))
                                                    {{ session('selected_package_name') }}
                                                @endif
                                                @if (session()->has('selected_campsite_code'))
                                                    {{ session('selected_campsite_name') }}
                                                @endif
                                            </td>
                                            <td></td>
                                            <td class="text-end">
                                                @if (session()->has('selected_package_code'))
                                                    {{ session('selected_package_price') }}<br>
                                                @endif
                                                @if (session()->has('selected_campsite_code'))
                                                    {{ session('selected_campsite_price') }}
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                @if (session()->has('selected_package_code'))
                                                    {{ session('selected_package_price') }}
                                                    <br>
                                                @endif
                                                @if (session()->has('selected_campsite_code'))
                                                    {{ session('selected_campsite_price') }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="table-responsive scroll-sm">
                                    <span>Includes</span>
                                    <table class="table bordered-table text-sm">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if (session()->has('selected_package_code'))
                                                        {{ session('selected_campsites_code') }}<br>
                                                    @endif
                                                </td>
                                                <td class="text-end"></td>
                                                <td class="text-end">
                                                    @if (session()->has('selected_package_code'))
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    @if (session()->has('selected_package_code'))
                                                        0
                                                    @endif
                                                </td>
                                            </tr>
                                            @if (session()->has('selected_package_details') && count(session('selected_package_details')) > 0)
                                                @foreach (session('selected_package_details') as $detail)
                                                    <tr>
                                                        <td>{{ $detail['item_name'] }}</td>
                                                        <td>{{ $detail['qty'] }}</td>
                                                        <td class="text-end">0</td>
                                                        <td class="text-end">0</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive scroll-sm">
                                    <span>Jumlah Orang</span>
                                    <table class="table bordered-table text-sm">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            @foreach (session('people', []) as $person)
                                                <tr>
                                                    <td>{{ $person['code'] }}</td>
                                                    <td>{{ $person['quantity'] }}</td>
                                                    <td class="text-end">{{ $person['price'] }}</td>
                                                    <td class="text-end">{{ $person['amount'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive scroll-sm">
                                    <span>Item Tambahan</span>
                                    @if (session()->has('addons') && count(session('addons')) > 0)
                                        <table class="table bordered-table text-sm">
                                            <thead>
                                                <tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('addons') as $addon)
                                                    <tr>
                                                        <td>{{ $addon['item_code'] }}</td>
                                                        <td>{{ $addon['quantity'] }}</td>
                                                        <td class="text-end">{{ $addon['price'] }}</td>
                                                        <td class="text-end">{{ $addon['amount'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div class="d-flex flex-wrap justify-content-between gap-3">
                                    <div>

                                        <p class="text-sm mb-0"></p>
                                    </div>
                                    <div>
                                        <table class="text-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="pe-64">Subtotal:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold">$4000.00</span>
                                                    </td>
                                                </tr>
                                                <hr style="border: 2px solid black">
                                                <tr>
                                                    <td class="pe-64 pt-4">
                                                        <span class="text-primary-light fw-semibold">Total:</span>
                                                    </td>
                                                    <td class="pe-16 pt-4">
                                                        <hr style="border: 2px solid black">
                                                        <span class="text-primary-light fw-semibold">$1690</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-64">
                                <p class="text-secondary-light text-sm fw-semibold"><strong>Disclaimer! Cek dengan
                                        teliti
                                        pesanan anda.</strong></p>
                            </div>
                            <button class="btn btn-primary">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
