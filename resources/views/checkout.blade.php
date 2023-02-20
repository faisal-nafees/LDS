<x-frontend.layout>


    <section class="product-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="product-breadcrumb other-page">
                        <span> <a href="{{ route('index') }}" class="pb-c-page fw-normal">Order</a> » <a
                                href="{{ route('cart') }}" class="pb-c-page fw-normal">Cart</a> » <a
                                href="{{ route('checkout') }}" class="pb-c-page">Billing/Shipping</a> </span>
                    </div>
                </div>
            </div>
            <!-- end: row -->

            <x-response></x-response>

            <form action="{{ route('payment') }}" method="post">
                @csrf
                {{-- Billing Details --}}
                <div class="container my-2">
                    <h2>Billing Details</h2>
                    <hr>
                    <div class="row">
                        <div class="form-group mt-2 col-12">
                            <label for="">Purchase Order/Reference Number *</label>
                            <input type="text" name="reference_number" class="form-control"
                                placeholder="Purchase Order/Reference Number" required>
                        </div>
                        <div class="form-group mt-2 col-12">
                            <label for="">Company*</label>
                            <input type="text" required name="billing_company" class="form-control"
                                placeholder="Billing Company" value="{{ $user->user_billing_company }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">First Name*</label>
                            <input type="text" required name="billing_first_name" class="form-control"
                                placeholder="Billing First name" value="{{ $user->user_billing_fname }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Last Name*</label>
                            <input type="text" required name="billing_last_name" class="form-control"
                                placeholder="Billing Last name" value="{{ $user->user_billing_lname }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Telephone *</label>
                            <input type="text" required name="billing_phone" class="form-control"
                                placeholder="Billing Phone" value="{{ $user->user_billing_phone }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Email*</label>
                            <input type="email" required name="billing_email" class="form-control"
                                placeholder="Billing Email" value="{{ $user->user_billing_email }}">
                        </div>

                        <div class="form-group mt-2 col-lg-6">
                            <label for=""> <b>Note: Billing Address* (When paying by Credit Card, Billing
                                    Address must be
                                    exactly as it appears on credit card statement)</b></label>
                            <input type="text" required name="billing_address" class="form-control"
                                placeholder="Shipping Address" value="{{ $user->user_billing_address }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">City*</label>
                            <input type="text" required name="billing_city" class="form-control"
                                placeholder="Billing City" value="{{ $user->user_billing_city }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Postal / Zip Code*</label>
                            <input type="text" required name="billing_postal_code" class="form-control"
                                placeholder="Billing Postal Code" value="{{ $user->user_billing_postal }}">
                        </div>

                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Province/State and Country *</label>
                            <select name="billing_country" class="form-control">
                                <option disabled="">Select</option>
                                <option value="AB" {{ $user->user_billing_country == 'AB' ? 'selected' : '' }}>AB
                                    (CA)</option>
                                <option value="BC" {{ $user->user_billing_country == 'BC' ? 'selected' : '' }}>BC
                                    (CA)</option>
                                <option value="MB" {{ $user->user_billing_country == 'MB' ? 'selected' : '' }}>MB
                                    (CA)</option>
                                <option value="NB" {{ $user->user_billing_country == 'NB' ? 'selected' : '' }}>NB
                                    (CA)</option>
                                <option value="NL" {{ $user->user_billing_country == 'NL' ? 'selected' : '' }}>NL
                                    (CA)</option>
                                <option value="NT" {{ $user->user_billing_country == 'NT' ? 'selected' : '' }}>NT
                                    (CA)</option>
                                <option value="NS" {{ $user->user_billing_country == 'NS' ? 'selected' : '' }}>NS
                                    (CA)</option>
                                <option value="NU" {{ $user->user_billing_country == 'NU' ? 'selected' : '' }}>NU
                                    (CA)</option>
                                <option value="ON" {{ $user->user_billing_country == 'ON' ? 'selected' : '' }}>ON
                                    (CA)</option>
                                <option value="PE" {{ $user->user_billing_country == 'PE' ? 'selected' : '' }}>PE
                                    (CA)</option>
                                <option value="QC" {{ $user->user_billing_country == 'QC' ? 'selected' : '' }}>QC
                                    (CA)</option>
                                <option value="SK" {{ $user->user_billing_country == 'SK' ? 'selected' : '' }}>SK
                                    (CA)</option>
                                <option value="YT" {{ $user->user_billing_country == 'YT' ? 'selected' : '' }}>YT
                                    (CA)</option>
                                <option value="AL" {{ $user->user_billing_country == 'AL' ? 'selected' : '' }}>AL
                                    (US)</option>
                                <option value="AK" {{ $user->user_billing_country == 'AK' ? 'selected' : '' }}>AK
                                    (US)</option>
                                <option value="AZ" {{ $user->user_billing_country == 'AZ' ? 'selected' : '' }}>AZ
                                    (US)</option>
                                <option value="AR" {{ $user->user_billing_country == 'AR' ? 'selected' : '' }}>AR
                                    (US)</option>
                                <option value="CA" {{ $user->user_billing_country == 'CA' ? 'selected' : '' }}>CA
                                    (US)</option>
                                <option value="CO" {{ $user->user_billing_country == 'CO' ? 'selected' : '' }}>CO
                                    (US)</option>
                                <option value="CT" {{ $user->user_billing_country == 'CT' ? 'selected' : '' }}>CT
                                    (US)</option>
                                <option value="DE" {{ $user->user_billing_country == 'DE' ? 'selected' : '' }}>DE
                                    (US)</option>
                                <option value="FL" {{ $user->user_billing_country == 'FL' ? 'selected' : '' }}>FL
                                    (US)</option>
                                <option value="GA" {{ $user->user_billing_country == 'GA' ? 'selected' : '' }}>GA
                                    (US)</option>
                                <option value="HI" {{ $user->user_billing_country == 'HI' ? 'selected' : '' }}>HI
                                    (US)</option>
                                <option value="ID" {{ $user->user_billing_country == 'ID' ? 'selected' : '' }}>ID
                                    (US)</option>
                                <option value="IL" {{ $user->user_billing_country == 'IL' ? 'selected' : '' }}>IL
                                    (US)</option>
                                <option value="IN" {{ $user->user_billing_country == 'IN' ? 'selected' : '' }}>IN
                                    (US)</option>
                                <option value="IA" {{ $user->user_billing_country == 'IA' ? 'selected' : '' }}>IA
                                    (US)</option>
                                <option value="KS" {{ $user->user_billing_country == 'KS' ? 'selected' : '' }}>KS
                                    (US)</option>
                                <option value="KY" {{ $user->user_billing_country == 'KY' ? 'selected' : '' }}>KY
                                    (US)</option>
                                <option value="LA" {{ $user->user_billing_country == 'LA' ? 'selected' : '' }}>LA
                                    (US)</option>
                                <option value="ME" {{ $user->user_billing_country == 'ME' ? 'selected' : '' }}>ME
                                    (US)</option>
                                <option value="MD" {{ $user->user_billing_country == 'MD' ? 'selected' : '' }}>MD
                                    (US)</option>
                                <option value="MA" {{ $user->user_billing_country == 'MA' ? 'selected' : '' }}>MA
                                    (US)</option>
                                <option value="MI" {{ $user->user_billing_country == 'MI' ? 'selected' : '' }}>MI
                                    (US)</option>
                                <option value="MN" {{ $user->user_billing_country == 'MN' ? 'selected' : '' }}>MN
                                    (US)</option>
                                <option value="MS" {{ $user->user_billing_country == 'MS' ? 'selected' : '' }}>MS
                                    (US)</option>
                                <option value="MO" {{ $user->user_billing_country == 'MO' ? 'selected' : '' }}>MO
                                    (US)</option>
                                <option value="MT" {{ $user->user_billing_country == 'MT' ? 'selected' : '' }}>MT
                                    (US)</option>
                                <option value="NE" {{ $user->user_billing_country == 'NE' ? 'selected' : '' }}>NE
                                    (US)</option>
                                <option value="NV" {{ $user->user_billing_country == 'NV' ? 'selected' : '' }}>NV
                                    (US)</option>
                                <option value="NH" {{ $user->user_billing_country == 'NH' ? 'selected' : '' }}>NH
                                    (US)</option>
                                <option value="NJ" {{ $user->user_billing_country == 'NJ' ? 'selected' : '' }}>NJ
                                    (US)</option>
                                <option value="NM" {{ $user->user_billing_country == 'NM' ? 'selected' : '' }}>NM
                                    (US)</option>
                                <option value="NY" {{ $user->user_billing_country == 'NY' ? 'selected' : '' }}>NY
                                    (US)</option>
                                <option value="NC" {{ $user->user_billing_country == 'NC' ? 'selected' : '' }}>NC
                                    (US)</option>
                                <option value="ND" {{ $user->user_billing_country == 'ND' ? 'selected' : '' }}>ND
                                    (US)</option>
                                <option value="OH" {{ $user->user_billing_country == 'OH' ? 'selected' : '' }}>OH
                                    (US)</option>
                                <option value="OK" {{ $user->user_billing_country == 'OK' ? 'selected' : '' }}>OK
                                    (US)</option>
                                <option value="OR" {{ $user->user_billing_country == 'OR' ? 'selected' : '' }}>OR
                                    (US)</option>
                                <option value="PA" {{ $user->user_billing_country == 'PA' ? 'selected' : '' }}>PA
                                    (US)</option>
                                <option value="RI" {{ $user->user_billing_country == 'RI' ? 'selected' : '' }}>RI
                                    (US)</option>
                                <option value="SC" {{ $user->user_billing_country == 'SC' ? 'selected' : '' }}>SC
                                    (US)</option>
                                <option value="SD" {{ $user->user_billing_country == 'SD' ? 'selected' : '' }}>SD
                                    (US)</option>
                                <option value="TN" {{ $user->user_billing_country == 'TN' ? 'selected' : '' }}>TN
                                    (US)</option>
                                <option value="TX" {{ $user->user_billing_country == 'TX' ? 'selected' : '' }}>TX
                                    (US)</option>
                                <option value="UT" {{ $user->user_billing_country == 'UT' ? 'selected' : '' }}>UT
                                    (US)</option>
                                <option value="VT" {{ $user->user_billing_country == 'VT' ? 'selected' : '' }}>VT
                                    (US)</option>
                                <option value="VA" {{ $user->user_billing_country == 'VA' ? 'selected' : '' }}>VA
                                    (US)</option>
                                <option value="WA" {{ $user->user_billing_country == 'WA' ? 'selected' : '' }}>WA
                                    (US)</option>
                                <option value="WV" {{ $user->user_billing_country == 'WV' ? 'selected' : '' }}>WV
                                    (US)</option>
                                <option value="WI" {{ $user->user_billing_country == 'WI' ? 'selected' : '' }}>WI
                                    (US)</option>
                                <option value="WY" {{ $user->user_billing_country == 'WY' ? 'selected' : '' }}>WY
                                    (US)</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Shipping details  --}}
                <div class="container my-2">
                    <div class="d-flex align-items-center">
                        <h2>Shipping Details</h2>
                        <input type="checkbox" class="sameAsBilling mx-3"><span>Same
                            as
                            Billing
                            Details</span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">First Name*</label>
                            <input type="text" required name="shipping_first_name"
                                class="form-control secondaryFields" id="first_name" onchange="getValue()"
                                placeholder="Shipping First name">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Last Name*</label>
                            <input type="text" id="last_name" required name="shipping_last_name"
                                onchange="getValue()" class="form-control secondaryFields"
                                placeholder="Shipping Last name">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Email*</label>
                            <input type="email" id="email" required name="shipping_email"
                                onchange="getValue()" class="form-control secondaryFields"
                                placeholder="Shipping Email">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Telephone*</label>
                            <input type="text" id="phone" required name="shipping_phone"
                                onchange="getValue()" class="form-control secondaryFields"
                                placeholder="Shipping Phone">
                        </div>
                        <div class="form-group mt-2 col-lg-12">
                            <label for="">Address</label>
                            <input type="text" id="address" required name="shipping_address"
                                onchange="getValue()" class="form-control secondaryFields"
                                placeholder="Shipping Address">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">City*</label>
                            <input type="text" id="city" required name="shipping_city" onchange="getValue()"
                                class="form-control secondaryFields" placeholder="Shipping City"
                                value="{{ session()->get('billingDetails')['city'] }}">
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Province/State and Country *</label>
                            <select name="shipping_country" id="country" class="form-control secondaryFields"
                                onchange="getValue()" required="">
                                <option value="AB">AB (CA)</option>
                                <option value="BC">BC (CA)</option>
                                <option value="MB">MB (CA)</option>
                                <option value="NB">NB (CA)</option>
                                <option value="NL">NL (CA)</option>
                                <option value="NT">NT (CA)</option>
                                <option value="NS">NS (CA)</option>
                                <option value="NU">NU (CA)</option>
                                <option value="ON">ON (CA)</option>
                                <option value="PE">PE (CA)</option>
                                <option value="QC">QC (CA)</option>
                                <option value="SK">SK (CA)</option>
                                <option value="YT">YT (CA)</option>
                                <option value="AL">AL (US)</option>
                                <option value="AK">AK (US)</option>
                                <option value="AZ">AZ (US)</option>
                                <option value="AR">AR (US)</option>
                                <option value="CA">CA (US)</option>
                                <option value="CO">CO (US)</option>
                                <option value="CT">CT (US)</option>
                                <option value="DE">DE (US)</option>
                                <option value="FL">FL (US)</option>
                                <option value="GA">GA (US)</option>
                                <option value="HI">HI (US)</option>
                                <option value="ID">ID (US)</option>
                                <option value="IL">IL (US)</option>
                                <option value="IN">IN (US)</option>
                                <option value="IA">IA (US)</option>
                                <option value="KS">KS (US)</option>
                                <option value="KY">KY (US)</option>
                                <option value="LA">LA (US)</option>
                                <option value="ME">ME (US)</option>
                                <option value="MD">MD (US)</option>
                                <option value="MA">MA (US)</option>
                                <option value="MI">MI (US)</option>
                                <option value="MN">MN (US)</option>
                                <option value="MS">MS (US)</option>
                                <option value="MO">MO (US)</option>
                                <option value="MT">MT (US)</option>
                                <option value="NE">NE (US)</option>
                                <option value="NV">NV (US)</option>
                                <option value="NH">NH (US)</option>
                                <option value="NJ">NJ (US)</option>
                                <option value="NM">NM (US)</option>
                                <option value="NY">NY (US)</option>
                                <option value="NC">NC (US)</option>
                                <option value="ND">ND (US)</option>
                                <option value="OH">OH (US)</option>
                                <option value="OK">OK (US)</option>
                                <option value="OR">OR (US)</option>
                                <option value="PA">PA (US)</option>
                                <option value="RI">RI (US)</option>
                                <option value="SC">SC (US)</option>
                                <option value="SD">SD (US)</option>
                                <option value="TN">TN (US)</option>
                                <option value="TX">TX (US)</option>
                                <option value="UT">UT (US)</option>
                                <option value="VT">VT (US)</option>
                                <option value="VA">VA (US)</option>
                                <option value="WA">WA (US)</option>
                                <option value="WV">WV (US)</option>
                                <option value="WI">WI (US)</option>
                                <option value="WY">WY (US)</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 col-lg-6">
                            <label for="">Postal/Zip Code*</label>
                            <input type="text" id="postal_code" required name="shipping_postal_code"
                                onchange="getValue()" class="form-control secondaryFields"
                                placeholder="Shipping Postal Code">
                        </div>


                    </div>
                </div>

                <div class="m-3">
                    <button type="submit" class="btn btn-success">Proceed to Summary</button>
                </div>
            </form>
        </div>
        <!-- end: container -->
    </section>

    <x-frontend.section required name='scripts'>
        <script>
            // Scripts goes here

            $(".sameAsBilling").click(function() {

                let city = '{{ session()->get('billingDetails')['city'] }}';
                if ($(this).is(":checked")) {
                    let bfn = $("input[name='billing_first_name']").val();
                    let bln = $("input[name='billing_last_name']").val();
                    let be = $("input[name='billing_email']").val();
                    let ba = $("input[name='billing_address']").val();
                    let bcity = $("input[name='billing_city']").val();
                    let bpc = $("input[name='billing_postal_code']").val();
                    let bp = $("input[name='billing_phone']").val();
                    let bc = $("select[name='billing_country']").val();

                    $("input[name='shipping_first_name']").val(bfn);
                    $("input[name='shipping_last_name']").val(bln);
                    $("input[name='shipping_email']").val(be);
                    $("input[name='shipping_address']").val(ba);

                    if (city == 'other') {
                        $("input[name='shipping_city']").val(bcity);
                    }

                    $("input[name='shipping_postal_code']").val(bpc);
                    $("input[name='shipping_phone']").val(bp);
                    $("select[name='shipping_country']").val(bc);

                    $(".secondaryFields").attr('readonly', true);

                } else {
                    $("input[name='shipping_first_name']").val('');
                    $("input[name='shipping_last_name']").val('');
                    $("input[name='shipping_email']").val('');
                    $("input[name='shipping_address']").val('');
                    if (city == 'other') {
                        $("input[name='shipping_city']").val('');
                    }
                    $("input[name='shipping_postal_code']").val('');
                    $("input[name='shipping_phone']").val('');
                    $("select[name='shipping_country']").val('');

                    $(".secondaryFields").removeAttr('readonly');
                }
            });

            function getValue() {
                let sfn = $("input[name='shipping_first_name']").val();
                let sln = $("input[name='shipping_last_name']").val();
                let se = $("input[name='shipping_email']").val();
                let sa = $("input[name='shipping_address']").val();
                let scity = $("input[name='shipping_city']").val();
                let spc = $("input[name='shipping_postal_code']").val();
                let sp = $("input[name='shipping_phone']").val();
                let sc = $("select[name='shipping_country']").val();

                localStorage.setItem('shipping_first_name', sfn);
                localStorage.setItem('shipping_last_name', sln);
                localStorage.setItem('shipping_email', se);
                localStorage.setItem('shipping_address', sa);
                localStorage.setItem('shipping_city', scity);
                localStorage.setItem('shipping_postal_code', spc);
                localStorage.setItem('shipping_phone', sp);
                localStorage.setItem('shipping_country', sc);
            }

            $(document).ready(function() {
                $('#first_name').val(localStorage.shipping_first_name);
                $('#last_name').val(localStorage.shipping_last_name);
                $('#email').val(localStorage.shipping_email);
                $('#address').val(localStorage.shipping_address);
                $('#city').val(localStorage.shipping_city);
                $('#postal_code').val(localStorage.shipping_postal_code);
                $('#phone').val(localStorage.shipping_phone);
                $('#country').val(localStorage.shipping_country).attr("selected", "selected");
                // $('#country').val('NB');
            })
        </script>
    </x-frontend.section>

</x-frontend.layout>
