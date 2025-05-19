{{-- Modal Detail --}}
<div class="modal fade" id="packagedetailModal" tabindex="-1" aria-labelledby="packagedetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="packagedetailModalLabel">Package Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('package.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Package Code :
                            </label>
                            <input type="text" class="form-control radius-8" value="{{ $data->package_code }}"
                                readonly>
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Package Name :
                            </label>
                            <input type="text" class="form-control radius-8" value="{{ $data->package_name }}"
                                readonly>
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                            </label>
                            @foreach ($campsites as $d)
                                @if ($data->campsite_code == $d->campsite_code)
                                    <input type="text" class="form-control radius-8" value="{{ $d->campsite_name }}"
                                        readonly>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">weekday Price :
                            </label>
                            <input type="text" class="form-control radius-8" value="{{ $data->weekday_price }}"
                                readonly>
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">weekend Price :
                            </label>
                            <input type="text" class="form-control radius-8" value="{{ $data->weekend_price }}"
                                readonly>
                        </div>

                        <table class="table bordered-table mb-0" id="package-table">
                            <thead>
                                <tr>
                                    <th scope="col">Item Code</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>
                                            <select class="form-select" aria-label="Default select example"
                                                name="item_code[]">
                                                <option selected>Open this select menu</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->item_code }}"
                                                        {{ $detail->item_code == $item->item_code ? 'selected' : '' }}>
                                                        {{ $item->item_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="quantity[]"
                                                value="{{ $detail->qty }}" readonly></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="button"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                                data-bs-dismiss="modal">
                                Back
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
