<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
	<title>Amdash - Bootstrap 5 Admin Template</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{asset('assets/images/logo-img.png')}}" width="180" alt="" />
						</div>
						<div class="_card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										{{-- message succes --}}
										@if (session('success'))
											<div class="alert alert-success">
												{{ session('success') }}
											</div>
										@endif
									    {{--  fin message deu succes--}}
										<h3 class="">S'identifier</h3>
										<p>Vous n'avez pas encore de compte? <a href="{{url('authentication/inscription')}}">Inscrivez-vous ici</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('assets/images/icons/search.svg')}}" width="16" alt="Image Description">
                          <span>S'identifier avec Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Connectez-vous avec Facebook</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OU CONNECTEZ-VOUS AVEC EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" action="{{url('authentication/connexion-traitement')}}" method="POST">
											{{csrf_field()}}
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Adresse e-mail</label>
												<input type="email @error('email') is-invalid @enderror" class="form-control" id="inputEmailAddress" placeholder="Entrer votre adresse email" name="email">
												@error('email')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Entrer le mot de passe</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Entrer votre mot de passe" name="pwd"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="sesourvenir">
													<label class="form-check-label" for="flexSwitchCheckChecked">Souviens-toi de moi</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="{{url('authentication/mot-de-passe-oublie')}}">Mot de passe oublié ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>S'identifier</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>