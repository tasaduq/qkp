$(document).ready(function(){


    


    $('#media-modal').on('shown.bs.modal', function () {
        media.loadPopupImages();
    });

    $('#media-modal_category').on('shown.bs.modal', function () {
        media.loadPopupImagesCategory();
    });

    
    $(document).on('click', '.remove-product-image', function (e) {
        e.preventDefault();
        $(this).parent(".animal-image").remove();
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
                       <button class="remove-product-image">Remove</button>
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
            $(selector).html(html);
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
            weight :  {
                required: true,
                number: true
            },
            price :  {
                required: true,
                number: true
            },
            // color :  "required",
            // description :  "required",

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

    
    var update_settings_form = $("#update-settings-form").validate({
        rules: {
            eid_date :  {
                required: true,
            },
            enable_tax :  {
                required: true,
            },
            overdue_penalty:  {
                required: true,
                number: true
            },
            tax_value :  {
                required: true,
                number: true
            },
            bank_name :  {
                required: true,
            },
            account_title :  {
                required: true,
            },
            account_number :  {
                required: true,
            },
            regular_advance :  {
                required: true,
                number: true
            },
            final_advance :  {
                required: true,
                number: true
            },

        }
    });
    
    $("#update-settings-btn").on("click",function(){
        if(!update_settings_form.form()){
            return false;
        }
        
        var payload = $("#update-settings-form").serialize()
        console.log(payload);
        $.ajax({
            url:"/update-settings",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    $("#settings-error").hide();
                    window.location = "/admin/settings";
                }
                else {
                    login.loader.hide();
                    $("#settings-error").show();
                    $("#settings-error").html(result.error);
                }
                
            }
        })
        
    })

    var update_shipping_form = $("#update-shipping-form").validate({
        rules: {
            cost :  {
                required: true,
            },
        }
    });

    $("#update-shipping-btn").on("click",function(){
        if(!update_shipping_form.form()){
            return false;
        }
        
        var payload = $("#update-shipping-form").serialize()
        console.log(payload);
        $.ajax({
            url:"/update-shipping",
            data: payload,
            type: "POST",
            success: function(result){
                login.loader.show();
                if(result.result == "true"){
                    $("#settings-error").hide();
                    window.location = "/admin/shipping";
                }
                else {
                    login.loader.hide();
                    $("#settings-error").show();
                    $("#settings-error").html(result.error);
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

//$("#add-category-form").on("click",function(){
    $("#add-category-form").submit(function(e) {    
        e.preventDefault();
        if(!add_category_form.form()){
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // var payload = $("#add-category-form").serialize()
        // console.log(payload);
        var formData = new FormData(this);
        
        $.ajax({
            type: "POST",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            url:"/admin/add-category",
            dataType: "json",
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

    var login = {
        loader:{
            show:function(){

            },
            hide:function(){

            }
        }
    }
 
    
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

       var modal = document.querySelector(".dh-modal");
       var closeButton = document.querySelector(".dh-close-button");

       function toggleModal() {
        modal.classList.toggle("dh-show-modal");
       }

       function windowOnClick(event) {
           if (event.target === modal) {
            toggleModal();
           }
       }

       closeButton.addEventListener("click", toggleModal);
       window.addEventListener("click", windowOnClick);

 
                       function showPreloader(jBlock) {

                       var preloader = jQuery('<div class="preloader"></div>');
                       var target = jBlock;
                       if (!target) {
                       target = jQuery('body');
                       preloader.addClass('fixed');
                       } else {
                       target = jQuery(target);
                       }

                       if (target.hasClass('preloader-container')) {
                       return;
                       }

                       target.addClass('preloader-container').append(preloader);
                       var $preloader = target.find('.preloader');

                       jQuery(window).resize();
                       }

                       function hidePreloader(jBlock) {
                       if (!jBlock) {
                       jBlock = jQuery('.preloader-container');
                       }
                       jBlock.children('.preloader').remove();
                       jBlock.removeClass('preloader-container');
                       }

       $(".verify-order-payment").on("click", function(e){
        e.preventDefault();
        var orderId = $(this).data('orderid');
                       var orderNum = $(this).data('ordernum');
                  if(orderId > 0 && orderNum > 0) {
               $.ajax({
                   url:APP_URL+"/admin/verify_order/confirmation/"+orderId,
                   dataType: 'json',
                   type: "GET",
                   beforeSend: function () {
                       showPreloader();
                   },
                   success: function(result){
                       hidePreloader();
                    if(result.code == 200){
                       $('.update-order-status').attr('data-orderid', orderId);
                       $('#verify-order-note').val('');

                       if(result.receiptImg != null) {
                        $('#receiptImg').html('<img class="img-fluid" src="'+result.receiptImg+'" alt="order_receipt" />');
                       } else {
                       $('#receiptImg').html('');
                       }
                       $('#verifyOrderModalLabel').html('Order #'+orderNum);
                       $("#verifyOrderModal").modal('show');
                    }
                    else {
                       $('.dh-modal-h2').html('Something want wrong');
                       $('.dh-modal-p').html('Nothing found, please try again.');
                       toggleModal();
                    }
                   }
               });
                       }
       });

                       $(".update-order-status").on("click", function(e){
                       e.preventDefault();
                       var orderId = $(this).data('orderid');
                       var orderState = $(this).data('orderstate');
                       var orderNote = $('#verify-order-note').val();

                       if(orderId > 0) {
                       $.ajaxSetup({
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                       });

                       $.ajax({
                       url:APP_URL+"/admin/update_order_status/"+orderState+"/"+orderId,
                       data: {
                       "order_note": orderNote
                       },
                       dataType: 'json',
                       type: "POST",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.dh-modal-h2').html('Success');
                       $('.dh-modal-p').html('Order status updated.');
                       toggleModal();
                       setTimeout( function(){
                            location.reload();
                       }  , 2500 );
                       }
                       else {
                       $('.dh-modal-h2').html('Success');
                       $('.dh-modal-p').html('Nothing update, please try again.');
                       toggleModal();
                       }
                       }
                       });
                       }
                       });

                       $(".verify-order-cancellation").on("click", function(e){
                       e.preventDefault();
                       var orderId = $(this).data('orderid');
                       var orderNum = $(this).data('ordernum');
                       if(orderId > 0 && orderNum > 0) {
                       $.ajax({
                       url:APP_URL+"/admin/verify_order/cancellation/"+orderId,
                       dataType: 'json',
                       type: "GET",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.update-order-cancellation-status').attr('data-orderid', orderId);
                       $('#verify-order-note').val('');

                       $('#verifyOrderCancellationModalLabel').html('Order #'+orderNum+' Cancellation Request');
                       $("#verifyOrderCancellationModal").modal('show');
                       }
                       else {
                       $('.dh-modal-h2').html('Something went wrong');
                       $('.dh-modal-p').html('Nothing found, please try again.');
                       toggleModal();
                       }
                       }
                       });
                       }
                       });

                       $(".update-order-cancellation-status").on("click", function(e){
                       e.preventDefault();
                       var orderId = $(this).data('orderid');
                       var orderState = $(this).data('orderstate');
                       var orderNote = $('#verify-order-cancellation-note').val();

                       if(orderId > 0) {
                       $.ajaxSetup({
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                       });

                       $.ajax({
                       url:APP_URL+"/admin/update_order_status/"+orderState+"/"+orderId,
                       data: {
                       "order_note": orderNote
                       },
                       dataType: 'json',
                       type: "POST",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.dh-modal-h2').html('Success');
                       $('.dh-modal-p').html('Order status updated.');
                       toggleModal();
                       setTimeout( function(){
                       location.reload();
                       }  , 2500 );
                       }
                       else {
                       $('.dh-modal-h2').html('Somwthing went wrong');
                       $('.dh-modal-p').html('Nothing update, please try again.');
                       toggleModal();
                       }
                       }
                       });
                       }
                       });

                       $(".update-order-upd-status").on("click", function(e){
                       e.preventDefault();
                       var orderId = $(this).data('orderid');
                       var orderState = $(this).data('orderstate');
                       var orderStatus = $('#updstatus option:selected').val();

                       if(orderId > 0) {
                       $.ajaxSetup({
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                       });

                       $.ajax({
                       url:APP_URL+"/admin/update_order_status/"+orderState+"/"+orderId,
                       data: {
                       "order_status": orderStatus
                       },
                       dataType: 'json',
                       type: "POST",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.dh-modal-h2').html('Success');
                       $('.dh-modal-p').html('Order status updated.');
                       toggleModal();
                       setTimeout( function(){
                       location.reload();
                       }  , 2500 );
                       }
                       else {
                       $('.dh-modal-h2').html('Something went wrong');
                       $('.dh-modal-p').html('Nothing update, please try again.');
                       toggleModal();
                       }
                       }
                       });
                       }
                       });

                       $(".verify-installment-payment").on("click", function(e){
                       e.preventDefault();
                       var orderNum = $(this).data('ordernum');
                       var instId = $(this).data('instid');
                       var instNum = $(this).data('instnum');
                       if(orderNum > 0 && instId > 0 && instNum > 0) {
                       $.ajax({
                       url:APP_URL+"/admin/verify_installment/"+instId,
                       dataType: 'json',
                       type: "GET",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.update-installment-status').attr('data-instid', instId);
                       $('#verify-installment-note').val('');

                       if(result.receiptImg != null) {
                       $('#receiptImg').html('<img class="img-fluid" src="'+result.receiptImg+'" alt="installment_receipt" />');
                       } else {
                       $('#receiptImg').html('');
                       }

                       $('#verifyInstallmentModalLabel').html('Installment #'+instNum+' of Order #'+orderNum);
                       $("#verifyInstallmentModal").modal('show');
                       }
                       else {
                       alert('Nothing found, please try again!');
                       }
                       }
                       });
                       }
                       });

                       $(".update-installment-status").on("click", function(e){
                       e.preventDefault();
                       var instId = $(this).data('instid');
                       var instState = $(this).data('inststate');
                       var instNote = $('#verify-installment-note').val();

                       if(instId > 0) {
                       $.ajaxSetup({
                       headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                       });

                       $.ajax({
                       url:APP_URL+"/admin/update_installment_status/"+instState+"/"+instId,
                       data: {
                       "installment_note": instNote
                       },
                       dataType: 'json',
                       type: "POST",
                       beforeSend: function () {
                       showPreloader();
                       },
                       success: function(result){
                       hidePreloader();
                       if(result.code == 200){
                       $('.dh-modal-h2').html('Success');
                       $('.dh-modal-p').html('Installment status updated.');
                       toggleModal();
                       setTimeout( function(){
                       location.reload();
                       }  , 2500 );
                       }
                       else {
                       $('.dh-modal-h2').html('Something went wrong');
                       $('.dh-modal-p').html('Nothing update, please try again.');
                       toggleModal();
                       }
                       }
                       });
                       }
                       });

                       
                       $(".user-filters-btn").on("click", function(e){
                        e.preventDefault();
 
                         $("#userFiltersModal").modal('show');
                        });


                       $(".product-filters-btn").on("click", function(e){
                        e.preventDefault();
 
                         $("#productFiltersModal").modal('show');
                        });

                       $(".order-filters-btn").on("click", function(e){
                       e.preventDefault();

                        $("#orderFiltersModal").modal('show');
                       });
                       

                       $(".order-payment-receipt").on("click", function(e){
                       e.preventDefault();

                       $("#paymentReceiptModal").modal('show');
                       });


    $(".make-admin").on('click',function(e){
        e.preventDefault()
        var payload = {
            _token:$("meta[name='csrf-token']").attr("content"),
            userid:$(this).attr("id"),
            role:"admin",
        }
        admin.role.update(payload)
    })
    $(".remove-admin").on('click',function(e){
        e.preventDefault()
        var payload = {
            _token:$("meta[name='csrf-token']").attr("content"),
            userid:$(this).attr("id"),
            role:"user",
        }
        admin.role.update(payload)
    })
    
    $(".bulk-product-delete").on('click',function(e){
        e.preventDefault();
        var products = $(".productCheckbox:checked").map(function(){
            return $(this).val();
        }).get(); 

        if( products.length == 0){
              alert('Please select atleast one product to proceed')
              return false;
        } 

        
    })
    $(".apply-bulk-product-status").on('click',function(e){
        e.preventDefault();
        var products = $(".productCheckbox:checked").map(function(){
            return $(this).val();
        }).get(); 

        if( products.length == 0){
              alert('Please select atleast one product to proceed')
              return false;
        } else if( $("#bulk-status").val() == "" ){
            alert('Please select product status to apply')
            return false;   
        } 
        var payload = {
            _token:$("meta[name='csrf-token']").attr("content"),
            status:$("#bulk-status").val(),
            product:products
        }
        admin.products.bulk_update(payload);
    })
    var admin = {
        role:{
            update:function(payload){
                $.ajax({
                    url:"/update-role",
                    data: payload,
                    type: "POST",
                    success: function(result){
                        login.loader.show();
                        if(result.result == "true"){
                            location.reload();
                        }
                        else {
                            alert('something went wrong!')
                        }
                        
                    }
                })
            }
        },
        products:{
            bulk_update:function(payload){
                $.ajax({
                    url:"/product-update-bulk",
                    data: payload,
                    type: "POST",
                    success: function(result){
                        login.loader.show();
                        if(result.result == "true"){
                            location.reload();
                        }
                        else {
                            alert('something went wrong!')
                        }
                        
                    }
                })
            }
        }
    }
});
