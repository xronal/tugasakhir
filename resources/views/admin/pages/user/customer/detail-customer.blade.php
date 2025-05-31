@foreach ($datas as $data)
    <div class="modal fade" id="modalDetail{{ $data->customer_code }}" tabindex="-1"
        aria-labelledby="modalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $data->customer_code }}">Detail Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <h6 class="text-xl mb-3">Personal Info</h6>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light">Full Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">:
                                        {{ $data->customer_name }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Phone Number</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $data->phone }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">:
                                        {{ $data->user->email ?? '-' }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> User ID</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{ $data->user_id }}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Username</span>
                                    <span class="w-70 text-secondary-light fw-medium">:
                                        {{ $data->user->username ?? '-' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
