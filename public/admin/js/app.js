$(document).ready(function(){
    var add_product_form = $("#add-product-form").validate({
        rules: {
            name: "required",
            weight :  "required",
            price :  "required",
            // color :  "required",
            description :  "required",

        }
    });
    
    $("#add-product-btn").on("click",function(){
        if(!add_product_form.form()){
            return false;
        }
        
        var payload = $("#add-product-form").serialize()
        console.log(payload);
        $.ajax({
            url:"/add-product",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    $("#login-error").hide();
                    window.location = "/admin/products";
                }
                else {
                    login.loader.hide();
                    $("#login-error").show();
                    $("#login-error").html(result.error);
                }
                
            }
        })
        
    })
    
    var customer_login_form = $("#login-form").validate({
        rules: {
            password: "required",
            email: {
                required: true,
                email: true,
            }
        }
    });

    $("#login-form-btn").on("click",function(){
        
        if(!customer_login_form.form()){
            return false;
        }
        submitRequest( $("#login-form").serialize() );
        
    })


    function submitRequest(payload){
        $.ajax({
            url:"/ajax-login",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
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

})