// var currentValue;
// var slider;
// var updateSliderTooltip = function(){};
// var updateValues= function(){};


$(document).ready(function(){

    
    $(".toggleSearch").click(function () {
        $("#content").toggle(500);
    });


    $('.banner-slider').slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        autoplaySpeed: 6000,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });


    $('.animals-slider').slick({
        infinite: true,
        autoplay: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }

        ],
        prevArrow: '.arrow_prev',
        nextArrow: '.arrow_next',
    });


    $('.client-slider').slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
    });

    $('.button.btn.rounded-pill.btn-outline-primary').on('click', function () {
        $('.button.btn.rounded-pill.btn-outline-primary').toggleClass('active');
    });
    
    if( window.location.pathname == "/" || window.location.pathname == "/products" )
        searchFilter.updateParams();

    var customer_login_form = $("#login-form").validate({
        rules: {
            password: "required",
            email: {
                required: true,
                email: true,
            }
        }
    });

    var customer_register_form = $("#register-form").validate({
        rules: {
            name: {
                required: true,
                minlength:3,
            },
            email: {
                required: true,
                email: true
            },
            password:{
                minlength:8
            },
            password_confirmation: {
                minlength: 8,
                equalTo: "#cpassword"
            }
        }
    });

    $("#login-form-btn").on("click",function(){
        
        if(!customer_login_form.form()){
            return false;
        }
        submitRequest( $("#login-form").serialize() );
        
    })

    var add_contact_form = $("#add-contact-form").validate({
        rules: {
            name : "required",
            email : "required",
            phone : "required",
            subject : "required",
            message : "required",

        }
    });
    
    $("#add-contact-btn").on("click",function(){
        if(!add_contact_form.form()){
            return false;
        }
        
        var payload = $("#add-contact-form").serialize()
        // console.log(payload);
        $.ajax({
            url:"/add-contact",
            data: payload,
            type: "POST",
            success: function(result){
                if(result.result == "true"){
                    $("#contact-success-message").fadeIn(500);
                    $("#add-contact-form").trigger('reset');
                    $("#contact-error-message").hide();
                }
                else {
                    $("#contact-error-message").fadeIn(500);
                    $("#contact-success-message").hide();
                    
                }
                
            }
        })
        
    })

    $("#register-form-btn").on("click",function(){
        
        if(!customer_register_form.form()){
            return false;
        }

        $.ajax({
            url:"/ajax-register",
            data: $("#register-form").serialize(),
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    $("#login-error").hide();

                    Swal.fire(
                        '',
                        'A verification email has been sent to you, please check your email and verify.',
                        'success'
                      )


                    // alert("");
                    //hide registeration popup
                    user.toggleRegistration();
                    // window.location = "/profile"
                }
                else {
                  
                }
                
            },
            error: function (request, status, error) {
                console.log(request, status, error)
                if(request.status == 422){
                    messages = []
                    $.each(request.responseJSON.errors, function(field, errors){
                        messages.push(errors.join("\n"))
                    })
                    
                    login.loader.hide();
                    $("#register-error").show();
                    $("#register-error").html(messages.join(", \n"));
                }
                
            }
        })
        
    })


    function submitRequest(payload){
        $.ajax({
            url:"/ajax-login",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    user.setLoggedIn(true)
                    $("#login-error").hide();
                    window.location = result.url;
                }
                else {
                    login.loader.hide();
                    $("#login-error").show();
                    $("#login-error").html(result.error);
                }
                
            }
        })
    }

    var login = {
        loader:{
            show:function(){

            },
            hide:function(){

            }
        }
    }


    
    var customer_checkout_form = $("#customer-checkout-form").validate({
        rules: {
            name: {
                required: true,
                minlength:3,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            phone: {
                required: true,
                number: true
            }, 
            email: {
                required: true,
                email: true
            },
            agreement : "required"
        }
    });
    $(".place-order").on("click", function(e){
        e.preventDefault();
        if(!customer_checkout_form.form()){
            return false;
        }

        cart.placeOrder();

    });

    $("#customer-checkout-form #city").on("change", function(e){

        var shipping = $("#customer-checkout-form #city option:selected").val();

        cart.updateShipping( shipping )

        // var shipping = $("#customer-checkout-form #city option:selected").attr("sh")+"/-";
        // $(".checkout-shipping").text(shipping)


        


    });

    


    $(".check-user-login").on("click", function(e){
        e.preventDefault();
        if (user.getLoggedIn() === "true"){
            //redirect to checkout
            cart.redirectToCheckout();
        }
        else {
            //change redirect url
            $("#login-form #uri").val("/checkout")
            //show user login popup
            user.showLogin();
        }
    });
    


    $("#product-emi-price-dropdown").on("change", function(){
        var installment = $("#product-emi-price-dropdown option:selected").attr("price");
        
        if( $("#product-emi-price-dropdown option:selected").val() == "1"){
            var product_price = $("#product-price").attr("price");
            var advance_percentage = $("#product-emi-price-dropdown option:selected").attr("installment");
            var advance = (product_price*advance_percentage)
        
            $("#selected-installment-amount").text("RS."+advance+"/-")
            installment = advance;
        }

        $("#selected-emi-amount").text("RS."+installment+"/-")
    });

    $(".add-to-cart-btn").on("click", function(){
        var redirect = $(this).attr("redirect");
        var installment = $("#product-emi-price-dropdown option:selected").val()
        if( $(".payment-schedule.active").attr("type") == "full" ){
            installment = 0;
        }
        cart.addProduct( $(this).attr("product"), installment, redirect, function(){
            // $(".add-to-cart-btn").remove();
            // show added to cart div
            $(".cart-buttons").html('<div clas="alreadyadded">Animal added to your cart</div>')
            
        })
        
    })

    $(".remove-from-cart-btn").on("click", function(){
        var productid = $(this).attr("productid")
        cart.removeProduct( productid )
    })

    $(".cancel-order-animal").on("click", function(){
        var orderanimalid = $(this).attr("orderanimalid")
        cart.cancelOrder( orderanimalid )
    })
    $(".lumsum-order-animal").on("click", function(){
        var orderanimalid = $(this).attr("orderanimalid")
        // cart.cancelOrder( orderanimalid )
    })
    

    

    $(".payment-method").on("click", function(){
        $(".payment-method").removeClass("selected");
        $(this).addClass("selected");
        $("#payment-method").val($(this).attr("payment-method"));
    });

    $(".payment-schedule").on("click", function(e){
        e.preventDefault();
        $(".payment-schedule").removeClass("active");
        $(this).addClass("active");
        if( $(this).attr("type") == "full" ){
            $(".full-payment-schedule").show();
            $(".instalment-payment-schedule").hide();
        } else {
            $(".full-payment-schedule").hide();
            $(".instalment-payment-schedule").show();
        }
    })

    
    $("#home_search_form").on("submit", function(e){
        e.preventDefault();

        var selected_category =  $('.category_method_active.active').attr('selected_category'); 
        var product_color = $('#product_color option:selected').val();
        var weight_ci = $('#weight_ci option:selected').val();
        var price_from_to = $('#price_from').val()+"-"+$('#price_to').val();
    
        if(selected_category == undefined){
            alert('Please select a category');
            return false;
        } else if (0) {

        }

        window.location = '/products?c='+selected_category+'&co='+product_color+'&w='+weight_ci+'&p='+price_from_to;

        console.log(selected_category, product_color, weight_ci)

    });

    // SLIDERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR

    console.clear();


    ranger.bind()
    

            

        $('#price_from').on('blur', function() {
        $(this).val($(this).val().replace(/[^0-9]/i, ''));
        
        if(+$(this).val() > +$('#price_to').val()) {
            $(this).val($('#price_to').val())
        }
        
        ranger.updateValues();
        });

        $('#price_to').on('blur', function() {
        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
        
        if(+$(this).val() < +$('#price_from').val()) {
            $(this).val($('#price_from').val())
        }
        
        ranger.updateValues();
        });


        // $( "#slider-range" ).slider({
        //   range: true,
        //   min: 35000,
        //   max: 300000,
        //   values: [ 35000, 55000 ],
        //   slide: function( event, ui ) {
        //     $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        //   }
        // });
        // $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
        //   " - " + $( "#slider-range" ).slider( "values", 1 ) );
      

    /////////////////////////////////////////////////////////////////////
    
    $("#upload-reciept-form").on("submit", function(e){
        e.preventDefault();

        if( $("#upload-reciept-form [name=receipt]").val() !== "" ){
            order.uploadReciept(this);
        } else {
            Swal.fire(
                '',
                'Please select file first',
                'error'
              )

        }
    });

    // $("#search_category_btn").on("click",function(){
       
    //     var selected_category =  $('.category_method_active.active').attr('selected_category'); 
    //     var product_color = $('#product_color option:selected').val();
    //     var weight_ci = $('#weight_ci option:selected').val();
    //     if(typeof selected_category == 'undefined'){
    //         alert('No Category Selected');
    //     }

    //     $.ajax({
    //         url:"/getCategorydetails",
    //         data: {selected_category:selected_category},
    //         type: "POST",
    //         success: function(result){
    //             if(result.result == "true"){
    //                console.log(result);
    //             }
    //             else {
    //                 console.log(result);
                    
    //             }
                
    //         }
    //     })
        
    // });


    // $("#search_category_btn").on("click",function(){
        
    //     var payload = $("#product_search_form").serialize()
    //     console.log(payload);
    //     $.ajax({
    //         url:"/add-product",
    //         data: payload,
    //         type: "GET",
    //         success: function(result){
    //             login.loader.show();
    //             if(result.result == "true"){
    //                 $("#login-error").hide();
    //                 window.location = "/admin/products";
    //             }
    //             else {
    //                 login.loader.hide();
    //                 $("#login-error").show();
    //                 $("#login-error").html(result.error);
    //             }
                
    //         }
    //     })
        
    // })

    $(".category_method_active").on("click",function(e){
        e.preventDefault()
        $(".category_method_active").removeClass('active');
        $(this).addClass('active');
        
        var class_name = $(this).find("i").attr("class");
        $(".range-before-img").attr('class', class_name+' range-before-img')
        $(".range-after-img").attr('class', class_name+' range-after-img')

        

        searchFilter.updateParams();

                           


    });
        // if()
        
        // $(".payment-method").removeClass("selected");
        // $(this).addClass("selected");
        // $("#payment-method").val($(this).attr("payment-method"));
    // });
    
    
    

});

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

    
var ranger = {
    currentValue:{
        from: 35,
        to: 55
    },
    range:{
        min: 35,
        max: 55
    },
    slider:null,
    bind:function(){
        $('#slider').slider({
            range: true,
            min: ranger.range.min,
            max: ranger.range.max,
            values: [ ranger.currentValue.from, ranger.currentValue.to ],
            create: function(event, ui) {		
                ranger.slider = $(this);
                var sliderWrapper = ranger.slider.closest('.store-slider-wrapper');
                var sliderHandlers = ranger.slider.find('.ui-slider-handle');
                var sliderHandlersMin = sliderHandlers.eq(0);
                var sliderHandlersMax = sliderHandlers.eq(1);
                var sliderRange = ranger.slider.find('.ui-slider-range');
                var values = {
                from: ranger.currentValue.from,
                to: ranger.currentValue.to
                }
                
                sliderHandlersMin.attr('title', '' + values.from + 'K');
                sliderHandlersMax.attr('title', '' + values.to + 'K');
                sliderRange
                .attr('title', values.from + 'K - ' + values.to + 'K')
                .attr('data-tippy-distance', 15);;
                
                var tippyOptions = {
                    trigger: 'manual',
                    sticky: true,
                    dynamicTitle: true,
                    hideOnClick: false,
                    arrow: true,
                    arrowType: 'round',
                    animation: 'fade',
                    placement: 'top',
                    livePlacement: false,
                    flipBehavior: [],
                    createPopperInstanceOnInit: true,
                    appendTo: $(this).closest('.filter-section')[0],
                    popperOptions: {
                        modifiers: {
                            // preventOverflow: {
                            //     boundariesElement: $(this).closest('.filter-section')[0],
                            // }
                        computeStyle: {
                            gpuAcceleration: true
                        }
                        },
                    }
                };
            
            tippy(sliderHandlersMin[0], tippyOptions);
            tippy(sliderHandlersMax[0], tippyOptions);
            tippy(sliderRange[0], tippyOptions);
            
            ranger.updateSliderTooltip(ranger.slider, values);
            },
            slide: function(event, ui) {
                ranger.slider = $(this);
                var sliderWrapper = ranger.slider.closest('.store-slider-wrapper'); 
                var values = {
                    from: ui.values[0],
                    to: ui.values[1]
                }
                
                ranger.updateSliderTooltip(ranger.slider, values, true);
            }
        });
    },
    updateSliderTooltip:function(slider, values, updateInput) {
        if (typeof updateInput === "undefined")
            var updateInput = true;
        
        var sliderWrapper = slider.closest('.store-slider-wrapper');
        var sliderHandlers = slider.find('.ui-slider-handle');
        var sliderHandlersMin = sliderHandlers.eq(0);
        var sliderHandlersMax = sliderHandlers.eq(1);
        var sliderRange = slider.find('.ui-slider-range');
        
        sliderHandlersMin.attr('title', '' + values.from + 'K');
        sliderHandlersMax.attr('title', '' + values.to + 'K');
        sliderRange.attr('title', 'from ' + values.from + 'K to ' + values.to + 'K');

        if (updateInput) {
            $('#price_from').val(values.from);
            $('#price_to').val(values.to);
        }
        
        setInterval(function() {
            var tooltipMinLeft = ranger.getCoords(sliderHandlersMin[0]).left;
            var tooltipMaxLeft = ranger.getCoords(sliderHandlersMax[0]).left;

            var tooltipRange = tooltipMaxLeft - tooltipMinLeft;
            var singleTooltip = tooltipRange < 80;

            if (!singleTooltip) {
            if (!sliderHandlersMin[0]._tippy.state.visible)
                sliderHandlersMin[0]._tippy.show(0);
            if (!sliderHandlersMax[0]._tippy.state.visible)
                sliderHandlersMax[0]._tippy.show(0);
            if (sliderRange[0]._tippy.state.visible)
                sliderRange[0]._tippy.hide(0);
            } else {
            if (sliderHandlersMin[0]._tippy.state.visible)
                sliderHandlersMin[0]._tippy.hide(0);
            if (sliderHandlersMax[0]._tippy.state.visible)
                sliderHandlersMax[0]._tippy.hide(0);
            if (!sliderRange[0]._tippy.state.visible)
                sliderRange[0]._tippy.show(0);
            }
        }, 1);
    },
    updateValues:function() {
        var from = $('#price_from').val();
        var to = $('#price_to').val();
        
        ranger.updateSliderTooltip(ranger.slider, {
            from: from,
            to: to
        }, false);
        
        ranger.slider.slider({
            values: [ from, to ]
        });
    },
    getCoords:function (elem) {
        var box = elem.getBoundingClientRect();

        var body = document.body;
        var docEl = document.documentElement;

        var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
        var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

        var clientTop = docEl.clientTop || body.clientTop || 0;
        var clientLeft = docEl.clientLeft || body.clientLeft || 0;

        var top  = box.top +  scrollTop - clientTop;
        var left = box.left + scrollLeft - clientLeft;

        return { top: Math.round(top), left: Math.round(left) };
    }
}

var searchFilter = {
    updateParams:function(){
        var selected_category = $(".category_method_active.active").attr("selected_category");
        $.get('/filter-params?c='+selected_category, function(result){
            if(result.code == 200){

                if( result.c.length > 0 ){
                    var color_options = '<option value="0">Select Color</option>';
                    result.c.forEach(color => {
                        color_options += '<option value="'+color.color+'">'+color.color+'</option>';
                    });
                    $("#product_color").html(color_options)   
                }
                if( result.weight_max != null && result.weight_min != null){
                    var weight_options = "<option value='0'>Select Weight</option>";
                    
                    var min = result.weight_min - result.weight_min%10 
                    var max = (result.weight_max - result.weight_max%10) + 10

                    if( max > 1000) { 
                        max = 1000
                    }

                    for (let index = min; index < max; index = index+10) {
                        var value = index+'-'+(index+10)
                        weight_options += '<option value="'+value+'"> '+value+' Kg</option>'
                    }

                    $("#weight_ci").html(weight_options)
                }

                var range_min = result.price_min/1000;
                range_min = range_min - range_min%10
                
                var range_max = result.price_max/1000
                range_max = (range_max - range_max%10) + 10

                $( "#slider" ).slider( "option", "min", range_min );
                $( "#slider" ).slider( "option", "max", range_max );

                $('#price_from').val(range_min);
                $('#price_to').val(range_max);
                
                ranger.updateValues();


                if( window.location.pathname == "/products" ){

                    // var cat = getParameterByName("c");
                    var color = getParameterByName("co");

                    $("#product_color").val(color);


                    var price = getParameterByName("p");
                    
                    range_min = price.split("-")[0]
                    range_max = price.split("-")[1]

                    $('#price_from').val(range_min);
                    $('#price_to').val(range_max);

                    ranger.updateValues();

                    var weight = getParameterByName("w");
                    $("#weight_ci").val(weight);

                }

            }
        })
    }
}
var page = {
    toast:{
        show:function(message, type){
            
            $(".toast").removeClass("success").removeClass("danger").removeClass("warning").removeClass("info");
            
            if( type === undefined){
                type = "info"
            }
            
            $(".toast").addClass(type);
            $(".toast .toast-body").html(message)
            $(".toast").toast("show")
        }
    },
    loader:{
        show:function(){

        }, 
        hide:function(){
            
        }
    }
}
var user = {
    // isLoggedIn:false,
    showLogin:function(){
        $("#login-modal").modal("toggle")
        // $("modal-backdrop").removeClass("show");
    }, 
    toggleRegistration:function(){
        $("#register-modal").modal("toggle");
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open");
    }, 
    setLoggedIn:function(status){
        return localStorage.setItem("isLogin", status)
    },
    getLoggedIn:function(){
        return localStorage.getItem("isLogin")
    },
    redirectToProfile:function(){
        window.location = "/profile";
    }
}
var cart = {
    updateShipping:function(shipTo){
        var payload = {
            _token: $("meta[name='csrf-token']").attr("content"),
            shipping:shipTo,
        }
        $.ajax({
            url:"/shipping-cart-update",
            data: payload,
            // dataType: 'json',
            type: "POST",
            success: function(result){
                $(".cart-update-hook").html(result)
                page.toast.show("Delivery Fee updated.", "success")
            },
            error:function(error){
                page.toast.show("Something went wrong while adding this product, please try again", "danger")
                // alert()
                console.log("error",error)                // responseJSON
            }

        })
    },
    addProduct:function(productid, installment, redirect, callback){
        var payload = {
            _token: $("meta[name='csrf-token']").attr("content"),
            productid:productid,
            installment:installment
        }
        $.ajax({
            url:"/cart/add-to-cart",
            data: payload,
            dataType: 'json',
            type: "POST",
            success: function(result){
                if( result.code == 100 ){
                    user.showLogin();
                } else {
                    page.toast.show("Product added to cart.", "success");
                    if(redirect == "yes"){
                        cart.redirectToCart();
                    }else {
                        cart.updateNumber(result.cart_count);
                        if(callback != undefined){
                            callback();
                        }
                    }
                }
                console.log("success",result)
            },
            error:function(error){
                page.toast.show("Something went wrong while adding this product, please try again", "danger")
                // alert()
                console.log("error",error)                // responseJSON
            }

        })
    },
    removeProduct:function(productid){
        var payload = {
            _token: $("meta[name='csrf-token']").attr("content"),
            productid:productid
        }
        $.ajax({
            url:"/cart/remove-from-cart",
            data: payload,
            dataType: 'json',
            type: "POST",
            success: function(result){
                if( result.code == 200 ){
                    page.toast.show("Product removed from cart.", "success")
                    location.reload();
                } else {
                    page.toast.show(result.message, "danger")
                }
                console.log("success",result)
            },
            error:function(error){
                page.toast.show("Something went wrong while adding this product, please try again", "danger")
                // alert()
                console.log("error",error)                // responseJSON
            }

        })
    },
    placeOrder:function(){

        page.loader.show()

        var payload =  $("#customer-checkout-form").serialize();

        $.ajax({
            url:"/process-cart",
            data: payload,
            dataType: 'json',
            type: "POST",
            success: function(result){
                page.loader.hide();

                if( result.code == 200 ){
                    // user.redirectToProfile();
                    window.location = "/payment";
                } else {
                    page.toast.show(result.error, "danger")
                    // cart.redirectToCart();
                }
                
            },
            error:function(error){
                page.loader.hide();
                page.toast.show("Something went wrong while adding this product, please try again", "danger")
                // alert("Something went wrong while while processing your cart, please try again.")
                console.log("error",error)                // responseJSON
            }

        })
    },
    cancelOrderAnimal:function(orderAnimalId){
        page.loader.show()

        var payload = {
            _token: $("meta[name='csrf-token']").attr("content"),
            orderanimalid:orderAnimalId
        }

        $.ajax({
            url:"/cancel-order-animal",
            data: payload,
            dataType: 'json',
            type: "POST",
            success: function(result){
                page.loader.hide();

                if( result.code == 200 ){
                    user.redirectToProfile();
                } else {
                    page.toast.show("Unable to process cancelletion at this time, please try again later.", "danger")
                    // cart.redirectToCart();
                }
                
            },
            error:function(error){
                page.loader.hide();
                page.toast.show("Something went wrong while adding this product, please try again", "danger")
                // alert("Something went wrong while while processing your cart, please try again.")
                console.log("error",error)                // responseJSON
            }

        })
    },
    cancelOrder:function(){

    },
    updateNumber:function(count){
        // var currentNumber = $(".cart-icon-wrap .count").html();
        $(".cart-icon-wrap .count").html(count);
    },
    redirectToCart:function(){
        setTimeout(() => {
            window.location = "/cart"    
        }, 300);
        
    },
    redirectToCheckout:function(){
        setTimeout(() => {
            window.location = "/checkout"    
        }, 300);
        
    }
}

var order = {
    uploadReciept:function(form){
        page.loader.show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // var payload = $("#add-category-form").serialize()
        // console.log(payload);
        var formData = new FormData(form);
        
        $.ajax({
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            url:"/upload-receipt",
            dataType: "json",
            success: function(result){
                page.loader.hide();
                if(result.code == 200){
                    Swal.fire(
                        '',
                        'File successfully uploaded, we will notify you once your order has been confirmed',
                        'success'
                    )
                    
                    window.location = "/profile";
                }
                else {
                    Swal.fire(
                        '',
                        'Something went wrong, please try again.',
                        'error'
                      )
                }
                
            }
        })
    }
}