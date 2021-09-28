<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
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
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="{{asset('assets/images/logo-img.png')}}" width="180" alt="" />
						</div>
						<div class="_card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">S'inscrire</h3>
										<p>Vous avez déjà un compte? <a href="{{url('authentication/connexion')}}">Se connecter ici</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                          <img class="me-2" src="{{asset('assets/images/icons/search.svg')}}" width="16" alt="Image Description">
                          <span>Inscrivez-vous avec Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Inscrivez-vous avec Facebook</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>VOUS POUVEZ ÉGALEMENT VOUS ENREGISTRER VIA E-MAIL</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" action="{{url('authentication/enregister-user')}}" method="POST">
											{{csrf_field()}}
											
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">Nom</label>
												<input type="text" class="form-control @error('nom') is-invalid @enderror" id="inputFirstName" placeholder="Jhon" name="nom" value="{{ old('nom') }}">
												@error('nom')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Prenom</label>
												<input type="text" class="form-control @error('prenom') is-invalid @enderror" id="inputLastName" placeholder="Deo" name="prenom" value="{{ old('prenom') }}">
												@error('prenom')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Adresse email</label>
												<input type="email" class="form-control @error('prenom') is-invalid @enderror" id="inputEmailAddress" placeholder="example@user.com" name="email" value="{{ old('email') }}">
												@error('email')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Mot de passe</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0 @error('pwd1') is-invalid @enderror" id="inputChoosePassword" value="" placeholder="Enter Password"  name="pwd1" value="{{ old('pwd1') }}"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
													
												</div>
												@error('pwd1')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Confirmer le mot de passe</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0 @error('pwd2') is-invalid @enderror" id="inputChoosePassword" value="" placeholder="Enter Password"  name="pwd2" value="{{ old('pwd2') }}"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
												
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">Votre pays</label>
												<input list="list-pays" class="form-select @error('pays') is-invalid @enderror" id="inputSelectCountry" aria-label="Default select example" name="pays" value="{{ old('pays') }}">
												<datalist id="list-pays">
												<option value="Afghanistan"></option>
												<option value="Afrique du Sud"></option>
												<option value="Albanie"></option>
												<option value="Algérie"></option>
												<option value="Allemagne"></option>
												<option value="Andorre"></option>
												<option value="Angola"></option>
												<option value="Antigua-et-Barbuda"></option>
												<option value="Arabie saoudite"></option>
												<option value="Argentine"></option>
												<option value="Arménie"></option>
												<option value="Australie"></option>
												<option value="Autriche"></option>
												<option value="Azerbaïdjan"></option>
												<option value="Bahamas"></option>
												<option value="Bahreïn"></option>
												<option value="Bangladesh"></option>
												</datalist>
												@error('pays')
														<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input @error('term') is-invalid @enderror" type="checkbox" id="flexSwitchCheckChecked" name="term">
													<label class="form-check-label" for="flexSwitchCheckChecked">J'ai lu et j'accepte les conditions générales</label>
													@error('term')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>S'inscrire</button>
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
	<script src="{{asset('assets/js/app.js')}}"></script>
</body>

</html>