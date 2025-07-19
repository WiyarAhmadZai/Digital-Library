<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cart.completePayment') }}" id="cart-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Purchase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="book_id" id="cart-book-id">

                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" id="email-input" required>
                        <div class="invalid-feedback">Your email must match your account email.</div>
                    </div>

                    <div class="mb-3">
                        <label>Phone Number:</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Bank Account Number:</label>
                        <input type="text" name="bank_account" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Price:</label>
                        <input type="text" id="price-display" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="payment-complete-btn">Complete Payment</button>
                </div>
            </div>
        </form>
    </div>
</div>
