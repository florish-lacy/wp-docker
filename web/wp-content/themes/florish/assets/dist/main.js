const _=()=>{jQuery(document).ready(function(){jQuery(".woocommerce-pagination .prev").html('<i class="fa-solid fa-chevron-left"></i>'),jQuery(".woocommerce-pagination .next").html('<i class="fa-solid fa-chevron-right"></i>'),jQuery(".tabs").on("click",".cl_tab",function(e){e.preventDefault(),jQuery(".cl_tab").removeClass("active"),jQuery(".plant-list").removeClass("active"),jQuery(this).addClass("active"),jQuery(jQuery(this).attr("href")).addClass("active")}),jQuery("<span class='clickD'></span>").insertAfter(".navbar-nav li.menu-item-has-children > a"),jQuery(".navbar-nav li .clickD").click(function(e){e.preventDefault();const r=jQuery(this);r.next().hasClass("show")?(r.next().removeClass("show"),r.removeClass("toggled")):(r.next().slideToggle(),r.toggleClass("toggled"))}),jQuery(window).on("resize",function(){jQuery(this).width()<1025&&(jQuery("html").click(function(){jQuery(".navbar-nav li .clickD").removeClass("toggled"),jQuery(".toggled").removeClass("toggled"),jQuery(".sub-menu").removeClass("show")}),jQuery(document).click(function(){jQuery(".navbar-nav li .clickD").removeClass("toggled"),jQuery(".toggled").removeClass("toggled"),jQuery(".sub-menu").removeClass("show")}),jQuery(".navbar-nav").click(function(e){e.stopPropagation()}))}),jQuery(".navbar-toggler").click(function(){jQuery(".navbar-toggler").toggleClass("open"),jQuery(".navbar-toggler .stick").toggleClass("open"),jQuery("body,html").toggleClass("open-nav")}),jQuery(".grid-item").width(),window.onresize=function(){jQuery(".grid-item").width()};const s=jQuery(".grid").masonry({itemSelector:".grid-item",columnWidth:".grid-item",gutter:15,fitWidth:!0});s.imagesLoaded().progress(function(){s.masonry("layout")}),jQuery(".open-popup-link").magnificPopup({type:"inline",midClick:!0,mainClass:"mfp-fade"}),jQuery("#UserRegForm").validate({rules:{first_name:{required:!0,lettersonly:!0},last_name:{required:!0,lettersonly:!0},email:{required:!0,email:!0},password:{required:!0,minlength:6},confirm_password:{required:!0,minlength:6,equalTo:"#password"}},messages:{first_name:{required:"Please enter your first name",lettersonly:"Only alphabets are allowed and check blank spaces"},last_name:{required:"Please enter your last name",lettersonly:"Only alphabets are allowed and check blank spaces"},email:"Please enter a valid email address",password:{required:"Please provide a password",minlength:"Your password must be at least 6 characters long"},confirm_password:{required:"Please provide a Confirm password",minlength:""}},submitHandler(r){jQuery("#reg_btn").prop("disabled",!0);var r=jQuery("#UserRegForm")[0];const a=new FormData(r);a.append("action","user_ajax_register"),jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:a,processData:!1,contentType:!1,cache:!1,success(o){const t=JSON.parse(o);t.error==!0&&jQuery(".response_essage").html('<div class="alert alert-danger" role="alert">'+t.message+"</div>"),t.error==!1&&(jQuery(".response_essage").html('<div class="alert alert-success" role="alert">'+t.message+"</div>"),jQuery("#UserRegForm").trigger("reset"),jQuery("#reg_btn").prop("disabled",!1))}})}}),jQuery("#loginForm").validate({submitHandler(e){const r=jQuery("input[name=user_email]").val(),a=jQuery("input[name=user_password]").val(),o=jQuery("#security").val();jQuery.ajax({type:"POST",dataType:"json",url:ajax_florish_object.ajax_url,data:{action:"user_ajax_login",email:r,password:a,security:o},success(t){t.error==!0&&jQuery(".response_messages").html('<div class="alert alert-danger" role="alert">'+t.message+"</div>"),t.error==!1&&(jQuery(".response_messages").html('<div class="alert alert-success" role="alert">'+t.message+"</div>"),t.role=="nursery"?setTimeout(function(){window.location.href=ajax_florish_object.vendor_url},1e3):setTimeout(function(){window.location.href=ajax_florish_object.home_url+"/my-account"},1e3))}})}}),jQuery("#eye1,#eye2").click(function(){jQuery(this).hasClass("fa-eye-slash")?(jQuery(this).removeClass("fa-eye-slash"),jQuery(this).addClass("fa-eye"),jQuery(".password").attr("type","text")):(jQuery(this).removeClass("fa-eye"),jQuery(this).addClass("fa-eye-slash"),jQuery(".password").attr("type","password"))}),jQuery("#location_div").hide(),jQuery("#user_location").prop("required",!1),jQuery("#user_location_lat").prop("required",!1),jQuery("#user_location_long").prop("required",!1),jQuery("#select_user_role").on("change",function(){this.value=="nursery"?(jQuery("#location_div").show(),jQuery("#user_location").prop("required",!0),jQuery("#user_location_lat").prop("required",!0),jQuery("#user_location_long").prop("required",!0)):(jQuery("#location_div").hide(),jQuery("#user_location").prop("required",!1),jQuery("#user_location_lat").prop("required",!1),jQuery("#user_location_long").prop("required",!1))}),jQuery(document).on("click",".view_nur_qty",function(){const e=jQuery(this).data("orderid");jQuery.ajax({type:"POST",url:ajax_florish_object.ajax_url,data:{action:"nursery_order_view",order_id:e},success(r){jQuery("#exampleModal").modal("show"),jQuery(".mdl-cus-content").html(r)}})}),jQuery(document).on("click",".view_nur_id",function(){const e=jQuery(this).data("userid");jQuery.ajax({type:"POST",url:ajax_florish_object.ajax_url,data:{action:"nursery_profile_view",user_id:e},success(r){jQuery.magnificPopup.open({items:{src:"#view-nursery-popup"},type:"inline"}),jQuery(".nursery-full-content").html(r)}})}),jQuery("#input_4_5").change(function(){jQuery("#input_4_7").val()==""&&jQuery(this).val("")}),jQuery("#input_7_5").change(function(){jQuery("#input_7_7").val()==""&&jQuery(this).val("")}),jQuery("#zipcode_submit").on("click",function(){zip=jQuery("#zip").val(),jQuery.getJSON("https://phzmapi.org/"+zip+".json",function(e){json=JSON.stringify(e);const r=JSON.parse(json);jQuery.cookie("customer_usda_zip",json,{expires:1,path:"/"}),jQuery.cookie("customer_usd_zipcode",zip,{expires:1,path:"/"}),jQuery("#usda_zone").html(r.zone),setTimeout(function(){window.location.href=ajax_florish_object.current_url},1e3),jQuery(".zip-code-error").html("")}).fail(function(){jQuery(".zip-code-error").html("* Not a valid ZIP Code")})}),jQuery(".plant-name").click(function(){if(jQuery(this).is(":checked")){var e=jQuery(this).val();jQuery(".product_attr_"+e).prop("checked",!0)}else{var e=jQuery(this).val();jQuery(".product_attr_"+e).prop("checked",!1)}}),jQuery("#input_8_3").change(function(){jQuery("#input_8_11").val()==""&&jQuery(this).val("")}),jQuery("#manager_location_1").change(function(){jQuery("#manager_location_lat_1").val()==""&&jQuery(this).val("")}),jQuery("#NurseryInventoryForm").validate({rules:{account_owner_name:{required:!0},account_owner_email:{required:!0,email:!0},account_owner_phone:{required:!0},"input_delivery_days_1[]":{required:!0,minlength:1},"select_product_name_1[]":{required:!0,minlength:15}},messages:{account_owner_name:{required:"Please enter account owner name"},account_owner_email:{required:"Please enter account owner email",email:"Valid email Id"},account_owner_phone:{required:"Please enter account owner phone"},"input_delivery_days_1[]":{required:"You must check at least 1 box",minlength:"You must check at least 1 box"},"select_product_name_1[]":{required:"You must check at least 15 box",minlength:"You must check at least 15 box"}},errorPlacement(e,r){r.is(":radio")||r.is(":checkbox")?e.insertBefore(r.next()):e.insertAfter(r)},submitHandler(r){jQuery(".sub-info-btn").prop("disabled",!0);var r=jQuery("#NurseryInventoryForm")[0];const a=new FormData(r);a.append("action","nursery_ajax_register_inventory"),jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:a,processData:!1,contentType:!1,cache:!1,success(o){setTimeout(function(){window.location.href=ajax_florish_object.vendor_url},1e3),jQuery(".sub-info-btn").prop("disabled",!1)}})}}),jQuery("#sub-info-btn").submit(function(){if(!(jQuery(".require-one").length>0))return alert("Please check at least one days"),!1}),jQuery("#account_owner_phone").usPhoneFormat({format:"xxx-xxx-xxxx"}),jQuery("#manager_phone_number_1").usPhoneFormat({format:"xxx-xxx-xxxx"}),jQuery(".reg_stage_status").on("change",function(){const e=jQuery(this).find(":selected").data("userid"),r=this.value;jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"nursery_reg_status_change",user_id:e,in_status:r},success(a){console.log(a),jQuery(".response_messages").html('<div class="alert alert-success" role="alert">'+a+"</div>")}})}),jQuery("#choice_9_18_1").click(function(){jQuery(this).is(":checked")?jQuery(".sunday-div").show():jQuery(".sunday-div").hide()}),jQuery("#choice_9_18_2").click(function(){jQuery(this).is(":checked")?jQuery(".monday-div").show():jQuery(".monday-div").hide()}),jQuery("#choice_9_18_3").click(function(){jQuery(this).is(":checked")?jQuery(".tuesday-div").show():jQuery(".tuesday-div").hide()}),jQuery("#choice_9_18_4").click(function(){jQuery(this).is(":checked")?jQuery(".wednesday-div").show():jQuery(".wednesday-div").hide()}),jQuery("#choice_9_18_5").click(function(){jQuery(this).is(":checked")?jQuery(".thursday-div").show():jQuery(".thursday-div").hide()}),jQuery("#choice_9_18_6").click(function(){jQuery(this).is(":checked")?jQuery(".friday-div").show():jQuery(".friday-div").hide()}),jQuery("#choice_9_18_7").click(function(){jQuery(this).is(":checked")?jQuery(".saturday-div").show():jQuery(".saturday-div").hide()}),jQuery(".add-nursery-plants").click(function(){jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"nursery_reg_add_inv"},cache:!1,success(e){jQuery(".master-plant").html(e),jQuery.magnificPopup.open({items:{src:"#view-nursery-inventory-popup"},type:"inline"}),jQuery(".plant-name").addClass("open"),jQuery(".content-wrapper").hide()}})}),jQuery(document).on("keyup",".search-plants",function(){const e=jQuery("#search_plants").val();jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"nursery_reg_add_inv",search_plant:e,varible_id:""},cache:!1,success(r){jQuery(".master-plant").html(r)}})}),jQuery(".add-more-size").click(function(){const e=jQuery(this).attr("#data-id");jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"nursery_reg_add_inv",search_plant:"",plant_id:e},cache:!1,success(r){jQuery(".master-plant").html(r),jQuery.magnificPopup.open({items:{src:"#view-nursery-inventory-popup"},type:"inline"})}})}),jQuery(document).on("change",".variation-status",function(){const e=jQuery(this).data("varible_id");if(jQuery(this).is(":checked"))var r="Yes";else var r="";jQuery.ajax({type:"POST",url:ajax_florish_object.ajax_url,data:{action:"nursery_inventory_active_inactive",varible_id:e,status:r},success(a){alert(a)}})}),jQuery(".get-market-nursery-list").click(function(){jQuery(".get-market-nursery-list").removeClass("active"),jQuery(this).addClass("active");const e=jQuery(this).data("lat"),r=jQuery(this).data("long"),a=jQuery(this).data("miles"),o=jQuery(this).data("marketid"),t=jQuery(this).data("name"),c=jQuery(this).data("takerate");jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"get_market_nursery_view",market_id:o,market_name:t,lat:e,long:r,miles:a,take_rate:c},cache:!1,success(d){jQuery("#market_nursery").html(d)}})}),jQuery(".market-edit").click(function(){const e=jQuery(this).data("id");jQuery("#market_id1").val(e),jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:{action:"get_market_details_edit",market_id:e},cache:!1,success(r){const a=r.split("!");jQuery("#market_name1").val(a[0]),jQuery("#latitude1").val(a[1]),jQuery("#longitude1").val(a[2]),jQuery("#radious_miles1").val(a[3]),jQuery("#fulladdress1").val(a[4]),jQuery("#pac-input1").val(a[4]),jQuery("#take_rate1").val(a[5]),jQuery.magnificPopup.open({items:{src:"#edit-market-popup"},type:"inline"})}})}),jQuery(document).on("change",".change-delivery-radious",function(){const e=jQuery(this).val();jQuery(".miles-number").text(e)}),jQuery("#ForgotPasswordForm").validate({rules:{email:{required:!0,email:!0}},messages:{email:"Please enter a valid email address"},submitHandler(r){var r=jQuery("#ForgotPasswordForm")[0];const a=new FormData(r);a.append("action","send_email_otp"),jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:a,processData:!1,contentType:!1,cache:!1,success(o){const t=JSON.parse(o);t.error==!0&&jQuery(".response_essage").html('<div class="alert alert-danger" role="alert">'+t.message+"</div>"),t.error==!1&&(jQuery(".response_essage").html('<div class="alert alert-success" role="alert">'+t.message+"</div>"),jQuery(".set_email").text(jQuery("#forgot_email").val()),jQuery("#user_id").val(t.user_id),jQuery("#ForgotPasswordForm").hide(),jQuery("#verify_email").show())}})}}),jQuery(".digit-group").find("input").each(function(){jQuery(this).attr("maxlength",1),jQuery(this).on("keyup",function(e){const r=jQuery(jQuery(this).parent());if(e.keyCode===8||e.keyCode===37){const a=r.find("input#"+jQuery(this).data("previous"));a.length&&jQuery(a).select()}else if(e.keyCode>=48&&e.keyCode<=57||e.keyCode>=65&&e.keyCode<=90||e.keyCode>=96&&e.keyCode<=105||e.keyCode===39){const a=r.find("input#"+jQuery(this).data("next"));a.length?jQuery(a).select():r.data("autosubmit")&&r.submit()}})}),jQuery("#verify_email").validate({submitHandler(e){const r=jQuery("#digit-1").val(),a=jQuery("#digit-2").val(),o=jQuery("#digit-3").val(),t=jQuery("#digit-4").val(),c=jQuery("#digit-5").val(),d=jQuery("#digit-6").val(),m=r+""+a+o+t+c+d,j=jQuery("#user_id").val();jQuery.ajax({type:"POST",url:ajax_florish_object.ajax_url,data:{action:"verify_email_otp",otp:m,user_id:j},success(p){const n=JSON.parse(p);n.error==!0&&jQuery(".response_essage").html('<div class="alert alert-danger" role="alert">'+n.message+"</div>"),n.error==!1&&(jQuery(".response_essage").html('<div class="alert alert-success" role="alert">'+n.message+"</div>"),jQuery("#c_user_id").val(n.user_id),jQuery("#ForgotPasswordForm").hide(),jQuery("#verify_email").hide(),jQuery("#ChangePasswordForm").show())}})}}),jQuery("#ChangePasswordForm").validate({rules:{new_password:{required:!0,minlength:6},confirm_password:{required:!0,minlength:6,equalTo:"#confirm_password"}},messages:{new_password:{required:"Please provide a password",minlength:"Your password must be at least 6 characters long"},confirm_password:{required:"Please provide a Confirm password",minlength:""}},submitHandler(r){var r=jQuery("#ChangePasswordForm")[0];const a=new FormData(r);a.append("action","change_user_password"),jQuery.ajax({type:"POST",enctype:"multipart/form-data",url:ajax_florish_object.ajax_url,data:a,processData:!1,contentType:!1,cache:!1,success(o){const t=JSON.parse(o);t.error==!0&&jQuery(".response_essage").html('<div class="alert alert-danger" role="alert">'+t.message+"</div>"),t.error==!1&&(jQuery(".response_essage").html('<div class="alert alert-success" role="alert">'+t.message+"</div>"),jQuery("#ForgotPasswordForm").hide(),jQuery("#verify_email").hide(),jQuery("#ChangePasswordForm").hide())}})}})});let l;l=new google.maps.places.Autocomplete(document.getElementById("billing_customer_location"),{types:["geocode"]}),google.maps.event.addListener(l,"place_changed",function(){const s=l.getPlace();document.getElementById("billing_customer_location_lat").value=s.geometry.location.lat(),document.getElementById("billing_customer_location_long").value=s.geometry.location.lng()});var i;i=new google.maps.places.Autocomplete(document.getElementById("manager_location_1"),{types:["geocode"]}),google.maps.event.addListener(i,"place_changed",function(){const s=i.getPlace();document.getElementById("manager_location_lat_1").value=s.geometry.location.lat(),document.getElementById("manager_location_long_1").value=s.geometry.location.lng()});var i;i=new google.maps.places.Autocomplete(document.getElementById("input_8_3"),{types:["geocode"]}),google.maps.event.addListener(i,"place_changed",function(){const s=i.getPlace();document.getElementById("input_8_11").value=s.geometry.location.lat(),document.getElementById("input_8_12").value=s.geometry.location.lng()});let u;u=new google.maps.places.Autocomplete(document.getElementById("input_7_5"),{types:["geocode"]}),google.maps.event.addListener(u,"place_changed",function(){const s=u.getPlace();document.getElementById("input_7_7").value=s.geometry.location.lat(),document.getElementById("input_7_9").value=s.geometry.location.lng()});let y;y=new google.maps.places.Autocomplete(document.getElementById("corporate_mailing_address"),{types:["geocode"]}),google.maps.event.addListener(y,"place_changed",function(){u.getPlace()}),jQuery(document).ready(function(){jQuery(document).on("click",".plant-name",function(s){s.preventDefault();const e=jQuery(this),r=e.next(".content-wrapper");e.toggleClass("open"),r.slideToggle(250)}),jQuery(document).on("click",".accordion-toggle",function(s){s.preventDefault();const e=jQuery(this),r=e.next(".accordion-content");e.toggleClass("open"),r.slideToggle(250)})})};_();
//# sourceMappingURL=main.js.map