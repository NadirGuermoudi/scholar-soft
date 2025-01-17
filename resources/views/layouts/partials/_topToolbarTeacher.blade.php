<header class="topbar">
	<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
		<!-- Logo -->
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('teacher.home') }}">
				<!-- Logo icon -->
				<b>
					<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
					<!-- Dark Logo icon -->
					<img src="{{asset('monster/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
					<!-- Light Logo icon -->
					{{-- <img src="{{asset('monster/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
					<i class="fas fa-graduation-cap fa-lg text-white"></i>
				</b>
				<!--End Logo icon -->
				<!-- Logo text -->
				<span>
					<!-- dark Logo text -->
					<img src="{{asset('monster/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
					<!-- Light Logo text -->
					<img src="{{asset('scholar-soft-text-logo.png')}}" class="light-logo" alt="homepage" />
				</span>
			</a>
		</div>
		<!-- End Logo -->
		<div class="navbar-collapse">
			<!-- toggle and nav items -->
			<ul class="navbar-nav mr-auto mt-md-0 ">
				<!-- This is  -->
				<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
				<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
				<!-- Comment -->
				{{-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
						<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
					</a>
					<div class="dropdown-menu mailbox animated bounceInDown">
						<ul>
							<li>
								<div class="drop-title">Notifications</div>
							</li>
							<li>
								<div class="message-center">
									<!-- Message -->
									<a href="#">
										<div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
										<div class="mail-contnet">
											<h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> 
										</div>
									</a>
									<!-- Message -->
									<a href="#">
										<div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
										<div class="mail-contnet">
											<h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> 
										</div>
									</a>
									<!-- Message -->
									<a href="#">
										<div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
										<div class="mail-contnet">
											<h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> 
										</div>
									</a>
									<!-- Message -->
									<a href="#">
										<div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
										<div class="mail-contnet">
											<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> 
										</div>
									</a>
								</div>
							</li>
							<li>
								<a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
							</li>
						</ul>
					</div>
				</li> --}}
				<!-- End Comment -->
				
				<!-- Messages -->
				<!-- End Messages -->
				
				<!-- Messages -->
				<!-- End Messages -->

			</ul>
			<!-- User profile and search -->
			<ul class="navbar-nav my-lg-0">
				{{-- <li class="nav-item hidden-sm-down">
					<form class="app-search">
						<input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> 
					</form>
				</li> --}}
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="round round-danger">{{ strtoupper(substr( Auth::guard('enseignant')->user()->prenom, 0, 1)) }}</span></a>
					<div class="dropdown-menu dropdown-menu-right animated flipInY">
						<ul class="dropdown-user">
							<li>
								<div class="dw-user-box">
									<div class="u-img"><img src="{{asset('monster/assets/images/users/1.jpg')}}" alt="user"></div>
									<div class="u-text">
										<h4>Steave Jobs</h4>
										<p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
									</div>
								</div>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="#"><i class="ti-user"></i> My Profile</a></li>
							<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
							<li><a href="#"><i class="ti-email"></i> Inbox</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="{{ route('teacher.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="{{ route('teacher.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>