<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>giveaway.pet</title>

    <meta name="keywords" content="fairy-free.com">

    <meta name="description" content="">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <style>
        /* Ensure label does not trigger the radio */
        .no-click {
            pointer-events: none;
            /* Disables clicking on the label */
        }
    </style>

</head>



<body>
    <div class="progress-bar row">
        <div class="HH H1"></div>
    </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    <div class="show show1">
                        <h1 class="text-center section-title mb-3 mb-sm-5 mt-3 mt-sm-5">Claim Your Benefit Now!!!!</h1>
                        <div class="text-body text-center mb-5">
                            <h4 class="mb-3">Your Opinion Matters</h4>
                            <p>Please take this simple survey and you will be entered to win a same product or a gift
                                card.</p>
                        </div>
                        <div class="w-100 mb-3 text-center">Are you happy with your purchase ?</div>
                        <div class="form-satisfy row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <label class="text-center unhappy radio card">
                                    <p class="icon icon-sad"></p>
                                    <p>Unhappy</p>
                                    <input type="radio" id="unhappy" name="optionsRadios" value="unhappy">
                                </label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <label class="text-center happy radio card ">
                                    <p class="icon icon-happy"></p>
                                    <p>Happy</p>
                                    <input type="radio" id="happy" name="optionsRadios" value="happy">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="show show2 hide">
                        <h1 class="text-center section-title mb-3 mb-sm-5 mt-3 mt-sm-5">Claim Your Benefit Now!!!</h1>

                        <div class="text-body text-center mb-3 mb-sm-5">

                            <div class="icon icon-sad mb-3"></div>

                            <h4 class="mb-3" style="font-size: 20px;">We are so sorry to hear you are not satisfied.
                                Let’s solve this

                                now!</h4>

                        </div>

                        <div class="w-100 mb-3 text-center">Why are you unhappy about this?</div>

                        <div class="sad-reason">

                            {{-- 
                            <div class="form-check row" id="">
                                <input class="form-check-input reason-input" type="radio" name="unchoose1"
                                    value="Inaccurate website description">
                                <label class="form-check-label" for="reason1">Inaccurate website description</label>
                            </div> --}}


                            <div class="form-check row">
                                <input class="form-check-input reason-input custom-radio" type="radio"
                                    name="unchoose1" value="Inaccurate website description" id="reason1">
                                <label class="form-check-label no-click" for="reason1">Inaccurate website
                                    description</label>
                            </div>




                            <div class="form-check row" id="">
                                <input class="form-check-input reason-input" type="radio" name="unchoose1"
                                    value="Item defective">
                                <label class="form-check-label no-click " for="reason1">Item defective</label>
                            </div>


                            <div class="form-check row" id="">
                                <input class="form-check-input reason-input" type="radio" name="unchoose1"
                                    value="Doesn’t work">
                                <label class="form-check-label no-click " for="reason1">Doesn’t work</label>
                            </div>


                            <div class="form-check row " id="put">
                                <input class="form-check-input reason-input" type="radio" name="unchoose1"
                                    value="Others">
                                <label class="form-check-label no-click" for="reason1">Others</label>
                            </div>


                            <div class="row card otherreasion  liuy other-reason-div" style="display: none;">
                                <textarea class="unchoose-text form-control" aria-label="Please tell us what's goes wrong" placeholder="Reason...."
                                    id="unchoose_text"></textarea>
                            </div>

                            <div class="text-center" style="clear: both; color: rgb(244, 67, 54);"></div>
                            <input type="hidden" name="selected_reason" class="selected-reason">
                        </div>

                        <div class="clearfix"></div>

                        <div class="row progress-control mt-3 mt-sm-5">

                            <div class="col-md-6 col-sm-6 text-left col-6"><a href="javascript:;"
                                    class="btn btn-light runhappy1">PREV</a></div>

                            <div class="col-md-6 col-sm-6 text-right col-6"><a href="javascript:;"
                                    class="btn btn-next unhappy1 nextB">NEXT</a></div>







                        </div>
                    </div>
                    <div class="show show21 hide">
                        <h1 class="text-center section-title mb-3 mb-sm-5 mt-3 mt-sm-5">Claim Your Benefit Now!!!</h1>

                        <div class="text-body text-center mb-3 mb-sm-5">

                            <div class="icon icon-sad mb-3"></div>

                            <h4 class="mb-3" style="font-size: 20px;">We are so sorry to hear you are not satisfied.
                                Let’s solve this

                                now!</h4>

                        </div>

                        <div class="w-100 mb-3 text-center">How can we make it right?</div>

                        <div class="solutions">



                            <div class="form-check row list">
                                <input id="solutions1" class="form-check-input" type="radio" name="unchoose2"
                                    value="Get Full Refund">
                                <label class="form-check-label no-click" for="solutions1">Get Full Refund</label>
                            </div>
                            <div class="form-customerinfo card mb-5 list_in" style="display: none;">
                                <p class="w-100 mb-4">Please tell us your order ID, we will solve your problem quickly!
                                </p>
                                <form action="{{ route('save.unhappyform') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="display-selected-reason" name="option" readonly>
                                    <input type="hidden"  value="fullyfunded" name="option2" readonly>
                                    {{-- <input type="text" class="display-selected-reason" readonly> --}}

                                    <div class="form-group row mb-0">
                                        <label for="inputorderID" class="col-sm-3 col-form-label  text-right">Amazon
                                            Order ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control order" id="inputorderID01"
                                                placeholder="" value="" name="amazon_id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-1"></div>
                                        <label class="col-sm-9 col-11 mb-0" for="noid">
                                            <input class="form-check-input ml-2" type="checkbox" id="noid01"
                                                value="" >
                                            <span class="ml-2">I don’t know my order ID</span>
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName"
                                            class="col-sm-3 col-form-label  text-right">Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" class="form-control name" id="inputName01"
                                                placeholder="" value="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail"
                                            class="col-sm-3 col-form-label  text-right">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control email" id="inputEmail01"
                                                placeholder="" inputmode="email" value="" name="email" required>
                                        </div>
                                    </div>
                                    <div class="text-center tshi" style="clear: both; color: rgb(244, 67, 54);">Please
                                        input name, email address.</div>

                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                            <div class="form-check row list">
                                <input class="form-check-input" type="radio" id="solutions2" name="unchoose2"
                                    value="Get Replacement">
                                <label class="form-check-label" for="solutions2">Get Replacement</label>
                            </div>
                            <div class="form-customerinfo card mb-5 list_in" style="display: none;">
                                <p class="w-100 mb-4">Please tell us your order ID, we will solve your problem quickly!
                                </p>
                                {{-- <form action="{{ route('save.unhappyform') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="option" class="display-selected-reason" readonly>

                                    <input type="hidden"   value="GetReplacemet" name="option2" readonly>


                                    <div class="form-group row mb-0">
                                        <label for="inputorderID" class="col-sm-3 col-form-label  text-right">Amazon
                                            Order ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control order" id="inputorderID02"
                                                placeholder="" value="" name="amazon_id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-1"></div>
                                        <label class="col-sm-9 col-11 mb-0" for="noid">
                                            <input class="form-check-input ml-2 noid-checkbox" type="checkbox" id="noid">
                                            <span class="ml-2">I don’t know my order ID</span>
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAddress" class="col-sm-3 col-form-label text-right">Shipping
                                            Address</label>
                                        <div class="col-sm-9">
                                            <input type="name" class="form-control" id="inputAddress01"
                                                placeholder="Shipping Address to receive the item" value=""
                                                name="shipping_address" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName"
                                            class="col-sm-3 col-form-label  text-right">Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" class="form-control name" id="inputName02"
                                                placeholder="" value="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail"
                                            class="col-sm-3 col-form-label  text-right">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control email" id="inputEmail02"
                                                placeholder="" inputmode="email" value="" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="text-center tshi" style="clear: both; color: rgb(244, 67, 54);">Please
                                        input shipping address, name, email address.</div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form> --}}
                                <form action="{{ route('save.unhappyform') }}" method="POST" id="unhappyForm">
                                    @csrf
                                    <input type="hidden" name="option" class="display-selected-reason" readonly>
                                    <input type="hidden" value="GetReplacemet" name="option2" readonly>
                                
                                    <!-- Amazon Order ID -->
                                    <div class="form-group row mb-0">
                                        <label for="inputorderID02" class="col-sm-3 col-form-label text-right">Amazon Order ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control order" id="inputorderID02" name="amazon_id" required>
                                            <small id="orderIDError" class="text-danger d-none">Order ID is required.</small>
                                        </div>
                                    </div>
                                
                                    <!-- Checkbox for "I don’t know my order ID" -->
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-1"></div>
                                        <label class="col-sm-9 col-11 mb-0">
                                            <input class="form-check-input ml-2" type="checkbox" id="noidCheckbox">
                                            <span class="ml-2">I don’t know my order ID</span>
                                        </label>
                                    </div>
                                
                                    <!-- Shipping Address -->
                                    <div class="form-group row">
                                        <label for="inputAddress01" class="col-sm-3 col-form-label text-right">Shipping Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputAddress01" name="shipping_address" required>
                                        </div>
                                    </div>
                                
                                    <!-- Name -->
                                    <div class="form-group row">
                                        <label for="inputName02" class="col-sm-3 col-form-label text-right">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control name" id="inputName02" name="name" required>
                                        </div>
                                    </div>
                                
                                    <!-- Email -->
                                    <div class="form-group row">
                                        <label for="inputEmail02" class="col-sm-3 col-form-label text-right">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control email" id="inputEmail02" name="email" required>
                                        </div>
                                    </div>
                                
                                    <div class="text-center tshi" style="clear: both; color: rgb(244, 67, 54);">
                                        Please input shipping address, name, email address.
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                                
                                <script>
                                    document.getElementById("noidCheckbox").addEventListener("change", function() {
                                        let orderIDField = document.getElementById("inputorderID02");
                                        let orderIDError = document.getElementById("orderIDError");
                                
                                        if (this.checked) {
                                            orderIDField.removeAttribute("required");
                                            orderIDField.classList.remove("is-invalid");
                                            orderIDError.classList.add("d-none"); // Hide error message
                                        } else {
                                            orderIDField.setAttribute("required", "required");
                                        }
                                    });
                                
                                    document.getElementById("unhappyForm").addEventListener("submit", function(event) {
                                        let orderIDField = document.getElementById("inputorderID02");
                                        let orderIDError = document.getElementById("orderIDError");
                                        let checkbox = document.getElementById("noidCheckbox");
                                
                                        if (!checkbox.checked && orderIDField.value.trim() === "") {
                                            event.preventDefault(); // Stop form submission
                                            orderIDField.classList.add("is-invalid");
                                            orderIDError.classList.remove("d-none"); // Show error message
                                        }
                                    });
                                </script>
                                
                            </div>
                            <div class="form-check row list">
                                <input class="form-check-input" type="radio" id="solutions3" name="unchoose2"
                                    value="Get $10 Amazon Gift Card without refund.">
                                <label class="form-check-label" for="solutions3">Get $10 Amazon Gift Card without
                                    refund.</label>
                            </div>
                            <div class="form-customerinfo card mb-5 list_in" style="display: none;">
                                <p class="w-100 mb-4">Please tell us your order ID, we will solve your problem quickly!
                                </p>
                                <form action="{{ route('save.unhappyform') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="option" class="display-selected-reason" readonly>
                                    <input type="hidden"  value="Get_$10_Amazon_Gift_Card_Without_Refund" name="option2" readonly>

                                    <div class="form-group row mb-0">
                                        <label for="inputorderID" class="col-sm-3 col-form-label text-right">Amazon
                                            Order ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control order" id="inputorderID03"
                                                placeholder="" value="" name="amazon_id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-1"></div>
                                        <label class="col-sm-9 col-11 mb-0" for="noid">
                                            <input class="form-check-input ml-2 " type="checkbox" id="noid">
                                            <span class="ml-2">I don’t know my order ID</span>
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName"
                                            class="col-sm-3 col-form-label  text-right">Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" class="form-control name" id="inputName03"
                                                placeholder="" value="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail"
                                            class="col-sm-3 col-form-label  text-right">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control email" id="inputEmail03"
                                                placeholder="" inputmode="email" value="" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="text-center tshi" style="clear: both; color: rgb(244, 67, 54);">Please
                                        input name, email address.</div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                            <div class="form-check row list" id="put">
                                <input class="form-check-input" type="radio" id="solutions4" name="unchoose2"
                                    value="Others">
                                <label class="form-check-label" for="solutions4">Others</label>
                            </div>
                            <div style="display: none;">
                                <div class="form-customerinfo card mb-2">
                                    <p class="w-100 mb-2">Please tell us what do you want, we will solve your problem
                                        quickly!</p>
                                    <form action="{{ route('save.unhappyform') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="option" class="display-selected-reason"
                                            readonly>

                                            <input type="hidden"  value="other" name="option2" readonly>


                                        <div class="form-group row">
                                            <label for="inputName"
                                                class="col-sm-3 col-form-label  text-right">Name</label>
                                            <div class="col-sm-9">
                                                <input type="name" class="form-control name" id="inputName04"
                                                    placeholder="" value="" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail"
                                                class="col-sm-3 col-form-label  text-right">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control email" id="inputEmail05"
                                                    placeholder="" inputmode="email" value="" name="email"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="card otherreasion input-group">
                                                <textarea aria-label="Please tell us what you want..." placeholder="Please tell us what you want..." id="texr"
                                                    name="reason" required></textarea>
                                            </div>
                                        </div>
                                        <div class="text-center tshi" style="clear: both; color: rgb(244, 67, 54);">
                                            Please input name, email address.</div>

                                        <button type="submit" class="btn btn-primary float-right">Submit</button>

                                    </form>
                                </div>
                            </div>

                            <div class="row progress-control mt-3 mt-sm-5">

                                <div class="col-md-6 col-sm-6 text-left col-6"><a href="javascript:;"
                                        class="btn btn-light runhappy2">PREV</a></div>

                                {{-- <div class="col-md-6 col-sm-6 text-right col-6"><a href="javascript:;"
                                        class="btn btn-next unhappy2">NEXT</a></div> --}}

                            </div>



                            <input type="hidden" id="unchoose2">

                        </div>

                        <script>
                            $('.list').click(function() {
                                $('.list').next().hide();
                                $('.list').next().children('form').removeClass('active');
                                $(this).next().show();
                                $(this).next().find('form').addClass('active');
                                $('.tshi').hide();
                            });
                        </script>
                    </div>

                    <div class="show show3 hide">
                        <h1 class="text-center section-title mb-3 mb-sm-5 mt-3 mt-sm-5">Claim Your Benefit Now!!!</h1>
                        <div class="text-body text-center mb-3 mb-sm-5">
                            <div class="icon icon-happy mb-3"></div>
                            <h4 class="mb-3" style="font-size: 20px;">We’re so happy that you’re happy.</h4>
                        </div>
                        <div class="w-100 mb-3 text-center">We want to kindly ask - could you do us a favor and leave
                            us
                            a honest review on Amazon?</div>
                        <div class="row text-center mb-1 mb-sm-5">
                            <a href="https://www.amazon.co.uk/review/create-review/?asin=B08WK68Y3V%3A5"
                                class="btn btn-primary col-8 offset-2 btn-reviews" target="_blank">Click to Give us a
                                5-star</a>
                        </div>
                        <div class="row bonus-info">
                            <div class="col-md-4 col-sm-12 text-center">
                                <span class="icon icon-bonus"></span>
                            </div>
                            <div class="col-md-8 col-sm-12 align-self-center">As our sincere appreciation, we will send
                                you <span>the <span class="text-primary">Same Item</span> that you purchased</span> for
                                free, or we will send you <span class="text-primary">a $15 Amazon gift
                                    card.</span>&nbsp; </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row progress-control mt-3 mt-sm-5">
                            <div class="col-md-6 col-sm-6 text-left col-6"><a href="javascript:;"
                                    class="btn btn-light rhappy1">PREV</a></div>
                            <div class="col-md-6 col-sm-6 text-right col-6"><a href="javascript:;"
                                    class="btn btn-next happy1">NEXT</a></div>
                        </div>
                    </div>
                    <div class="show show31 hide">

                        <style>
                            .a01 *,
                            .cardForm * {
                                max-width: 100%;
                            }

                            .file_img {
                                width: 40%;
                                margin: 0 10px;
                            }

                            @media screen and (max-width: 768px) {
                                .file_img {
                                    width: 100%;
                                    margin: 10px 0;
                                }
                            }
                        </style>
                        <h1 class="text-center section-title mb-3 mb-sm-5 mt-3 mt-sm-5">Claim Your Benefit Now!!!</h1>

                        <div class="text-body text-center mb-3 mb-sm-5">

                            <div class="icon icon-happy mb-3"></div>

                            <h4 class="mb-3" style="font-size: 20px;">We’re so happy that you’re happy.</h4>

                        </div>

                        <div class="w-100 mb-3 text-center">Which bonus would you like to choose?</div>

                        <div class="form-gift mb-3 row">


                            <div class="col-md-6 col-sm-6 col-6">

                                <label class="text-center radio card rs">

                                    <p class="icon icon-product"
                                        style="background-image: url(Uploads/images/2021/06/03/1622719547_img.svg);">
                                    </p>

                                    <p>Same Item for Free</p>

                                    <input type="radio" name="lihe" value="Same Item for Free">

                                </label>

                            </div>


                            <div class="col-md-6 col-sm-6 col-6">

                                <label class="text-center radio card rs">

                                    <p class="icon icon-product"
                                        style="background-image: url(Uploads/images/2021/06/03/1622719533_img.svg);">
                                    </p>

                                    <p>15 Gift Card</p>

                                    <input type="radio" name="lihe" value="15 Gift Card">

                                </label>

                            </div>


                        </div>

                        <div>

                            <div class="form-customerinfo card a a01" style="overflow: hidden;">

                                <p class="w-100 mb-4">
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    <span> </span>
                                </p>
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    Please kindly support our growing business by&nbsp;<span
                                        style="box-sizing:border-box;font-weight:bolder;">leaving us 5
                                        stars</span>&nbsp;to claim your reward!
                                </p>
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    <span style="box-sizing:border-box;font-weight:bolder;">MAKE SURE TO SAVE YOUR
                                        REVIEW SCREENSHOT AFTER LEAVING THE REVIEW, PLEASE RETURN HERE TO UPLOAD
                                        IT</span>
                                </p>
                                <p>
                                    <br>
                                </p>
                                <br>

                                <form action="{{ route('save.form') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row" style="justify-content: center;align-items: center;">

                                        <div class="uploader">

                                            <input type="text" id="filename" readonly="">

                                            <img src="image/dp.png" alt="" style="width:45px;" required>

                                            <input type="file" name="pic" size="30" id="file">

                                        </div>
                                        <div class="file_img"><a
                                                href="Uploads/images/2021/09/30/1632986580_classify_img.png"><img
                                                    src="Uploads/images/2021/09/30/1632986580_classify_img.png"></a>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputEmail" class="col-sm-2 col-form-label  text-right">order
                                            ID</label>

                                        <div class="col-sm-10">

                                            <input type="text" class="form-control" name="order_id" required>


                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputEmail"
                                            class="col-sm-2 col-form-label  text-right">Email</label>

                                        <div class="col-sm-10">

                                            <input type="email" class="form-control" name="email" id="email"
                                                required>


                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputName" class="col-sm-2 col-form-label  text-right">amazon
                                            Name</label>

                                        <div class="col-sm-10">

                                            <input type="text" class="form-control" name="amazon_name"
                                                id="name" required>


                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputAddress" class="col-sm-2 col-form-label  text-right">Shipping
                                            Address</label>

                                        <div class="col-sm-10">

                                            <input type="text" class="form-control" name="shippingAddress"
                                                id="shippingAddress" required>


                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>

                                </form>


                                <div class="text-center tshi"
                                    style="clear: both; color: rgb(244, 67, 54); display: none;">Please input email
                                    address, name.review screenshot</div>

                            </div>

                            <div class="form-customerinfo card a" style="display: none;overflow.hidden;">

                                <p class="w-100 mb-4">
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    <span> </span>
                                </p>
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    Please kindly support our growing business by&nbsp;<span
                                        style="box-sizing:border-box;font-weight:bolder;">leaving us 5
                                        stars</span>&nbsp;to claim your reward!
                                </p>
                                <p class="reviewCardStyle"
                                    style="box-sizing:border-box;font-family:Rubik, sans-serif;margin-top:0px;margin-bottom:0px;font-size:16px;width:700px;color:rgba(0, 0, 0, 0.65);white-space:normal;background-color:#FFFFFF;">
                                    <span style="box-sizing:border-box;font-weight:bolder;">MAKE SURE TO SAVE YOUR
                                        REVIEW SCREENSHOT AFTER LEAVING THE REVIEW, PLEASE RETURN HERE TO UPLOAD
                                        IT</span>
                                </p>
                                <p>
                                    <br>
                                </p>
                                <br>

                                <form enctype="multipart/form-data">

                                    <div class="form-group row" style="ustify-content: center;align-items: center;">

                                        <div class="uploader">

                                            <input type="text" id="filename" readonly="">

                                            <img src="image/dp.png" alt="" style="width:45px;">

                                            <input type="file" size="30" name="pic" id="file2">

                                        </div>
                                        <div class="file_img"><a
                                                href="Uploads/images/2021/09/30/1632986580_classify_img.png"><img
                                                    src="Uploads/images/2021/09/30/1632986580_classify_img.png"></a>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <label for="inputEmail" class="col-sm-2 col-form-label  text-right">order
                                            ID</label>

                                        <div class="col-sm-10">

                                            <input type="text" class="form-control id2" name="data[input_id]"
                                                id="" placeholder="" inputmode="text" value="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputEmail"
                                            class="col-sm-2 col-form-label  text-right">Email</label>

                                        <div class="col-sm-10">

                                            <input type="email" class="form-control email2" name="data[email]"
                                                id="inputEmail" placeholder="" inputmode="email" value="">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputName" class="col-sm-2 col-form-label  text-right">amazon
                                            Name</label>

                                        <div class="col-sm-10">

                                            <input type="name" class="form-control name2" name="data[name]"
                                                id="inputName" placeholder="" inputmode="text" value="">

                                        </div>

                                    </div>

                                </form>

                                <div class="text-center tshi"
                                    style="clear: both; color: rgb(244, 67, 54); display: none;">Please input email
                                    address, name.review screenshot</div>

                            </div>


                        </div>

                        <div class="clearfix"></div>

                        <div class="row progress-control mt-3 mt-sm-5">

                            <div class="col-md-6 col-sm-6 text-left col-6"><a href="javascript:;"
                                    class="btn btn-light rhappy2">PREV</a></div>
                            {{-- 
                            <div class="col-md-6 col-sm-6 text-right col-6"><a href="javascript:;"
                                    class="btn btn-next happy2">NEXT</a></div> --}}
                            {{-- <div class="col-md-6 col-sm-6 text-right col-6">
                                        <a href="javascript:;" class="btn btn-next happy2" id="nextButton">NEXT</a>
                                    </div> --}}

                        </div>


                    </div>
                </div>
            </div>


            <div class="copyright text-center" style="width:100%;">
                <p>Copyright &copy; 2023 . All Rights Reserved.</p>
            </div>
        </div>

    </main>




    <script src="js/bootstrap.min.js"></script>

    <script src="js/style.js?ed=1741653354"></script>

    <script>
        $(function() {
            $("input[type=file]").change(function() {
                $(this).parents(".uploader").find("#filename").val($(this).val());
            });
            $("input[type=file]").each(function() {
                if ($(this).val() == "") {
                    $(this).parents(".uploader").find("#filename").val("Upload Review Screenshot");
                }
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form'); // Select the form
            const nextButton = document.getElementById('nextButton'); // Select the "NEXT" button

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Perform any form validation or submission logic here

                // Hide the "NEXT" button
                nextButton.style.display = 'none';

                // Optionally, you can submit the form via AJAX or any other method here
                // For example:
                // fetch(form.action, {
                //     method: form.method,
                //     body: new FormData(form)
                // }).then(response => {
                //     if (response.ok) {
                //         // Handle success
                //     } else {
                //         // Handle error
                //     }
                // });
            });
        });
    </script> --}}







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const reasonInputs = document.querySelectorAll(".reason-input");
            const otherReasonDiv = document.querySelector(".other-reason-div");
            const selectedReasonInput = document.querySelector(".selected-reason");
            const displaySelectedReasons = document.querySelectorAll(
                ".display-selected-reason"); // Select all instances
            const otherReasonTextarea = document.querySelector(".unchoose-text");

            // Function to update all display fields
            function updateDisplay(value) {
                selectedReasonInput.value = value;
                displaySelectedReasons.forEach(el => el.value = value);
            }

            reasonInputs.forEach(input => {
                input.addEventListener("change", function() {
                    if (this.value === "Others") {
                        otherReasonDiv.style.display = "block";

                        // Manually trigger the textarea event on first click
                        if (!otherReasonTextarea.value) {
                            otherReasonTextarea.value = ""; // Ensure empty value is set
                            updateDisplay(""); // Set initial empty value
                        }

                        otherReasonTextarea.focus(); // Focus on textarea for user input
                    } else {
                        otherReasonDiv.style.display = "none";
                        updateDisplay(this.value);
                    }
                });
            });

            // Always listen for textarea input
            otherReasonTextarea.addEventListener("input", function() {
                updateDisplay(otherReasonTextarea.value);
            });
        });
    </script>
    <script>
        // Function to check if any radio is selected
        function checkRadioSelection() {
            let radios = document.querySelectorAll('.reason-input'); // Get all radio buttons
            let nextBtn = document.getElementById('nextB'); // Get the NEXT button

            // Check if any radio is selected
            let isChecked = Array.from(radios).some(radio => radio.checked);

            // Enable or disable NEXT button
            if (isChecked) {
                nextBtn.classList.remove('disabled'); // Enable button
            } else {
                nextBtn.classList.add('disabled'); // Disable button
            }
        }

        // Add event listener to all radio buttons
        document.querySelectorAll('.reason-input').forEach(radio => {
            radio.addEventListener('change', checkRadioSelection);
        });

        // Initially disable the NEXT button
        checkRadioSelection();
    </script>

    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>

<script>
    document.querySelectorAll(".noid-checkbox").forEach((checkbox, index) => {
        checkbox.addEventListener("change", function() {
            let orderIDField = document.querySelectorAll(".order")[index];

            if (this.checked) {
                orderIDField.removeAttribute("required");
            } else {
                orderIDField.setAttribute("required", "required");
            }
        });
    });
</script>

</body>
