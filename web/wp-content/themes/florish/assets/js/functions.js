const functions = () => {
	jQuery(document).ready(function () {
		jQuery('.woocommerce-pagination .prev').html(
			'<i class="fa-solid fa-chevron-left"></i>'
		);
		jQuery('.woocommerce-pagination .next').html(
			'<i class="fa-solid fa-chevron-right"></i>'
		);

		jQuery('.tabs').on('click', '.cl_tab', function (e) {
			e.preventDefault();
			jQuery('.cl_tab').removeClass('active');
			jQuery('.plant-list').removeClass('active');
			jQuery(this).addClass('active');
			jQuery(jQuery(this).attr('href')).addClass('active');
		});

		// Navbar Start
		jQuery("<span class='clickD'></span>").insertAfter(
			'.navbar-nav li.menu-item-has-children > a'
		);
		jQuery('.navbar-nav li .clickD').click(function (e) {
			e.preventDefault();
			const $this = jQuery(this);
			if ($this.next().hasClass('show')) {
				$this.next().removeClass('show');
				$this.removeClass('toggled');
			} else {
				$this.next().slideToggle();
				$this.toggleClass('toggled');
			}
		});

		jQuery(window).on('resize', function () {
			if (jQuery(this).width() < 1025) {
				jQuery('html').click(function () {
					jQuery('.navbar-nav li .clickD').removeClass('toggled');
					jQuery('.toggled').removeClass('toggled');
					jQuery('.sub-menu').removeClass('show');
				});
				jQuery(document).click(function () {
					jQuery('.navbar-nav li .clickD').removeClass('toggled');
					jQuery('.toggled').removeClass('toggled');
					jQuery('.sub-menu').removeClass('show');
				});
				jQuery('.navbar-nav').click(function (e) {
					e.stopPropagation();
				});
			}
		});

		// Navbar end

		// Menu animation
		jQuery('.navbar-toggler').click(function () {
			jQuery('.navbar-toggler').toggleClass('open');
			jQuery('.navbar-toggler .stick').toggleClass('open');
			jQuery('body,html').toggleClass('open-nav');
		});

		const colWidth = jQuery('.grid-item').width();
		window.onresize = function () {
			const colWidth = jQuery('.grid-item').width();
		};
		//console.log(colWidth);

		const $grid = jQuery('.grid').masonry({
			// options
			itemSelector: '.grid-item',
			columnWidth: '.grid-item',
			// percentPosition: true,
			gutter: 15,
			fitWidth: true,
		});

		$grid.imagesLoaded().progress(function () {
			$grid.masonry('layout');
		});

		// var items = $(".grid .grid-item");
		//     var numItems = items.length;
		//     var perPage = 3;

		//     items.slice(perPage).hide();

		//     $('#pagination-container').pagination({
		//         items: numItems,
		//         itemsOnPage: perPage,
		//         prevText: "Prev",
		//         nextText: "Next",
		//         onPageClick: function (pageNumber) {
		//         var showFrom = perPage * (pageNumber - 1);
		//         var showTo = showFrom + perPage;
		//         items.hide().slice(showFrom, showTo).show();
		//     }
		// });

		//Magnific popup
		jQuery('.open-popup-link').magnificPopup({
			type: 'inline',
			midClick: true,
			mainClass: 'mfp-fade',
		});

		//////////////////////////////////////User registration///////////////////////////
		jQuery('#UserRegForm').validate({
			// Specify validation rules
			rules: {
				first_name: { required: true, lettersonly: true },
				last_name: { required: true, lettersonly: true },
				email: {
					required: true,
					email: true,
				},
				password: {
					required: true,
					minlength: 6,
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: '#password',
				},
			},
			// Specify validation error messages
			messages: {
				first_name: {
					required: 'Please enter your first name',
					lettersonly:
						'Only alphabets are allowed and check blank spaces',
				},
				last_name: {
					required: 'Please enter your last name',
					lettersonly:
						'Only alphabets are allowed and check blank spaces',
				},
				email: 'Please enter a valid email address',
				password: {
					required: 'Please provide a password',
					minlength:
						'Your password must be at least 6 characters long',
				},
				confirm_password: {
					required: 'Please provide a Confirm password',
					minlength: '',
				},
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler(form) {
				jQuery('#reg_btn').prop('disabled', true);
				// Get form
				var form = jQuery('#UserRegForm')[0];
				// Create an FormData object
				const data = new FormData(form);
				// If you want to add an extra field for the FormData
				data.append('action', 'user_ajax_register');

				jQuery.ajax({
					type: 'POST',
					enctype: 'multipart/form-data',
					url: ajax_florish_object.ajax_url,
					data,
					processData: false,
					contentType: false,
					cache: false,
					success(response) {
						const data = JSON.parse(response);
						if (data.error == true) {
							jQuery('.response_essage').html(
								'<div class="alert alert-danger" role="alert">' +
									data.message +
									'</div>'
							);
						}

						if (data.error == false) {
							jQuery('.response_essage').html(
								'<div class="alert alert-success" role="alert">' +
									data.message +
									'</div>'
							);
							jQuery('#UserRegForm').trigger('reset');
							jQuery('#reg_btn').prop('disabled', false);
						}
					},
				});
			},
		});

		/////User Login ajax//////////////////////////
		jQuery('#loginForm').validate({
			submitHandler(form) {
				const email = jQuery('input[name=user_email]').val();
				const password = jQuery('input[name=user_password]').val();
				const security = jQuery('#security').val();
				//jQuery('.alert-success').hide();
				jQuery.ajax({
					type: 'POST',
					dataType: 'json',
					url: ajax_florish_object.ajax_url,
					data: {
						action: 'user_ajax_login',
						email,
						password,
						security,
					},
					success(data) {
						if (data.error == true) {
							jQuery('.response_messages').html(
								'<div class="alert alert-danger" role="alert">' +
									data.message +
									'</div>'
							);
						}
						if (data.error == false) {
							jQuery('.response_messages').html(
								'<div class="alert alert-success" role="alert">' +
									data.message +
									'</div>'
							);
							if (data.role == 'nursery') {
								setTimeout(function () {
									window.location.href =
										ajax_florish_object.vendor_url;
								}, 1000);
							} else {
								setTimeout(function () {
									window.location.href =
										ajax_florish_object.home_url +
										'/my-account';
								}, 1000);
							}
						}
					},
				});
				//form.preventdefault();
			},
		});
		////show hide password
		jQuery('#eye1,#eye2').click(function () {
			if (jQuery(this).hasClass('fa-eye-slash')) {
				jQuery(this).removeClass('fa-eye-slash');

				jQuery(this).addClass('fa-eye');

				jQuery('.password').attr('type', 'text');
			} else {
				jQuery(this).removeClass('fa-eye');

				jQuery(this).addClass('fa-eye-slash');

				jQuery('.password').attr('type', 'password');
			}
		});

		jQuery('#location_div').hide();
		jQuery('#user_location').prop('required', false);
		jQuery('#user_location_lat').prop('required', false);
		jQuery('#user_location_long').prop('required', false);
		jQuery('#select_user_role').on('change', function () {
			if (this.value == 'nursery') {
				jQuery('#location_div').show();
				jQuery('#user_location').prop('required', true);
				jQuery('#user_location_lat').prop('required', true);
				jQuery('#user_location_long').prop('required', true);
			} else {
				jQuery('#location_div').hide();
				jQuery('#user_location').prop('required', false);
				jQuery('#user_location_lat').prop('required', false);
				jQuery('#user_location_long').prop('required', false);
			}
			//alert(this.value);
		});

		///////View Order
		jQuery(document).on('click', '.view_nur_qty', function () {
			const order_id = jQuery(this).data('orderid');

			//alert(order_id);
			jQuery.ajax({
				type: 'POST',
				//dataType: 'json',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_order_view',
					order_id,
				},
				success(data) {
					//alert(data);
					jQuery('#exampleModal').modal('show');
					jQuery('.mdl-cus-content').html(data);
				},
			});
		});

		// jQuery.magnificPopup.open({
		//   items: {
		//       src: '#order-popup',
		//   },
		//   type: 'inline'
		// });

		jQuery(document).on('click', '.view_nur_id', function () {
			const user_id = jQuery(this).data('userid');

			//alert(user_id);
			jQuery.ajax({
				type: 'POST',
				//dataType: 'json',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_profile_view',
					user_id,
				},
				success(data) {
					//alert();
					jQuery.magnificPopup.open({
						items: {
							src: '#view-nursery-popup',
						},
						type: 'inline',
					});
					jQuery('.nursery-full-content').html(data);
				},
			});
		});

		jQuery('#input_4_5').change(function () {
			if (jQuery('#input_4_7').val() == '') {
				jQuery(this).val('');
			}
		});
		jQuery('#input_7_5').change(function () {
			if (jQuery('#input_7_7').val() == '') {
				jQuery(this).val('');
			}
		});

		jQuery('#zipcode_submit').on('click', function () {
			zip = jQuery('#zip').val();
			jQuery
				.getJSON(
					'https://phzmapi.org/' + zip + '.json',
					function (data) {
						json = JSON.stringify(data);
						const obj = JSON.parse(json);
						jQuery.cookie('customer_usda_zip', json, {
							expires: 1,
							path: '/',
						});
						jQuery.cookie('customer_usd_zipcode', zip, {
							expires: 1,
							path: '/',
						});

						jQuery('#usda_zone').html(obj.zone);
						setTimeout(function () {
							window.location.href =
								ajax_florish_object.current_url;
						}, 1000);
						//$.removeCookie('the_cookie');
						//$.cookie('the_cookie');
						// console.log(jQuery.cookie('customer_usda_zip'));
						// jQuery("#json").html(json);
						// jQuery("#json").show();
						//ajax_florish_object.current_url
						jQuery('.zip-code-error').html('');
					}
				)
				.fail(function () {
					//console.log('getJSON request failed! ');
					jQuery('.zip-code-error').html('* Not a valid ZIP Code');
				});
		});

		jQuery('.plant-name').click(function () {
			if (jQuery(this).is(':checked')) {
				var plant_id = jQuery(this).val();
				jQuery('.product_attr_' + plant_id).prop('checked', true);
			} else {
				var plant_id = jQuery(this).val();
				jQuery('.product_attr_' + plant_id).prop('checked', false);
			}
		});

		//google.maps.event.addListener(window, 'click', initialize);

		jQuery('#input_8_3').change(function () {
			if (jQuery('#input_8_11').val() == '') {
				jQuery(this).val('');
			}
		});

		jQuery('#manager_location_1').change(function () {
			if (jQuery('#manager_location_lat_1').val() == '') {
				jQuery(this).val('');
			}
		});

		/////////////////////////Nursery Information/////////////////////////////
		jQuery('#NurseryInventoryForm').validate({
			// Specify validation rules
			rules: {
				account_owner_name: { required: true },
				account_owner_email: {
					required: true,
					email: true,
				},
				account_owner_phone: { required: true },
				'input_delivery_days_1[]': {
					required: true,
					minlength: 1,
				},
				'select_product_name_1[]': {
					required: true,
					minlength: 15,
				},
			},
			// Specify validation error messages
			messages: {
				account_owner_name: {
					required: 'Please enter account owner name',
				},
				account_owner_email: {
					required: 'Please enter account owner email',
					email: 'Valid email Id',
				},
				account_owner_phone: {
					required: 'Please enter account owner phone',
				},
				'input_delivery_days_1[]': {
					required: 'You must check at least 1 box',
					minlength: 'You must check at least 1 box',
				},
				'select_product_name_1[]': {
					required: 'You must check at least 15 box',
					minlength: 'You must check at least 15 box',
				},
			},

			errorPlacement(error, element) {
				if (element.is(':radio') || element.is(':checkbox')) {
					error.insertBefore(element.next());
				} else {
					error.insertAfter(element);
				}
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler(form) {
				jQuery('.sub-info-btn').prop('disabled', true);
				// Get form
				var form = jQuery('#NurseryInventoryForm')[0];
				// Create an FormData object
				const data = new FormData(form);
				// If you want to add an extra field for the FormData
				data.append('action', 'nursery_ajax_register_inventory');

				//console.log(data);
				jQuery.ajax({
					type: 'POST',
					enctype: 'multipart/form-data',
					url: ajax_florish_object.ajax_url,
					data,
					processData: false,
					contentType: false,
					cache: false,
					success(response) {
						//console.log(response);
						setTimeout(function () {
							window.location.href =
								ajax_florish_object.vendor_url;
						}, 1000);
						jQuery('.sub-info-btn').prop('disabled', false);
					},
				});
			},
		});

		jQuery('#sub-info-btn').submit(function () {
			const checked = jQuery('.require-one').length > 0;
			if (!checked) {
				alert('Please check at least one days');
				return false;
			}
		});
		jQuery('#account_owner_phone').usPhoneFormat({
			format: 'xxx-xxx-xxxx',
		});
		jQuery('#manager_phone_number_1').usPhoneFormat({
			format: 'xxx-xxx-xxxx',
		});

		//////Nursery Reg Status//////////////
		jQuery('.reg_stage_status').on('change', function () {
			const user_id = jQuery(this).find(':selected').data('userid');
			const in_status = this.value;
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_reg_status_change',
					user_id,
					in_status,
				},
				//processData: false,
				//contentType: false,
				//cache: false,
				success(message) {
					console.log(message);
					jQuery('.response_messages').html(
						'<div class="alert alert-success" role="alert">' +
							message +
							'</div>'
					);
					//setTimeout(function(){  window.location.href = ajax_florish_object.vendor_url;  }, 1000);
					//jQuery('#sub-info-btn').prop('disabled', false);
				},
			});
		});

		////Inventory Days
		jQuery('#choice_9_18_1').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.sunday-div').show();
			} else {
				jQuery('.sunday-div').hide();
			}
		});
		jQuery('#choice_9_18_2').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.monday-div').show();
			} else {
				jQuery('.monday-div').hide();
			}
		});
		jQuery('#choice_9_18_3').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.tuesday-div').show();
			} else {
				jQuery('.tuesday-div').hide();
			}
		});
		jQuery('#choice_9_18_4').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.wednesday-div').show();
			} else {
				jQuery('.wednesday-div').hide();
			}
		});
		jQuery('#choice_9_18_5').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.thursday-div').show();
			} else {
				jQuery('.thursday-div').hide();
			}
		});
		jQuery('#choice_9_18_6').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.friday-div').show();
			} else {
				jQuery('.friday-div').hide();
			}
		});
		jQuery('#choice_9_18_7').click(function () {
			if (jQuery(this).is(':checked')) {
				jQuery('.saturday-div').show();
			} else {
				jQuery('.saturday-div').hide();
			}
		});

		jQuery('.add-nursery-plants').click(function () {
			//alert('on');
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_reg_add_inv',
				},
				cache: false,
				success(message) {
					//console.log(message);
					jQuery('.master-plant').html(message);
					jQuery.magnificPopup.open({
						items: {
							src: '#view-nursery-inventory-popup',
						},
						type: 'inline',
					});
					jQuery('.plant-name').addClass('open');
					jQuery('.content-wrapper').hide();
				},
			});
		});
		jQuery(document).on('keyup', '.search-plants', function () {
			//jQuery(document).keyup('.search-plants', function(event){
			//alert('off');
			const search_plant = jQuery('#search_plants').val();
			//alert(search_plant);
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_reg_add_inv',
					search_plant,
					varible_id: '',
				},
				cache: false,
				success(message) {
					// console.log(message);
					jQuery('.master-plant').html(message);
				},
			});
		});
		jQuery('.add-more-size').click(function () {
			//jQuery(document).on("click",".add-more-size",function() {
			const plant_id = jQuery(this).attr('#data-id');
			//alert(search_plant);
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_reg_add_inv',
					search_plant: '',
					plant_id,
				},
				cache: false,
				success(message) {
					// console.log(message);
					jQuery('.master-plant').html(message);
					jQuery.magnificPopup.open({
						items: {
							src: '#view-nursery-inventory-popup',
						},
						type: 'inline',
					});
				},
			});
		});

		jQuery(document).on('change', '.variation-status', function () {
			const varible_id = jQuery(this).data('varible_id');
			if (jQuery(this).is(':checked')) {
				var status = 'Yes';
			} else {
				var status = '';
			}
			//alert(varible_id);
			jQuery.ajax({
				type: 'POST',
				//dataType: 'json',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'nursery_inventory_active_inactive',
					varible_id,
					status,
				},
				success(data) {
					//alert();
					alert(data);
					//jQuery('.nursery-full-content').html(data);
				},
			});
		});

		////market list

		jQuery('.get-market-nursery-list').click(function () {
			jQuery('.get-market-nursery-list').removeClass('active');

			jQuery(this).addClass('active');
			//alert('on');
			const lat = jQuery(this).data('lat');
			const long = jQuery(this).data('long');
			const miles = jQuery(this).data('miles');
			const marketid = jQuery(this).data('marketid');
			const market_name = jQuery(this).data('name');
			const take_rate = jQuery(this).data('takerate');
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'get_market_nursery_view',
					market_id: marketid,
					market_name,
					lat,
					long,
					miles,
					take_rate,
				},
				cache: false,
				success(response) {
					//console.log(response);
					jQuery('#market_nursery').html(response);

					// jQuery(".plant-name").addClass("open");
					// jQuery(".content-wrapper").hide();
				},
			});
		});

		/////edit market

		jQuery('.market-edit').click(function () {
			const market_id = jQuery(this).data('id');
			jQuery('#market_id1').val(market_id);
			// alert(market_id);
			jQuery.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: ajax_florish_object.ajax_url,
				data: {
					action: 'get_market_details_edit',
					market_id,
				},
				cache: false,
				success(data) {
					// console.log(data);
					const arr = data.split('!');
					jQuery('#market_name1').val(arr[0]);
					jQuery('#latitude1').val(arr[1]);
					jQuery('#longitude1').val(arr[2]);
					jQuery('#radious_miles1').val(arr[3]);
					jQuery('#fulladdress1').val(arr[4]);
					jQuery('#pac-input1').val(arr[4]);
					jQuery('#take_rate1').val(arr[5]);
					jQuery.magnificPopup.open({
						items: {
							src: '#edit-market-popup',
						},
						type: 'inline',
					});
				},
			});
		});

		jQuery(document).on('change', '.change-delivery-radious', function () {
			//alert();
			const val = jQuery(this).val();
			jQuery('.miles-number').text(val);
		});

		/////forgot password
		jQuery('#ForgotPasswordForm').validate({
			// Specify validation rules
			rules: {
				email: {
					required: true,
					email: true,
				},
			},
			// Specify validation error messages
			messages: {
				email: 'Please enter a valid email address',
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler(form) {
				// Get form
				var form = jQuery('#ForgotPasswordForm')[0];
				// Create an FormData object
				const data = new FormData(form);
				// If you want to add an extra field for the FormData
				data.append('action', 'send_email_otp');

				jQuery.ajax({
					type: 'POST',
					enctype: 'multipart/form-data',
					url: ajax_florish_object.ajax_url,
					data,
					processData: false,
					contentType: false,
					cache: false,
					success(response) {
						const data = JSON.parse(response);
						if (data.error == true) {
							jQuery('.response_essage').html(
								'<div class="alert alert-danger" role="alert">' +
									data.message +
									'</div>'
							);
						}

						if (data.error == false) {
							jQuery('.response_essage').html(
								'<div class="alert alert-success" role="alert">' +
									data.message +
									'</div>'
							);
							// jQuery('#UserRegForm').trigger("reset");
							jQuery('.set_email').text(
								jQuery('#forgot_email').val()
							);
							jQuery('#user_id').val(data.user_id);
							jQuery('#ForgotPasswordForm').hide();
							jQuery('#verify_email').show();

							//jQuery('#reg_btn').prop('disabled', false);
						}
					},
				});
			},
		});

		///Otp Digit
		jQuery('.digit-group')
			.find('input')
			.each(function () {
				jQuery(this).attr('maxlength', 1);
				jQuery(this).on('keyup', function (e) {
					const parent = jQuery(jQuery(this).parent());

					if (e.keyCode === 8 || e.keyCode === 37) {
						const prev = parent.find(
							'input#' + jQuery(this).data('previous')
						);

						if (prev.length) {
							jQuery(prev).select();
						}
					} else if (
						(e.keyCode >= 48 && e.keyCode <= 57) ||
						(e.keyCode >= 65 && e.keyCode <= 90) ||
						(e.keyCode >= 96 && e.keyCode <= 105) ||
						e.keyCode === 39
					) {
						const next = parent.find(
							'input#' + jQuery(this).data('next')
						);

						if (next.length) {
							jQuery(next).select();
						} else if (parent.data('autosubmit')) {
							parent.submit();
						}
					}
				});
			});

		jQuery('#verify_email').validate({
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler(form) {
				//jQuery("#verify_email").submit(function(event) {
				//e.preventDefault();
				const digit1 = jQuery('#digit-1').val();
				const digit2 = jQuery('#digit-2').val();
				const digit3 = jQuery('#digit-3').val();
				const digit4 = jQuery('#digit-4').val();
				const digit5 = jQuery('#digit-5').val();
				const digit6 = jQuery('#digit-6').val();
				const otp =
					digit1 +
					'' +
					digit2 +
					'' +
					digit3 +
					'' +
					digit4 +
					'' +
					digit5 +
					'' +
					digit6;
				const user_id = jQuery('#user_id').val();
				//alert(user_id);
				jQuery.ajax({
					type: 'POST',
					//dataType: 'json',
					// processData: false,
					// contentType: false,
					// cache: false,
					url: ajax_florish_object.ajax_url,
					data: {
						action: 'verify_email_otp',
						otp,
						user_id,
					},
					success(response) {
						// console.log('ggg'+responce);
						const data = JSON.parse(response);
						//console.log('ggg'+data);
						if (data.error == true) {
							jQuery('.response_essage').html(
								'<div class="alert alert-danger" role="alert">' +
									data.message +
									'</div>'
							);
						}

						if (data.error == false) {
							jQuery('.response_essage').html(
								'<div class="alert alert-success" role="alert">' +
									data.message +
									'</div>'
							);
							// jQuery('#UserRegForm').trigger("reset");
							jQuery('#c_user_id').val(data.user_id);
							jQuery('#ForgotPasswordForm').hide();
							jQuery('#verify_email').hide();
							jQuery('#ChangePasswordForm').show();

							//jQuery('#reg_btn').prop('disabled', false);
						}
					},
				});
			},
		});

		jQuery('#ChangePasswordForm').validate({
			// Specify validation rules
			rules: {
				new_password: {
					required: true,
					minlength: 6,
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: '#confirm_password',
				},
			},
			// Specify validation error messages
			messages: {
				new_password: {
					required: 'Please provide a password',
					minlength:
						'Your password must be at least 6 characters long',
				},
				confirm_password: {
					required: 'Please provide a Confirm password',
					minlength: '',
				},
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler(form) {
				// Get form
				var form = jQuery('#ChangePasswordForm')[0];
				// Create an FormData object
				const data = new FormData(form);
				// If you want to add an extra field for the FormData
				data.append('action', 'change_user_password');

				jQuery.ajax({
					type: 'POST',
					enctype: 'multipart/form-data',
					url: ajax_florish_object.ajax_url,
					data,
					processData: false,
					contentType: false,
					cache: false,
					success(response) {
						const data = JSON.parse(response);
						if (data.error == true) {
							jQuery('.response_essage').html(
								'<div class="alert alert-danger" role="alert">' +
									data.message +
									'</div>'
							);
						}

						if (data.error == false) {
							jQuery('.response_essage').html(
								'<div class="alert alert-success" role="alert">' +
									data.message +
									'</div>'
							);
							jQuery('#ForgotPasswordForm').hide();
							jQuery('#verify_email').hide();
							jQuery('#ChangePasswordForm').hide();
						}
					},
				});
			},
		});
	});

	// google.maps.event.addListener(window, "load", function () {
	// 	var places = new google.maps.places.Autocomplete(
	// 	  document.getElementById("user_location")
	// 	);
	// 	google.maps.event.addListener(places, "place_changed", function () {
	// 	  var place = places.getPlace();
	// 	  //console.log(place);
	// 	  var latitude = place.geometry.location.lat();
	// 	  var longitude = place.geometry.location.lng();
	// 	  var address = place.formatted_address;

	// 	  jQuery("#user_location_lat").val(latitude);
	// 	  jQuery("#user_location_long").val(longitude);
	// 	  //jQuery("#address").val(address);
	// 	});
	//    });

	let autocomplete;
	autocomplete = new google.maps.places.Autocomplete(
		document.getElementById('billing_customer_location'),
		{
			types: ['geocode'],
		}
	);
	google.maps.event.addListener(autocomplete, 'place_changed', function () {
		const place = autocomplete.getPlace();
		//document.getElementById('city').value = place.name;
		document.getElementById('billing_customer_location_lat').value =
			place.geometry.location.lat();
		document.getElementById('billing_customer_location_long').value =
			place.geometry.location.lng();
	});

	/////nursery registration
	var nursery_autocompletes;
	nursery_autocompletes = new google.maps.places.Autocomplete(
		document.getElementById('manager_location_1'),
		{
			types: ['geocode'],
		}
	);
	google.maps.event.addListener(
		nursery_autocompletes,
		'place_changed',
		function () {
			const place = nursery_autocompletes.getPlace();
			//document.getElementById('city').value = place.name;
			document.getElementById('manager_location_lat_1').value =
				place.geometry.location.lat();
			document.getElementById('manager_location_long_1').value =
				place.geometry.location.lng();
		}
	);

	/////nursery registration inventory
	var nursery_autocompletes;
	nursery_autocompletes = new google.maps.places.Autocomplete(
		document.getElementById('input_8_3'),
		{
			types: ['geocode'],
		}
	);
	google.maps.event.addListener(
		nursery_autocompletes,
		'place_changed',
		function () {
			const place = nursery_autocompletes.getPlace();
			//document.getElementById('city').value = place.name;
			document.getElementById('input_8_11').value =
				place.geometry.location.lat();
			document.getElementById('input_8_12').value =
				place.geometry.location.lng();
		}
	);

	/////nursery registration update
	let nursery_autocomplete;
	nursery_autocomplete = new google.maps.places.Autocomplete(
		document.getElementById('input_7_5'),
		{
			types: ['geocode'],
		}
	);
	google.maps.event.addListener(
		nursery_autocomplete,
		'place_changed',
		function () {
			const place = nursery_autocomplete.getPlace();
			//document.getElementById('city').value = place.name;
			document.getElementById('input_7_7').value =
				place.geometry.location.lat();
			document.getElementById('input_7_9').value =
				place.geometry.location.lng();
		}
	);

	/////corporate_mailing_address update
	let corporate_mailing_address;
	corporate_mailing_address = new google.maps.places.Autocomplete(
		document.getElementById('corporate_mailing_address'),
		{
			types: ['geocode'],
		}
	);
	google.maps.event.addListener(
		corporate_mailing_address,
		'place_changed',
		function () {
			const place = nursery_autocomplete.getPlace();
		}
	);

	jQuery(document).ready(function () {
		jQuery(document).on('click', '.plant-name', function (event) {
			event.preventDefault();
			// create accordion variables

			const accordion = jQuery(this);
			const accordionContent = accordion.next('.content-wrapper');

			// toggle accordion link open class
			accordion.toggleClass('open');
			// toggle accordion content
			accordionContent.slideToggle(250);
		});

		jQuery(document).on('click', '.accordion-toggle', function (event) {
			event.preventDefault();
			// create accordion variables

			const accordion = jQuery(this);
			const accordionContent = accordion.next('.accordion-content');

			// toggle accordion link open class
			accordion.toggleClass('open');
			// toggle accordion content
			accordionContent.slideToggle(250);
		});
	});
};

// This allows importing using import a from 'a'
export default functions;
