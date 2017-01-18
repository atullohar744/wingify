<?php
session_start();
require_once ("config.php");
check_login();
opendb();
require_once ('api.php');
$api = new api();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Gentelella Alela! | </title>

		<!-- Bootstrap -->
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<!-- bootstrap-wysiwyg -->
		<link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
		<!-- Select2 -->
		<link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
		<!-- Switchery -->
		<link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
		<!-- starrr -->
		<link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
		<!-- bootstrap-daterangepicker -->
		<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="build/css/custom.min.css" rel="stylesheet">
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="javascript:void(0);" class="site_title"><i class="fa fa-paw"></i> <span>Wingify Products</span></a>
						</div>

						<div class="clearfix"></div>

						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="images/img.jpg" alt="..." class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Welcome,</span>
								<h2><?php echo $_SESSION['user']['name']; ?></h2>
							</div>
						</div>
						<!-- /menu profile quick info -->

						<br />

						<!-- sidebar menu -->
						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>Products</h3>
							</div>
						</div>
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->
						<div class="sidebar-footer hidden-small">
							<a data-toggle="tooltip" data-placement="top" href="ajax.php?mode=logout" title="Logout"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a>
						</div>
						<!-- /menu footer buttons -->
					</div>
				</div>

				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<nav>
							<div class="nav toggle">
								<a id="menu_toggle"><i class="fa fa-bars"></i></a>
							</div>

							<ul class="nav navbar-nav navbar-right">
								<li class="">
									<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="images/img.jpg" alt=""><?php echo $_SESSION['user']['name']; ?> <span class=" fa fa-angle-down"></span> </a>
									<ul class="dropdown-menu dropdown-usermenu pull-right">
										<li>
											<a href="ajax.php?mode=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
										</li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Add Product</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li>
												<a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content" style="display: none;">
										<br />
										<form id="frmEditProduct" name="frmEditProduct" action="ajax.php?mode=add" data-parsley-validate class="form-horizontal form-label-left">
											<input type="hidden" name="id" value="" id="id" />

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span> </label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" id="name" name="name" placeholder="Product Name" required="required" class="form-control col-md-7 col-xs-12">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span> </label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<textarea class="form-control" rows="3" placeholder="Product Description" name="description" id="description"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="price" class="form-control col-md-7 col-xs-12" type="text" placeholder="Product Price" name="price">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<div id="status" class="btn-group" data-toggle="buttons">
														<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
															<input type="radio" name="status" value="1">
															&nbsp; Active &nbsp; </label>
														<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
															<input type="radio" name="status" value="0">
															Inactive </label>
													</div>
												</div>
											</div>
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
													<button type="submit" class="btn btn-primary">
														Cancel
													</button>
													<button type="submit" class="btn btn-success">
														Submit
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Products</small></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Price</th>
											<th>Controls</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$products = $api->_getProducts();
										foreach ($products as $key => $value) {
										?>
											<tr id="product<?php echo @$value['id']; ?>">
												<td><?php echo @$value['name']; ?></td>
												<td><?php echo @$value['description']; ?></td>
												<td><?php echo @$value['price']; ?></td>
												<td>
													<a href="javascript:toggleEdit('<?php echo @$value['id']; ?>');"><i class="fa fa-pencil"></i> &nbsp; </a>
													<a href="javascript:deleteRecord('<?php echo @$value['id']; ?>');"><i class="fa fa-close"></i> &nbsp; </a>
												</td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						&nbsp;
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="vendors/nprogress/nprogress.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="vendors/iCheck/icheck.min.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="vendors/moment/min/moment.min.js"></script>
		<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap-wysiwyg -->
		<script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
		<script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
		<script src="vendors/google-code-prettify/src/prettify.js"></script>
		<!-- jQuery Tags Input -->
		<script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
		<!-- Switchery -->
		<script src="vendors/switchery/dist/switchery.min.js"></script>
		<!-- Select2 -->
		<script src="vendors/select2/dist/js/select2.full.min.js"></script>
		<!-- Parsley -->
		<script src="vendors/parsleyjs/dist/parsley.min.js"></script>
		<!-- Autosize -->
		<script src="vendors/autosize/dist/autosize.min.js"></script>
		<!-- jQuery autocomplete -->
		<script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
		<!-- starrr -->
		<script src="vendors/starrr/dist/starrr.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="build/js/custom.min.js"></script>
		<script src="http://malsup.github.io/min/jquery.form.min.js"></script> 

		<!-- bootstrap-daterangepicker -->
		<script>
			$(document).ready(function() {
				$('#birthday').daterangepicker({
					singleDatePicker : true,
					calender_style : "picker_4"
				}, function(start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
			});

			function deleteRecord(id) {
				$.ajax({
					type : 'POST',
					url : 'ajax.php?mode=delete&id=' + id,
					success : function(response) {
						if (response == 'SUCCESS')
							$('tr#product' + id).remove();
					}
				});
			}

			function toggleEdit(id) {
				$.ajax({
					type : 'POST',
					url : 'ajax.php?mode=edit&id=' + id,
					success : function(response) {
						response = jQuery.parseJSON(response);
						if (response) {
							for (var i in response) {
								if ($('#frmEditProduct #' + i).length)
									$('#frmEditProduct #' + i).val(response[i]);
							}
							$('#frmEditProduct input[name="status"][value="' + parseInt(response['status']) + '"]').trigger("click")
						}
					}
				});
			}


			$('#frmEditProduct').ajaxForm({
				'type' : 'POST',
				'success' : function(response) {
					response = jQuery.parseJSON(response);

					if ($('#tr#product' + response['id']).length) {
						$('#tr#product' + response['id']).find('td:eq(1)').text(response['name']);
						$('#tr#product' + response['id']).find('td:eq(2)').text(response['description']);
						$('#tr#product' + response['id']).find('td:eq(3)').text(response['price']);
					} else {
						$row = $('#datatable-checkbox tbody tr:eq(0)').clone();
						$row.find('td:eq(0) input.flat').val(response['id']);
						$row.find('td:eq(1)').text(response['name']);
						$row.find('td:eq(2)').text(response['description']);
						$row.find('td:eq(3)').text(response['price']);
						$row.find('td:eq(4) a:eq(0)').attr('href', 'javascript:toggleEdit("' + response['id'] + '");');
						$row.find('td:eq(4) a:eq(0)').attr('href', 'javascript:deleteRecord("' + response['id'] + '");');
						$('#datatable-checkbox tbody tr:last').after($row);
					}
				}
			});
		</script>
		<!-- /bootstrap-daterangepicker -->

		<!-- bootstrap-wysiwyg -->
		<script>
			$(document).ready(function() {
				function initToolbarBootstrapBindings() {
					var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times', 'Times New Roman', 'Verdana'],
					    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
					$.each(fonts, function(idx, fontName) {
						fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
					});
					$('a[title]').tooltip({
						container : 'body'
					});
					$('.dropdown-menu input').click(function() {
						return false;
					}).change(function() {
						$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
					}).keydown('esc', function() {
						this.value = '';
						$(this).change();
					});

					$('[data-role=magic-overlay]').each(function() {
						var overlay = $(this),
						    target = $(overlay.data('target'));
						overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
					});

					if ("onwebkitspeechchange" in document.createElement("input")) {
						var editorOffset = $('#editor').offset();

						$('.voiceBtn').css('position', 'absolute').offset({
							top : editorOffset.top,
							left : editorOffset.left + $('#editor').innerWidth() - 35
						});
					} else {
						$('.voiceBtn').hide();
					}
				}

				function showErrorAlert(reason, detail) {
					var msg = '';
					if (reason === 'unsupported-file-type') {
						msg = "Unsupported format " + detail;
					} else {
						console.log("error uploading file", reason, detail);
					}
					$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' + '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
				}

				initToolbarBootstrapBindings();

				$('#editor').wysiwyg({
					fileUploadError : showErrorAlert
				});

				window.prettyPrint
				prettyPrint();
			});
		</script>
		<!-- /bootstrap-wysiwyg -->

		<!-- Parsley -->
		<script>
			$(document).ready(function() {
				$.listen('parsley:field:validate', function() {
					validateFront();
				});
				$('#demo-form .btn').on('click', function() {
					$('#demo-form').parsley().validate();
					validateFront();
				});
				var validateFront = function() {
					if (true === $('#demo-form').parsley().isValid()) {
						$('.bs-callout-info').removeClass('hidden');
						$('.bs-callout-warning').addClass('hidden');
					} else {
						$('.bs-callout-info').addClass('hidden');
						$('.bs-callout-warning').removeClass('hidden');
					}
				};
			});

			$(document).ready(function() {
				$.listen('parsley:field:validate', function() {
					validateFront();
				});
				$('#demo-form2 .btn').on('click', function() {
					$('#demo-form2').parsley().validate();
					validateFront();
				});
				var validateFront = function() {
					if (true === $('#demo-form2').parsley().isValid()) {
						$('.bs-callout-info').removeClass('hidden');
						$('.bs-callout-warning').addClass('hidden');
					} else {
						$('.bs-callout-info').addClass('hidden');
						$('.bs-callout-warning').removeClass('hidden');
					}
				};
			});
			try {
				hljs.initHighlightingOnLoad();
			} catch (err) {
			}
		</script>
		<!-- /Parsley -->
	</body>
</html>
<?php
closedb();
?>