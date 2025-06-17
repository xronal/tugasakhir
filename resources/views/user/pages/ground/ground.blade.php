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
    <link rel="stylesheet" href="{{ asset('wowdash/css/responsive-ground.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=source_environment" />
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
@endpush

@section('content')
    <div class="container-ground">
        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground as $grounds)
                {{-- <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off"> --}}
                @if ($grounds->ground_code == 'D05')
                    <a class="btn btn-outline-primary"
                        href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">
                        {{ $grounds->ground_code }}</a>
                @endif
            @endforeach
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground as $grounds)
                @if ($grounds->ground_code == 'D06')
                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck2"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S11')
                    <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck3"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['SD2', 'S10']) as $grounds)
                @if ($grounds->ground_code == 'SD2')
                    <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck4"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
            @if ($grounds->ground_code == 'S10')
                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck5"><a
                        href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
            @endif
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground as $grounds)
                @if ($grounds->ground_code == 'D07')
                    <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck6"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif

                @if ($grounds->ground_code == 'S09')
                    <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck7"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['JC07', 'JM04', 'D01', 'D08', 'JC03']) as $grounds)
                @if ($grounds->ground_code == 'JC07')
                    <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck8"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'JM04')
                    <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck9"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'D01')
                    <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck10"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                <div class="flex-grow-0.8"></div>
                @if ($grounds->ground_code == 'D08')
                    <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck11"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'JC03')
                    <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck12"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach

        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['JC06', 'JM03', 'D02', 'JC02', 'D09', 'S08']) as $grounds)
                @if ($grounds->ground_code == 'JC06')
                    <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck13"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'JM03')
                    <input type="checkbox" class="btn-check" id="btncheck14" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck14"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'D02')
                    <input type="checkbox" class="btn-check" id="btncheck15" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck15"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                <div class="flex-grow-0.8"></div>
                @if ($grounds->ground_code == 'JC02')
                    <input type="checkbox" class="btn-check" id="btncheck16" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck16"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'D09')
                    <input type="checkbox" class="btn-check" id="btncheck17" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck17"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S08')
                    <input type="checkbox" class="btn-check" id="btncheck18" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck18"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['JC05', 'JM02', 'D03', 'JC01']) as $grounds)
                {{-- right --}}
                @if ($grounds->ground_code == 'JC05')
                    <input type="checkbox" class="btn-check" id="btncheck19" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck19"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'JM02')
                    <input type="checkbox" class="btn-check" id="btncheck20" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck20"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'D03')
                    <input type="checkbox" class="btn-check" id="btncheck21" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck21"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                {{-- left --}}
                @if ($grounds->ground_code == 'JC01')
                    <input type="checkbox" class="btn-check" id="btncheck22" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck22"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach

        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['JC04', 'JM01', 'D04', 'SD1', 'D10', 'S04']) as $grounds)
                {{-- right --}}
                @if ($grounds->ground_code == 'JC04')
                    <input type="checkbox" class="btn-check" id="btncheck23" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck23"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'JM01')
                    <input type="checkbox" class="btn-check" id="btncheck24" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck24"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'D04')
                    <input type="checkbox" class="btn-check" id="btncheck25" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck25"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                <div class="flex-grow-0.9"></div>
                @if ($grounds->ground_code == 'SD1')
                    <input type="checkbox" class="btn-check" id="btncheck26" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck26"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                {{-- center --}}
                @if ($grounds->ground_code == 'D10')
                    <input type="checkbox" class="btn-check" id="btncheck27" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck27"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                {{-- left --}}
                @if ($grounds->ground_code == 'S04')
                    <input type="checkbox" class="btn-check" id="btncheck28" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck28"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['S16', 'S13', 'S03']) as $grounds)
                {{-- right --}}
                @if ($grounds->ground_code == 'S16')
                    <input type="checkbox" class="btn-check" id="btncheck29" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck29"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S13')
                    <input type="checkbox" class="btn-check" id="btncheck30" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck30"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                {{-- left --}}
                @if ($grounds->ground_code == 'S03')
                    <input type="checkbox" class="btn-check" id="btncheck31" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck31"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach

        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['S15', 'S12', 'D11', 'S07', 'S02']) as $grounds)
                {{-- right --}}
                @if ($grounds->ground_code == 'S15')
                    <input type="checkbox" class="btn-check" id="btncheck32" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck32"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S12')
                    <input type="checkbox" class="btn-check" id="btncheck33" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck33"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                {{-- center --}}
                @if ($grounds->ground_code == 'D11')
                    <div class="flex-grow-0.8"></div>
                    <input type="checkbox" class="btn-check" id="btncheck34" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck34"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S07')
                    <input type="checkbox" class="btn-check" id="btncheck35" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck35"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                    {{-- office --}}
                    <label class="btn btn-outline-primary bg-white-gradient-light" style="width: 15%;">Office</label>
                @endif
                {{-- left --}}
                @if ($grounds->ground_code == 'S02')
                    <div class="flex-grow-1"></div>
                    <input type="checkbox" class="btn-check" id="btncheck36" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck36"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['S14', 'S01']) as $grounds)
                @if ($grounds->ground_code == 'S14')
                    <input type="checkbox" class="btn-check" id="btncheck37" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck37"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S01')
                    <input type="checkbox" class="btn-check" id="btncheck38" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck38"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach

        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($ground->whereIn('ground_code', ['S06', 'S05']) as $grounds)
                @if ($grounds->ground_code == 'S06')
                    <input type="checkbox" class="btn-check" id="btncheck39" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck39"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
                @if ($grounds->ground_code == 'S05')
                    <input type="checkbox" class="btn-check" id="btncheck40" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck40"><a
                            href="{{ route('ground.pilih', ['ground_code' => $grounds->ground_code]) }}">{{ $grounds->ground_code }}</a></label>
                @endif
            @endforeach
        </div>
        {{-- gate entry --}}
        <div class="group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            <label class="btn btn-outline-primary" id="line-right"></label>
            <label class="btn btn-outline-primary bg-white-gradient-light" style="font-size: 8px">Pintu Masuk</label>
            <label class="btn btn-outline-primary" id="line-left"></label>
        </div>
    </div>
@endsection
