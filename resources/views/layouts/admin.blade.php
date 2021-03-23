<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="shortcut icon" href="{{ URL::asset('public/assets/images/favicon.png') }}" />
	<title>FeelGoa - Tours and Travels | Admin | {{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<!--
	=========================================================
	* ArchitectUI HTML Theme Dashboard - v1.0.0
	=========================================================
	* Product Page: https://dashboardpack.com
	* Copyright 2019 DashboardPack (https://dashboardpack.com)
	* Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
	=========================================================
	* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	-->
<link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
				<div class="logo-src"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic is-active" data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>	<div class="app-header__content">
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
											<img width="42" class="rounded-circle" src="{{ URL::asset('assets/images/avatars/1.jpg') }}" alt="">
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
											<button style="display:none;" type="button" tabindex="0" class="dropdown-item">Settings</button>
											<a href="<?php echo EMAIL_MANAGER_URL ?>" target="_black" style="text-decoration:none;"><span class="dropdown-item">Webmail</span></a>
											<a href="<?php echo PAYU_MANAGER_URL ?>" target="_black" style="text-decoration:none;"><span class="dropdown-item">Payments</span></a>
											<h6  style="display:none;" tabindex="-1" class="dropdown-header">Header</h6>
											<button  style="display:none;" type="button" tabindex="0" class="dropdown-item">Actions</button>
											<div tabindex="-1" class="dropdown-divider"></div>
											<button type="button" tabindex="0" class="dropdown-item">Log Out</button>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										Admin
									</div>
									<div class="widget-subheading">
										Feel Goa
									</div>
								</div>
								<div style="display:none;" class="widget-content-right header-user-info ml-3">
									<button type="button" id="toast-message" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
										<i class="fa text-white fa-calendar pr-1 pl-1"></i>
									</button>
								</div>
							</div>
						</div>
					</div>		</div>
			</div>
		</div>		<div class="ui-theme-settings">
			<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
				<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
			</button>
		</div>
		<!-- Main Container  -->
		<div class="app-main">
			<!-- side menu here -->
				<div class="app-sidebar sidebar-shadow">
					<div class="app-header__logo">
						<div class="logo-src"></div>
						<div class="header__pane ml-auto">
							<div>
								<button type="button" class="hamburger close-sidebar-btn hamburger--elastic is-active" data-class="closed-sidebar">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
						</div>
					</div>
					<div class="app-header__mobile-menu">
						<div>
							<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
					<div class="app-header__menu">
						<span>
							<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
								<span class="btn-icon-wrapper">
									<i class="fa fa-ellipsis-v fa-w-6"></i>
								</span>
							</button>
						</span>
					</div>	<div class="scrollbar-sidebar">
						<div class="app-sidebar__inner">
							<ul class="vertical-nav-menu">
								<li class="app-sidebar__heading">Menu</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_HOME_URL}}" @if(str_contains(url()->current(), ADMIN_HOME_URL )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{ ADMIN_DASHBOARD_TITLE }}
									</a>
								</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_ENQUIRYT_URL}}" @if(str_contains(url()->current(), ADMIN_ENQUIRYT_URL )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{ ADMIN_ENQUIRY_TITLE }}
									</a>
								</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_BOOKINGS_URL}}" @if(str_contains(url()->current(), ADMIN_BOOKINGS_URL )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{ ADMIN_BOOKING_TITLE }}
									</a>
								</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_VEHICLE_URL}}" @if(str_contains(url()->current(), ADMIN_VEHICLE_URL )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{ ADMIN_VEHICLE_RENTAL_TITLE }}
									</a>
								</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_BOOKINGS_URL}}" @if(str_contains(url()->current(), 'A' )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										Hotel Booking
									</a>
								</li>
								<li style="display:none;">
									<a href="{{ADMIN_BASE.ADMIN_BOOKINGS_URL}}" @if(str_contains(url()->current(), 'A' )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{ ADMIN_WEDDING_CAR_TITLE }}
									</a>
								</li>
								<li>
									<a href="{{ADMIN_BASE.ADMIN_BOOKINGS_URL}}" @if(str_contains(url()->current(), 'B' )) class="mm-active" @endif>
										<i class="metismenu-icon pe-7s-diamond"></i>
										{{  ADMIN_PAYMENTS_TITLE }}
									</a>
								</li>

								<li style="display:none;">
									<a href="#">
										<i class="metismenu-icon pe-7s-diamond"></i>
											Sample
										<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
									</a>
									<ul>
										<li>
											<a href="elements-buttons-standard.html">
												<i class="metismenu-icon"></i>
												Menu 1
											</a>
										</li>
										<li>
											<a href="elements-dropdowns.html">
												<i class="metismenu-icon"></i>
												Menu 2
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--SIDE MENU ENDS-->
				<div class="app-main__outer">
					<div class="app-main__inner">
					@yield('content')
					<!-- Footer -->
					<div class="app-wrapper-footer" style="padding-top:12px">
						<div class="app-footer">
							<div class="app-footer__inner">
									<div class="col-md-12" style="text-align:center;">
										<div>
											<i class="fas fa-copyright"></i> FeelGoa 2020. All rights reserved.
										</div>
										<div class="clearfix"></div>
										<div>
										Designed with  <i style="color: #d92550;" class="fas fa-heart"></i>
										</div>
									</div>
							</div>
						</div>
					</div>
					<!-- Footer End -->

				</div>
				
		</div>
	</div>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/main.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/custom_admin.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
</body>

</html>
