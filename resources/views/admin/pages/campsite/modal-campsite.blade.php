<div class="modal fade" id="campsiteAddModal" tabindex="-1" aria-labelledby="campsiteAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="campsiteAddModalLabel">Add New Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('campsite.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Code "
                                name="campsites_code">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Name :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Name "
                                name="campsites_name">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekly Price :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Price "
                                name="weekday_price">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekend Price :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Price "
                                name="weekend_price">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Description :
                            </label>
                            <input type="text" class="form-control radius-8"
                                placeholder="Enter Description campsite " name="description">
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

{{-- Modal Edit --}}
<div class="modal fade" id="campsiteEditModal" tabindex="-1" aria-labelledby="campsiteEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="campsiteAddModalLabel">Edit Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('campsite.update') }}" method="POST" id="campsiteEditForm">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Code :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Code "
                                name="campsites_code">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Campsite Name :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Name "
                                name="campsites_name">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekday Price :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Price "
                                name="weekday_price">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Weekend Price :
                            </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter campsite Price "
                                name="weekend_price">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Description :
                            </label>
                            <input type="text" class="form-control radius-8"
                                placeholder="Enter Description campsite " name="description">
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
{{-- Modal Edit End --}}
