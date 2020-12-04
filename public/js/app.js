$(document).ready(function(){
    
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
            name: "required",
            email :  "required",
            phone :  "required",
            subject :  "required",
            message :  "required",

        }
    });
    
    $("#add-contact-btn").on("click",function(){
        if(!add_contact_form.form()){
            return false;
        }
        
        var payload = $("#add-contact-form").serialize()
        console.log(payload);
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
                    alert("Your account has been created, please login");
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
        var shipping = $("#customer-checkout-form #city option:selected").attr("sh")+"/-";
        $(".checkout-shipping").text(shipping)
        page.toast.show("Shipping charges updated.")
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
        var price = $("#product-emi-price-dropdown option:selected").attr("price")
        $("#selected-emi-amount").text("RS."+price+"/-")
    });

    $(".add-to-cart-btn").on("click", function(){
        var installment = $("#product-emi-price-dropdown option:selected").val()
        cart.addProduct( $(this).attr("product"), installment )
        
    })
    

});

var page = {
    toast:{
        show:function(message){
            //do someting witht this message
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
    addProduct:function(productid, installment){
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
                    page.toast.show("Product added to cart.")
                    cart.redirectToCart();
                }
                console.log("success",result)
            },
            error:function(error){
                alert("Something went wrong while adding this product, please try again")
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
                    user.redirectToProfile();
                } else {
                    page.toast.show("Unable to process cart at this time, please try again later.")
                    // cart.redirectToCart();
                }
                
            },
            error:function(error){
                page.loader.hide();

                alert("Something went wrong while while processing your cart, please try again.")
                console.log("error",error)                // responseJSON
            }

        })
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