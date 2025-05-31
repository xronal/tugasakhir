@foreach ($datas as $data)
    <div class="modal fade" id="modalEdit{{ $data->admin_code }}" tabindex="-1"
        aria-labelledby="editLabel{{ $data->admin_code }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
            <div class="modal-content radius-16 bg-base">
                <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                    <h5 class="modal-title" id="editLabel{{ $data->admin_code }}">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-24">
                    <form action="{{ route('admin.update', $data->user_id) }}" method="POST" id="editAdminForm">
                        @csrf

                        <div class="row">
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Admin Code :
                                </label>
                                <input type="text" name="admin_code" class="form-control radius-8"
                                    value="{{ $data->admin_code }}" readonly>
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter Full Name "
                                    name="admin_name" value="{{ $data->admin_name }}">
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter Admin Email "
                                    name="email" value="{{ $data->email }}">
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8"> Phone Number :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter Phone Number"
                                    name="phone" value="{{ $data->phone }}">
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8"> Job :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter Job Title"
                                    name="job" value="{{ $data->job }}">
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8"> User ID :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter User ID"
                                    name="user_id" value="{{ $data->user_id }}" readonly>
                            </div>
                            <div class="col-12 mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8"> Username :
                                </label>
                                <input type="text" class="form-control radius-8" placeholder="Enter User ID"
                                    name="username" value="{{ $data->user->username ?? '-' }}">
                            </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
