<div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content text-center p-3">
            <div class="modal-header border-0">
                <button type="button" class="btn btn-danger btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <!-- Logo Centered and Smaller -->
                <div class="mb-4">
                    <img src="{{ asset('/assets/img/logo.png') }}" class="img-fluid" alt="SkyLink Logo"
                        style="max-width: 100px;">
                </div>
                <h2 class="display-5 fw-bold text-primary">Get up to 30% OFF</h2>
                <p class="lead mb-4">Join SkyLink for email exclusive discounts to be sent directly to
                    your inbox.</p>

                <form id="joinForm">
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-lg" id="emailInput"
                            placeholder="Email address" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Join Now</button>
                </form>

                <div id="successMessage" class="mt-4 text-success" style="display: none;">
                    <h4>Thank you!</h4>
                    <p>You’re now able to use discount code: <strong>COMPARE</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
