@extends('frontend.layout.master');

@section('content')
 <!-- Breadcumb Section Start -->
 <div class="breadcrumb-wrapper">
    <div class="book1">
        <img src="assets/img/hero/book1.png" alt="book">
    </div>
    <div class="book2">
        <img src="assets/img/hero/book2.png" alt="book">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1>Cart</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li>
                        <a href="/">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Cart
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Shop Cart Section Start -->
<div class="cart-section section-padding">
    <div class="container">
        <div class="main-cart-wrapper">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center">
                                            <a href="shop-cart.html" class="remove-icon">
                                                <img src="assets/img/icon/icon-9.svg" alt="img">
                                            </a>
                                            <span class="cart">
                                                <img src="assets/img/shop-cart/01.png" alt="img">
                                            </span>
                                            <span class="cart-title">
                                                simple Things You To Save Book
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="cart-price">$30.00</span>
                                    </td>
                                    <td>
                                        <span class="quantity-basket">
                                            <span class="qty">
                                                <button class="qtyminus" aria-hidden="true">−</button>
                                                <input type="number" name="qty" id="qty2" min="1" max="10" step="1"
                                                    value="1">
                                                <button class="qtyplus" aria-hidden="true">+</button>
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="subtotal-price">$120.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center">
                                            <a href="shop-cart.html" class="remove-icon">
                                                <img src="assets/img/icon/icon-9.svg" alt="img">
                                            </a>
                                            <span class="cart">
                                                <img src="assets/img/shop-cart/02.png" alt="img">
                                            </span>
                                            <span class="cart-title">
                                                Qple GPad With Retina Sisplay
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="cart-price">$30.00</span>
                                    </td>
                                    <td>
                                        <span class="quantity-basket">
                                            <span class="qty">
                                                <button class="qtyminus" aria-hidden="true">−</button>
                                                <input type="number" name="qty" id="qty3" min="1" max="10" step="1"
                                                    value="1">
                                                <button class="qtyplus" aria-hidden="true">+</button>
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="subtotal-price">$120.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center">
                                            <a href="shop-cart.html" class="remove-icon">
                                                <img src="assets/img/icon/icon-9.svg" alt="img">
                                            </a>
                                            <span class="cart">
                                                <img src="assets/img/shop-cart/03.png" alt="img">
                                            </span>
                                            <span class="cart-title">
                                                Flovely and Unicom Erna
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="cart-price">$30.00</span>
                                    </td>
                                    <td>
                                        <span class="quantity-basket">
                                            <span class="qty">
                                                <button class="qtyminus" aria-hidden="true">−</button>
                                                <input type="number" name="qty" id="qty" min="1" max="10" step="1"
                                                    value="1">
                                                <button class="qtyplus" aria-hidden="true">+</button>
                                            </span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="subtotal-price">$120.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-wrapper-footer">
                        <form action="https://gramentheme.com/html/bookle/shop-cart.html">
                            <div class="input-area">
                                <input type="text" name="Coupon Code" id="CouponCode" placeholder="Coupon Code">
                                <button type="submit" class="theme-btn">
                                    Apply
                                </button> 
                            </div>
                        </form>
                        <a href="shop-cart.html" class="theme-btn">
                            Update Cart
                        </a>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="table-responsive cart-total">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cart Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center justify-content-between">
                                            <span class="sub-title">Subtotal:</span>
                                            <span class="sub-price">$84.00</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Shipping:</span>
                                            <span class="sub-text">
                                                Free
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="d-flex gap-5 align-items-center  justify-content-between">
                                            <span class="sub-title">Total:  </span>
                                            <span class="sub-price sub-price-total">$84.00</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="checkout.html" class="theme-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection