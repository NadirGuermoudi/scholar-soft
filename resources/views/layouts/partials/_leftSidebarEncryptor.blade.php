<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- User profile -->
		<div class="user-profile">
			<!-- User profile image -->
			{{-- <div class="profile-img"> <img src="{{asset('images/monster/users/1.jpg')}}" alt="user" /> </div> --}}
			<div class="profile-img"> <span class="round round-danger">{{ strtoupper(substr( Auth::guard('encryptor')->user()->prenom, 0, 1)) }}</span> </div>
			<!-- User profile text-->
			<div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::guard('encryptor')->user()->fullName }} <span class="caret"></span></a>
				<div class="dropdown-menu animated flipInY">
					<a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
					<a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
					<a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
					<div class="dropdown-divider"></div> 
					<a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
					<div class="dropdown-divider"></div> 
					<a href="{{ route('encryptor.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
				</div>
			</div>
		</div>
		<!-- End User profile text-->
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li>
					<a href="{{ route('encryptor.home') }}" class="{{ set_active_route('encryptor.home') }} {{ url()->current() == url('/') ? 'active' : '' }}" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="hide-menu">
							Accueil 
						</span>
					</a>
				</li>

				<li class="nav-devider"></li>

				<li class="nav-small-cap">PAQUETS</li>
				<li>
					<a href="{{ route('codeur-paquets.index') }}" class="{{ set_active_route('codeur-paquets.index') }}" aria-expanded="false">
						<i class="fas fa-folder fa-lg"></i>
						<span class="hide-menu">
							Paquets non pris 
						</span>
					</a>
				</li>

				<li>
					<a href="{{ route('codeur-paquets.not.encrypted') }}" class="{{ set_active_route('codeur-paquets.not.encrypted') }}" aria-expanded="false">
						<i class="fas fa-sync-alt fa-lg"></i>
						<span class="hide-menu">
							Mes paquets non codées 
						</span>
					</a>
				</li>

				<li>
					<a href="{{ route('codeur-paquets.encrypted') }}" class="{{ set_active_route('codeur-paquets.encrypted') }}" aria-expanded="false">
						<i class="fas fa-clipboard-check fa-lg"></i>
						<span class="hide-menu">
							Mes paquets codées  
						</span>
					</a>
				</li>

				<li class="nav-devider"></li>

				<li>
					<a href="{{ route('encryptor.mails') }}" class="{{ set_active_route('encryptor.mails') }}" aria-expanded="false">
						<i class="fas fa-envelope fa-lg"></i>
						<span class="hide-menu">
							Mails 
						</span>
					</a>
				</li>

				<li>
					<a href="#" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Paramètres </span></a>
				</li>

			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
	<!-- Bottom points-->
	<div class="sidebar-footer">
		<!-- item-->
		<a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="{{ route('encryptor.mails') }}" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
		<!-- item-->
		<a href="{{ route('encryptor.logout') }}" class="link" data-toggle="tooltip" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i></a>
	</div>
	<!-- End Bottom points-->
</aside>