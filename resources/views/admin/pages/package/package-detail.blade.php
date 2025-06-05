@foreach ($datas as $data)
    <!-- Modal -->
    <div class="modal fade" id="packagedetailModal-{{ $data->package_code }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Package Code</label>
                        <input type="text" class="form-control" value="{{ $data->package_code }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Package Name</label>
                        <input type="text" class="form-control" value="{{ $data->package_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :</label>
                        <select class="form-select" aria-label="Default select example" name="campsite_code" disabled>
                            <option>Open this select menu</option>
                            @foreach ($campsites as $d)
                                <option value="{{ $d->campsite_code }}"
                                    {{ $data->campsite_code == $d->campsite_code ? 'selected' : '' }}>
                                    {{ $d->campsite_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Weekday Price</label>
                        <input type="text" class="form-control" value="{{ $data->weekday_price }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Weekend Price</label>
                        <input type="text" class="form-control" value="{{ $data->weekly_price }}" readonly>
                    </div>

                    <!-- Tabel Detail -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->details as $detail)
                                <tr>
                                    <td>
                                        <select class="form-select" disabled>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->item_code }}"
                                                    {{ $item->item_code == $detail->item_code ? 'selected' : '' }}>
                                                    {{ $item->item_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $detail->qty }}"
                                            readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
