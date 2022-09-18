<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="responsive-logo">
							<a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('dashboard/img/brand/logo.png')}}" class="logo-1" alt="logo"></a>
							
						</div>
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
						<div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
							<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
						</div>
					</div>
					<div class="main-header-right">

						<div class="nav nav-item  navbar-nav-right ml-auto">
						
						
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href=""><img alt="" src="{{URL::asset('dashboard/img/faces/6.jpg')}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('dashboard/img/faces/6.jpg')}}" class=""></div>
											
										</div>
									</div>
									

                                        @if(auth('web')->check())
                                          <form method="POST"  action="{{route('logout')}}">
                                        @else
                                          <form method="POST" action="{{route('logout')}}">
                                        @endif
                                                @csrf
                                                <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="bx bx-log-out"></i>log out</a>
                                        </form>

								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
