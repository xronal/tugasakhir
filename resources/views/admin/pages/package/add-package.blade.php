<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('admin.includes.style')
    {{-- <link rel="stylesheet" href="{{ asset('wowdash/css/lib/bootstrap.min.css') }}"> --}}
</head>

<body>
    <div id="PackageAddModal" tabindex="-1" aria-labelledby="PackageAddModalLabel" aria-hidden="true">
        <div class="modal-body p-24">
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
                        <input type="text" class="form-control radius-8" placeholder="Enter Campsite Code "
                            name="campsite_code">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Package Price :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Package Price "
                            name="package_price">
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="reset"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                            Cancel
                        </button>
                        <button type="submit"
                            class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
