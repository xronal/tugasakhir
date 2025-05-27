{{-- Modal Add --}}

<div class="modal fade" id="groundAddModal" tabindex="-1" aria-labelledby="groundAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="groundAddModalLabel">Add New Ground</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('grounds.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Ground Code : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter Ground Code "
                                name="ground_code">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                            </label>
                            <select class="form-select" aria-label="Default select example" name="campsite_code">
                                <option selected>Pilih Campsite Code</option>
                                @foreach ($campsites as $data)
                                    <option value="{{ $data->campsite_code }}">{{ $data->campsite_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="button"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                                data-bs-dismiss="modal">
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

{{-- Modal Add End --}}

{{-- Modal Edit --}}
<div class="modal fade" id="groundEditModal" tabindex="-1" aria-labelledby="groundEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="groundAddModalLabel">Edit Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('grounds.update') }}" method="POST" id="groundEditForm">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">ground Code : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter Ground Code "
                                name="ground_code">
                        </div>

                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                            </label>
                            <select class="form-select" aria-label="Default select example" name="campsite_code">
                                <option selected>Pilih Campsite Code</option>
                                @foreach ($campsites as $campsite)
                                    <option value="{{ $campsite->campsite_code }}"
                                        {{ $data->campsite_code == $campsite->campsite_code ? 'selected' : '' }}>
                                        {{ $campsite->campsite_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="button"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                                data-bs-dismiss="modal">
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
        </div>
    </div>
</div>
{{-- Modal Edit End --}}
