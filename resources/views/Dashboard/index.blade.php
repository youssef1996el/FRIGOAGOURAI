<!doctype html>

<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon"  href="{{asset('public/image/leaf.svg')}}">
    <title>Frigo</title>
    <link href="{{asset('public/css/bootstrap_sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/main_sidebar.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="d-flex flex-column h-100">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<div id="page">
		<div class="wrapper">
			<nav id="sidebar" class="active">
				<div class="sidebar-header text-center">
					{{-- <img src="{{asset('image/leaf.svg')}}" alt="logo" class="app-logo"> --}}
					<h4 class="sidebar-title theme-item">FRIGO AGOURAI</h4>
				</div>

				<ul class="list-unstyled components text-secondary">
                    @can('dashboard')
                        <li>
                            <a href="{{url('Dashboard')}}">
                                <i class="data-feather theme-item text-dark" data-feather="home"></i>
                                <span class="theme-item">page d'accueil</span>
                            </a>
                        </li>
                    @endcan
                    @can('compagnie')
                    <li>
                        <a href="{{url('Companie')}}">
                            <img src="{{'public/images/company.png'}}" alt="" width="25px" height="25px" style="margin-left:-8px">
                            <span>Compagnies</span>
                        </a>
                    </li>
                @endcan
                @can('clients')
                        <li>
                            <a href="{{url('ClientSidebar')}}">

                                <i class="data-feather theme-item text-dark" data-feather="users"></i>
                                <span class="theme-item">Clients</span>
                            </a>
                        </li>
                    @endcan
                @can('caisseSortie')
                    <li>
                        <a href="{{url('MarchSortie')}}">
                            <img src="{{asset('public/images/caisse_sortie.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                            <span class="theme-item" style="white-space: nowrap;font-size:15px;">Sortie de caisses vides</span>
                        </a>
                    </li>
                @endcan
                @can('Marchentree')
                        <li>
                            <a href="{{url('MarchEntree')}}">
                                <img src="{{asset('public/images/courier.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;transform: scaleX(-1)">
                                <span class="theme-item" style="white-space: nowrap;font-size: 14.5px;">Entée de marchandises</span>
                            </a>
                        </li>
                    @endcan
                    @can('MarchSorite')
                    <li>
                        <a href="{{url('MarchandiseSortie')}}">
                            <img src="{{asset('public/images/courier.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                            <span class="theme-item" style="white-space: nowrap;font-size: 14.5px;">Sortie de marchandises</span>
                        </a>
                    </li>
                @endcan

                @can('caisseEntree')
                <li>
                    <a href="{{url('CaisseRetour')}}">
                        <img src="{{asset('public/images/caisse.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                        <span class="theme-item" style="white-space: nowrap;font-size: 14.5px;">Retour de caisses vides</span>
                    </a>
                </li>
            @endcan

            @can('situation stokage')
                        <li class="listStockage ">
                            <a href="#">
                                <img src="{{asset('public/images/management.png')}}" alt="" width="20px" height="20px" style="margin-left:-8px">
                                <span class="theme-item " style="white-space: nowrap"> Situation de stockage </span>
                            </a>
                            <ul style="left: -29px;top: 13px;border-radius: 50%;">
                                <li style="margin: 0;padding: 0; list-style-type: none;">
                                    <a class="first-menu-item" href="{{url('SortieCaisseVide')}}">Sortie de caisses vides</a>
                                    <a class="secound-menu-item" href="{{url('Entremarchandises')}}">Entrée de marchandises</a>
                                    <a class="three-menu-item" href="{{url('SortieMarchandise')}}">Sortie de marchandises</a>
                                    <a class="foor-menu-item" href="{{url('RetourdeMarchandise')}}">Retour de marchandise</a>
                                    <a class="five-menu-item" href="{{url('bilanGeneral')}}">Le bilan général</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                @can('chauffeur')
                        <li>
                            <a href="{{url('Chauffeur')}}">
                                <img src="{{asset('public/images/chauffeur.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                                <span class="theme-item">Livreurs</span>
                            </a>
                        </li>
                    @endcan
                    @can('listOrigine')
                    <li>
                        <a href="{{url('ListOrigin')}}">
                            <img src="{{'public/images/des-fruits.png'}}" alt="" width="25px" height="25px" style="margin-left:-8px">
                            <span class="theme-item"> Liste de produits</span>
                        </a>
                    </li>
                @endcan
                @can('users')
                <li>
                    <a href="{{url('Userss')}}">
                        <img src="{{asset('public/images/users.png')}}" alt="" srcset="" width="25px" height="25px" style="margin-left:-8px;">
                        <span class="theme-item">Utilisateurs</span>
                    </a>
                </li>
            @endcan

                @can('roles')
                        <li>
                            <a href="{{url('roles')}}">
                                <img src="{{'public/images/gestion.png'}}" alt="" width="25px" height="25px" style="margin-left: -8px">
                                <span class="theme-item"> Pouvoirs utilisateurs</span>
                            </a>
                        </li>
                    @endcan










                   {{--  @can('stock')
                        <li>
                            <a href="{{url('Stock')}}">
                                <img src="{{'public/images/in-stock.png'}}" alt="" width="25px" height="25px" style="margin-left:-8px">
                                <span class="theme-item"> Stock</span>
                            </a>
                        </li>
                    @endcan --}}





                    @can('information')
                        <li>
                            <a href="{{url('info')}}">
                                <img src="{{'public/images/information.png'}}" alt="" width="25px" height="25px" style="margin-left:-8px">
                                <span class="theme-item"> Information</span>
                            </a>
                        </li>
                    @endcan







				</ul>

				{{-- <div class="text-center mt-5 mb-5">
					<a href="#" class="theme-btn" onClick="removeCookieSidebar()">Reset</a>
				</div> --}}

			</nav>

			<div id="bodywrapper" class="container-fluid showhidetoggle">
				<nav class="navbar navbar-expand-md navbar-white bg-white py-0" aria-label="navbarexample" id="navbar">
					<div class="container-fluid">
						<button type="button" id="sidebarCollapse" class="btn btn-light py-0">
							<i data-feather="menu"></i> <span></span>
						</button>
						<img src="{{asset('image/leaf.svg')}}" alt="logo" class="app-logo theme-item mx-2 navbrandarea1">
						<h4 class="sidebar-title theme-item mt-2 navbrandarea2">FRIGO AGOURAI</h4>
						<button class="navbar-toggler py-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon">
                                <i data-feather="menu"></i>
                            </span>
						</button>

						<div class="collapse navbar-collapse mx-1" id="navbarsExample04">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							</ul>
							<div class="usermenu">
								<div class="nav-dropdown py-0">
									<a href="#" class="nav-item nav-link dropdown-toggle text-secondary py-0" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                        <span class="theme-item">{{ Auth::user()->name }}</span>
                                        <i class="theme-item" data-feather="chevron-down"></i>
                                    </a>
									<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown3">
										{{-- <li>
                                            <a href="profile.html" class="dropdown-item mt-2">
                                                <i class="data-feather" data-feather="user"></i> Profile
                                            </a>
                                        </li>
										<li>
                                            <a href="#" class="dropdown-item mt-2">
                                                <i class="data-feather" data-feather="mail"></i> Messages
                                            </a>
                                        </li> --}}
										{{-- <li>
                                            <a href="#" class="dropdown-item mt-2" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                                <i class="data-feather" data-feather="settings"></i> Settings
                                            </a>
                                        </li> --}}
										<li>
                                            <a href="{{ route('logout') }}" class="dropdown-item mt-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="data-feather" data-feather="log-out"></i>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</nav>


				<div class="settings">
					<div class="modal fade" id="settingsModal" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
						<div class="modal-dialog modal-dialog-settings">
							<div class="modal-content">
								<div class="modal-header text-center">
									<h5 class="modal-title" id="exampleModalLabel">Settings</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<section id="logincontent" class="shiftdown">
										<div class="row g-3 mb-3 mt-3">
											<div class="col-md-6">
												<h6 class="text-muted">Select Color</h6>
												<span onclick="changeColor('0')" class="btn btn-sm btn-primary rounded-circle">
                                                    <span class="me-2"></span>
                                                </span>
                                                <span onclick="changeColor('1')" class="btn btn-sm btn-success rounded-circle">
                                                    <span class="me-2"></span>
                                                </span>
                                                <span onclick="changeColor('2')" class="btn btn-sm btn-danger rounded-circle">
                                                    <span class="me-2"></span>
                                                </span>
                                                <span onclick="changeColor('3')" class="btn btn-sm btn-warning rounded-circle">
                                                    <span class="me-2"></span>
                                                </span>
                                                <span onclick="changeColor('4')" class="btn btn-sm btn-secondary rounded-circle">
                                                    <span class="me-2"></span>
                                                </span>
												<div class="d-flex justify-content-between">
													<button onclick="removeColorCookie()">Reset to Default</button>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">Preferences</h6>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Switch option 1</label>
												</div>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Switch option 2</label>
												</div>
											</div>
										</div>
										<div class="row g-3 mb-3 mt-3">
											<div class="col-md-6">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                                                    <label class="form-check-label" for="defaultCheck1"> Checkbox 1 </label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                    <label class="form-check-label" for="defaultCheck2"> Checkbox 2</label>
												</div>
											</div>
											<div class="col-md-6">
												<h6 class="text-muted">View Size</h6>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="radioCompactView">
                                                    <label class="form-check-label" for="radioCompactView"> Compact</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="radioFullView">
                                                    <label class="form-check-label" for="radioFullView"> Full-screen </label>
												</div>
												<div class="d-flex justify-content-between">
													<button onclick="removeViewSizeCookie()">Reset to Default</button>
												</div>
											</div>
										</div>
										<hr />
										<button class="btn btn-sm btn-danger" data-bs-dismiss="modal" type="button">
											<i data-feather="check-circle" class="mr-1"></i> Ok
										</button>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="sidebarOverlayNav" class="screen-overlay float-end">
					<a href="javascript:void(0)" class="closebtn" onclick="closeOverlayNav()">&times;</a>
					<div class="screen-overlay-content text-secondary">
						<a href="#" class="active">About</a>
                        <a href="#">Services</a>
                        <a href="#">Clients</a>
                        <a href="#">Contact</a>
					</div>
				</div>
				<div class="content">
					<div class="container-fluid">
                        <main class="py-4">
                            @yield('contentDashboard')
                        </main>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="loading" class="spinner-border text-primary align-middle" role="status"></div>

	<button class="btn btn-sm btn-primary rounded-circle" onclick="scrollToTopFunction()" id="scrollToTop" title="Scroll to top">
		<i data-feather="arrow-up-circle"></i>
	</button>
    <style>
        .list-unstyled ul {
    display: none;
    position: absolute;
    top: 0;
    left: 0; /* Adjusted the left property to 0 */
    margin-top: 38px; /* Adjusted the spacing as needed */
    background-color: #fff; /* Adjust the background color as needed */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
}
.list-unstyled .listStockage:hover > ul {
    display: block;
}

        .list-unstyled ul li {
            white-space: nowrap;
        }
        .list-unstyled .listStockage {
            position: relative;
        }
    </style>
	<script src="{{asset('public/script/feather.min.js')}}"></script>
	<script src="{{asset('public/script/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('public/script/Chart.min.js')}}"></script>
	<script src="{{asset('public/script/script_sidebar.js')}}"></script>


   {{--  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> --}}

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        a
        {
            text-decoration: none;
            color: gray
        }
    </style>
    <script>
        $(document).ready(function () {
            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "Dashboard")
            {
                $('.list-unstyled li:has(span:contains("Dashboard"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
        });
    </script>
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event)
        {
			feather.replace();
		});
	</script>

</body>

</html>
