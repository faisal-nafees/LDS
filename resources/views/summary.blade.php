<x-frontend.layout>



    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="product-breadcrumb other-page">
                        <span> Order » <a href="{{ route('cart') }}" class="pb-c-page">Cart</a>
                            » <a href="{{ route('checkout') }}" class="pb-c-page">Billing/Shipping</a>
                            » <a href="{{ route('summary') }}" class="pb-c-page">Order Summary</a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- end: row -->

            <x-response></x-response>

            @if (!is_null($basicData))
                <div class="cart-top-con">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="c-t-l-con">
                                <h4>COMMON OPTIOMS TO ALL ITEMS:</h4>
                                <ul>
                                    <li>{{ $basicData['bottom_thickness_grain_direction_option'] }}
                                    </li>
                                    <li>{{ $basicData['back_notch_drill_undermount_slide_option'] }}
                                    </li>
                                    <li>{{ $basicData['front_notch_undermount_slide_option'] }}</li>
                                    <li>{{ $basicData['bracket_option'] }}</li>
                                </ul>
                                <h5>Brand with Your Logo</h5>
                                <ul>
                                    <li>
                                        {{ empty($basicData['logo_branded']) ? 'N/a' : $basicData['logo_branded'] }}
                                    </li>
                                </ul>


                            </div>
                        </div>
                        <div class="col-md-6 ">
                            @if (!empty($basicData['brand_logo']))
                                <div>
                                    <img src="{{ asset($basicData['brand_logo']) }}" alt="" width="200px"
                                        height="200px">

                                </div>
                            @endif
                        </div>

                    </div>
                    <!-- end: row -->
                </div>
            @endif



            <div class="cart-pro-table">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Item</td>
                                    <td>Image</td>
                                    <td>Attachment</td>
                                    <td>Product/Admin Codes</td>
                                    <td>Notes</td>
                                    <td>Unit Price</td>
                                    <td>Qty</td>
                                    <td>Ext. Price</td>
                                </tr>

                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($items as $item)
                                    @php
                                        $price = $comman_options_total + $item['price'];
                                    @endphp
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset($item['product_image']) }}" alt=""
                                                width="100" height="100">
                                        </td>
                                        <td>{{ __('n/a') }}</td>
                                        <td>
                                            <div class="c-p-t-codes">
                                                @if (custom()->code == 1)
                                                    <p>
                                                        {{ $item['product_code'] }}
                                                    </p>
                                                @endif
                                                <p>Height: {{ $item['height'] }}</p>
                                                <p>Width: {{ $item['width'] }}</p>
                                                <p>Depth: {{ $item['depth'] }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="c-p-t-notes">
                                                <h6>{{ $item['note'] ? $item['note'] : 'N/A' }}</h6>
                                            </div>
                                        </td>
                                        <td>$ {{ $price }}</td>
                                        <td>{{ $item['quantity'] }}
                                        </td>
                                        <td>$ {{ $price * $item['quantity'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">No Order Yet</td>
                                    </tr>
                                @endforelse




                            </table>
                        </div>

                    </div>
                </div>
                <!-- end: row -->
            </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="c-p-btm-form">
                        {{-- <div class="form-group row">
                            <label for="shippingcity" class="col-md-2 col-form-label">Shipping to
                                City:</label>
                            <div class="col-md-10">
                                <div class="all-dev">
                                    <select class="form-select" id="shippingcity" name="city" readonly>
                                        <option value="{{ $billingDetails['city'] }}">{{ $billingDetails['city'] }}
                                        </option>
                                    </select>
                                </div>

                                <p class="city-notes">*If City is not listed, please call us at
                                    905.282.1722
                                </p>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="shippingcity" class="col-md-2 col-form-label">Shipping to
                                City:</label>
                            <div class="col-md-10">
                                <div class="all-dev">
                                    <select class="form-select" id="shippingcity" name="city" required>
                                        <option selected disabled>Drop down menu with available
                                            cities
                                            <span>(alphabetic
                                                order)</span>
                                        </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city }}">{{ $city->city }}
                                            </option>
                                        @endforeach
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <p class="city-notes">*If City is not listed, please call us at
                                    905.282.1722
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="from-md-txt">
                                    <h5>Total Cubic Measurements <span>(10 lbs/p3)</span></h5>
                                    <ul>
                                        <li>Total :
                                            {{ $billingDetails['total_cubic_measurement'] }} </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-md-txt">
                                    <h5>Total Weight</h5>
                                    <ul>
                                        <li>Lbs =
                                            {{ $billingDetails['total_weight_lbs'] }}
                                        </li>
                                        <li>Kg =
                                            {{ $billingDetails['total_weight_kg'] }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group c-p-txtarea">
                            <label for="cftxtarea"><b>Additional Notes:</b></label>
                            <textarea name="additional_note" class="form-control" id="cftxtarea" readonly> {{ $billingDetails['additional_note'] }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="c-p-btm-info">
                        <ul>

                            <li>Total Items <span>{{ $billingDetails['quantity'] }}</span></li>
                            <li>Items Total <span>$ {{ $billingDetails['total'] }}</span></li>
                            <li>Delivery <span>$ {{ $billingDetails['delivery_fee'] }}</span></li>
                            <li>Courier <span>$ {{ $billingDetails['courier'] }}</span></li>
                            <li>Subtotal <span>$ {{ $billingDetails['subtotal'] }}</span></li>
                            <li>Taxes (ON 13%) <span>$ {{ $billingDetails['taxes'] }}</span></li>
                            <li><b>CART Total</b> <span>$ {{ $billingDetails['cart_total'] }}</span>
                            </li>
                        </ul>
                        <div class="c-p-info-btn">
                            <a href="{{ route('pay') }}" class="btn btn-success">PROCEED TO PAYMENT
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end: container -->
    </section>

    <x-frontend.section name='scripts'>
        <script>
            $('#shippingcity').change(function() {
                let city = $(this).val();
                let weight = $('.__totalWeight').val();
                let price = $('.__priceInp').val();
                localStorage.setItem('shipping_city', city);

                $.ajax({
                    url: "{{ route('delivery.price') }}",
                    method: 'get',
                    data: {
                        city: city,
                        weight: weight,
                        price: price
                    },
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        $('.__deliveryFee').html('$' + obj.deliveryFee);
                        $('.__deliveryFeeInp').val(obj.deliveryFee);
                        $('.__subtotal').html('$' + obj.subtotal);
                        $('.__subtotalInp').val(obj.subtotal);
                        $('.__taxes').html('$' + obj.taxes);
                        $('.__taxesInp').val(obj.taxes);
                        $('.__cartTotal').html('$' + obj.cartTotal)
                        $('.__cartTotalInp').val(obj.cartTotal)
                        $('.__courierInp').val(obj.courier)

                    },
                    errors: function(error) {
                        console.log(error);
                    }
                });

            });
        </script>
    </x-frontend.section>

</x-frontend.layout>