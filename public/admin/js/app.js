$(document).ready(function(){


    


    $('#media-modal').on('shown.bs.modal', function () {
        media.loadPopupImages();
    });

    $('#media-modal_category').on('shown.bs.modal', function () {
        media.loadPopupImagesCategory();
    });

    $('.add-product-images').on('click', function () {

        $('#media-modal').modal("toggle");
        media.addNewgProductImages();
    });


    $('.add-category-images').on('click', function () {

        //$('#media-modal').modal("toggle");
        media.addNewgcategoryImage();
    });



    var media = {
        addNewgProductImages:function(){
            var addedImages = $(".image-checkbox:checkbox:checked").map(function(){
                return {
                    "id":$(this).val(),
                    "thumb":$(this).attr("thumb"),
                };
            }).get();
            var html = "";
            addedImages.forEach(image => {
                console.log(image)

                html = html + `<div class="col-sm-2 my-3">
                   <div class="animal-image">
                       <img class="img-fluid" src="${image.thumb}" image-id="${image.id}">
                       <input class="custom-checkbox image-checkbox" name="images[]" type="hidden" value="${image.id}" thumb="${image.thumb}">
                   </div>
               </div>`;
           });
           $(".added-product-images").append(html);

        },

        addNewgcategoryImage:function(){

            var addedImages1 = $(".image-checkbox:checkbox:checked").map(function(){
                return {
                    "id":$(this).val(),
                    "thumb":$(this).attr("thumb"),
                };
            }).get();
            var html = "";
            addedImages1.forEach(image => {
                console.log(image)
                console.log('ss');

                html = html + `<div class="col-sm-2 my-3">
                   <div class="animal-image">
                       
                       <input class="custom-checkbox image-checkbox" name="images" type="hidden" value="" thumb="">
                   </div>
               </div>`;
           });
           $(".add-category-images").append(html);

        },
        addExistingProductImages:function(){
            var imageIds = $(".image-checkbox:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            var payload = {
                _token:$("meta[name='csrf-token']").attr("content"),
                "images":imageIds.toString(), 

            }
            $.ajax({
                url:"/admin/fetch-images",
                data: payload,
                dataType: 'json',
                type: "POST",
                success: function(result){

                }
            })
            
        },
        loadPopupImages:function(){
            this.loadImages(0, function(images){
                media.listIamges(".modal-content .images-container", images)
            })
        },

        loadPopupImagesCategory:function(){
            this.loadImagescategory(0, function(images){
                media.listIamgescategory(".modal-content .images-container", images)
            })
        },
        listIamges:function(selector, images){
            var html = "";
            images.forEach(image => {
                 console.log(image)

                 html = html + `<div class="col-sm-2 my-3">
                    <div class="animal-image">
                        <img class="img-fluid" src="${image.path}" image-id="${image.id}">
                        <input class="custom-checkbox image-checkbox" type="checkbox" value="${image.id}" thumb="${image.thumb}">
                    </div>
                </div>`;
            });

            $(selector).append(html);
        },
        listIamgescategory:function(selector){
            var html = "";

                 html = html + `<div class="col-sm-2 my-3">
                    <div class="animal-image">
                    <input class="custom-checkbox image-checkbox" type="file" value="" thumb="">
                    </div>
                </div>`;
           $(selector).append(html);
        },
        loadImages:function(page = 0, callback){
            var payload = {
                _token:$("meta[name='csrf-token']").attr("content"),
                page:page
            }
            $.ajax({
                url:"/admin/fetch-images",
                data: payload,
                dataType: 'json',
                type: "POST",
                success: function(result){
                    login.loader.show();
                    if(result.result == "true"){
                        
                        if(callback !== undefined){
                            callback(result.data);
                        }
                    }
                    else {
                        login.loader.hide();
                        $("#login-error").show();
                        $("#login-error").html(result.error);
                    }
                    
                }
            })
        },

        loadImagescategory:function(page = 0, callback){
            var payload = {
                _token:$("meta[name='csrf-token']").attr("content"),
                page:page
            }
            $.ajax({
                url:"/admin/fetch-images",
                data: payload,
                dataType: 'json',
                type: "POST",
                success: function(result){
                    login.loader.show();
                    if(result.result == "true"){
                        
                        if(callback !== undefined){
                            callback(result.data);
                        }
                    }
                    else {
                        login.loader.hide();
                        $("#login-error").show();
                        $("#login-error").html(result.error);
                    }
                    
                }
            })
        },



    }

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


    var add_category_form = $("#add-category-form").validate({
        rules: {
            name: "required",
            description : "required",
        }
    });


    $("#add-category-btn").on("click",function(){
        if(!add_category_form.form()){
            return false;
        }
        
        var payload = $("#add-category-form").serialize()
        console.log(payload);
        $.ajax({
            url:"/admin/add-category",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    $("#login-error").hide();
                    window.location = "/admin/categories";
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