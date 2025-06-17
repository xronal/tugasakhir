@foreach ($package as $data)
    <!-- Modal -->
    <div class="modal fade" id="packagedetailModal-{{ $data->package_code }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-body">
                    <h5 class="text-center">Detail package</h5>
                    <div class="mb-3 mt-10">
                        <label>Package Code</label>
                        <input type="text" class="form-control" value="{{ $data->package_code }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Package Name</label>
                        <input type="text" class="form-control" value="{{ $data->package_name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code
                            :</label>
                        @php
                            $matchedCampsite = $campsite->firstWhere('campsite_code', $data->campsite_code);
                        @endphp
                        @foreach ($campsite as $campsites)
                        @endforeach
                        <input type="text" class="form-control"
                            value="{{ $matchedCampsite ? $matchedCampsite->campsite_name : 'Tidak Diketahui' }}"
                            readonly>
                        <input type="hidden" class="form-control" value="{{ $campsites->code }}" readonly>
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
                                        @php
                                            $matchedItem = $items->firstWhere('item_code', $detail->item_code);
                                        @endphp
                                        <input type="text" class="form-control"
                                            value="{{ $matchedItem->item_name ?? $detail->item_code }}"readonly>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $detail->qty }}" readonly>
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
@foreach ($campsite as $data)
    <!-- Modal -->
    <div class="modal fade" id="campsitedetailModal-{{ $data->campsite_code }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-body">
                    <h5 class="text-center">Detail package</h5>
                    <div class="mb-3 mt-10">
                        <label>Package Code</label>
                        <input type="text" class="form-control" value="{{ $data->campsite_code }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Package Name</label>
                        <input type="text" class="form-control" value="{{ $data->campsite_name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label>Weekday Price</label>
                        <input type="text" class="form-control" value="{{ $data->weekday_price }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Weekend Price</label>
                        <input type="text" class="form-control" value="{{ $data->weekend_price }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label>Weekend Price</label>
                        <input type="text" class="form-control" value="{{ $data->description }}" readonly>
                    </div>

                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
