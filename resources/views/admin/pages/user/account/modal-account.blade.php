{{-- Modal Add --}}

<div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="userAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="userAddModalLabel">Add New User Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Username : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter Username "
                                name="username">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Name : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter User Name "
                                name="name">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Role : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter User Role "
                                name="role">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email : </label>
                            <input type="email" class="form-control radius-8" placeholder="Enter User Email "
                                name="email">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Password : </label>
                            <input type="password" class="form-control radius-8" placeholder="Enter User Password "
                                name="password">
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
<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="userEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('user.update') }}" method="POST" id="userEditForm">
                @csrf
                <input type="hidden" name="user_id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userAddModalLabel">Edit Admin Info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Username : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter Username "
                                name="username" readonly>
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Name : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter User Name "
                                name="name">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Role : </label>
                            <input type="text" class="form-control radius-8" placeholder="Enter User Role "
                                name="role">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email : </label>
                            <input type="email" class="form-control radius-8" placeholder="Enter User Email "
                                name="email">
                        </div>
                        <div class="col-12 mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Password : </label>
                            <input type="password" class="form-control radius-8"
                                placeholder="Enter User Password (biarkan jika tidak diganti) " name="password">
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
