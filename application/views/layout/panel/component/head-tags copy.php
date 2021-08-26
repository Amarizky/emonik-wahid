  	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title;?> </title>

	<link href="<?php echo base_url();?>/images/icon-app.png" rel="shortcut icon"  />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/material/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/switch.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

	  <!-- Theme JS files -->
	<!-- <script src="<?php echo base_url();?>global_assets/js/plugins/forms/validation/validate.min.js"></script> -->

  	<!-- datatables -->
	<script src="<?php echo base_url();?>/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<!-- <script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/select2.min.js"></script> -->
	<script src="<?php echo base_url();?>/global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<!-- /datatables -->

	<script src="<?php echo base_url();?>/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/editors/summernote/lang/summernote-id-ID.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/app.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>

	<script src="<?php echo base_url();?>/global_assets/js/demo_pages/form_select2.js"></script>

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/js/app.js"></script>
	<!-- <script src="<?php echo base_url();?>global_assets/js/demo_pages/form_validation.js"></script> -->
	<!-- /theme JS files -->

	<style>
		.note-group-select-from-files {
			display: none;
		}
		.table-nowrap { white-space: nowrap; }
		@media (max-width:768px){
			.icon-field {
				display:none;
			}
		}
		.tab-content>.tab-pane {
            display: block;
            height: 0;
            overflow: hidden;
        }
        .tab-content>.tab-pane.active {
            height: auto;
        }
		
	</style>
<script>

	$(document).ready(function(){
		$('.summernote').summernote({ lang: 'id-ID' }); 
	})
	const swalInit = swal.mixin({
		buttonsStyling: false,
		confirmButtonClass: 'btn btn-primary',
		cancelButtonClass: 'btn btn-light'
	});

	// Initialize module
	// ------------------------------
	const basicDT = () => {
		if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

		// Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });


		const table = $('.datatable-button-html5-columns').DataTable({
            buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn bg-blue btn-icon dropdown-toggle'
                    }
                ]
            }
        });

		table.on('click', '[data-toggle=confirm-move]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure?',
                text: "Move this data to Trash?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, move it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					//add notify here
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Moved!", 'Your data has been moved to trash.', "success").then((value) => {
									if(data.return_url != '#') {
										window.location.replace(data.return_url);
									}
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
        });

		table.on('click', '[data-toggle=confirm-remove]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Deleted!", 'Your data has been removed.', "success").then((value) => {
									if(data.return_url != '#') {
										window.location.replace(data.return_url);
									}
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
        });

		table.on('click', '[data-toggle=confirm-recovery]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure?',
                text: "You will recovery this data!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Recovered!", 'Your data has been recovered.', "success").then((value) => {
									if(data.return_url != '#') {
										window.location.replace(data.return_url);
									}
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
        });

		table.on('click', '[data-toggle=confirm-reset]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure to reset password this account?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, reset it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					//add notify here
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Updated!", 'The account password has been updated.', "success").then((value) => {
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
		});
		
		$('#remove_all').click(function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Deleted!", 'Your data has been removed.', "success").then((value) => {
									if(data.return_url != '#') {
										window.location.replace(data.return_url);
									}
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
        });

		const table2 = $('.datatable-ss').DataTable({
			ordering: true,
			// processing: true,
			// language : {
			// 	infoFiltered : "",
            // 	processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
			// },
			lengthMenu : [[10, 25, 50, -1], [10, 25, 50, "All"]],
			serverSide: true,
			// lengthChange : true,
			buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn bg-blue btn-icon dropdown-toggle'
                    }
                ]
            },
			order : [],
            dom: '<"datatable-header"fBl><"datatable-scroll"t><"datatable-footer"ip>',
			ajax: {
				url: '<?php echo !isset($datatable_data) ? '' : $datatable_data ;?>',
				type : "GET",
			},
			columnDefs : [
				{ 
					targets : [ 0 ], 
					orderable : false, 
				},
			],
			preDrawCallback: function(settings) {
				$('#loading-table').slideDown();
			},
			drawCallback : function(settings) {
				$('#loading-table').slideUp();
			}
		});

		table2.on('click', '[data-toggle=confirm-delete]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					//add notify here
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Deleted!", 'Your data has been deleted.', "success").then((value) => {
									if(data.return_url != '#') {
										window.location.replace(data.return_url);
									}
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
        });

		table2.on('click', '[data-toggle=confirm-reset]', function() {
            address = $(this).attr('data-address');
			swalInit.fire({
                title: 'Are you sure to reset password this account?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, reset it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
					//add notify here
					$.ajax({
                    type: "GET",
                    url: address,
                    success: function(data) {
							data = JSON.parse(data);
							if(data.status == 1) {
								swalInit.fire("Updated!", 'The account password has been updated.', "success").then((value) => {
								});
							} else  {
								swalInit.fire("Failed", data.message, "error");
							}
						}
                    })
                }
            });
		});
	}
	
	
	var _componentSelect2 = function() {
		if (!$().select2) {
			console.warn('Warning - select2.min.js is not loaded.');
			return;
		}

		// Default initialization
		$('.select').select2({
			minimumResultsForSearch: Infinity
		});

		// Fixed width. Single select
		$('.select-fixed-single').select2({
			minimumResultsForSearch: Infinity,
			width: 250
		});

		// Minimum input length
        $('.select-minimum').select2({
            minimumInputLength: 5,
            minimumResultsForSearch: Infinity
		});

		$('.select-minimum-3').select2({
            minimumInputLength: 3,
            minimumResultsForSearch: Infinity
		});

		// Initialize
        var $select = $('.select-search').select2();

        $select.on('change', function() {
            $(this).trigger('blur');
        });

	}

	var Summernote = function() {
		var _componentSummernote = function() {
			if (!$().summernote) {
				console.warn('Warning - summernote.min.js is not loaded.');
				return;
			}
			$('.summernote').summernote();
			$('.summernote-height').summernote({
				height: 400
			});
		};

		// Uniform
		var _componentUniform = function() {
			if (!$().uniform) {
				console.warn('Warning - uniform.min.js is not loaded.');
				return;
			}
			$('.note-image-input').uniform({
				fileButtonClass: 'action btn bg-warning-400'
			});
		};


		//
		// Return objects assigned to module
		//

		return {
			init: function() {
				_componentSummernote();
				_componentUniform();
			}
		}
	}();

	// Switchery
    var _componentSwitchery = function() {
        if (typeof Switchery == 'undefined') {
            console.warn('Warning - switchery.min.js is not loaded.');
            return;
        }

        // Initialize single switch
        var elems = Array.prototype.slice.call(document.querySelectorAll('.form-input-switchery'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    };


	

	$( document ).ready(function() {
		basicDT()
		_componentSelect2()
		_componentSwitchery()
		Summernote.init();
		$('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-warning-400'
        });
	});
</script>