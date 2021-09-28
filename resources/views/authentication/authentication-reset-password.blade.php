<!DOCTYPE html>
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

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card">
						<div class="row g-0">
							<div class="col-lg-5 border-end">
								<div class="card-body">
									<div class="p-5">
										<div class="text-start">
											<img src="{{asset('assets/images/logo-img.png')}}" width="180" alt="">
										</div>
										<form action="{{url('authentication/reinitialise-mot-de-passe-traitement')}}" method="POST">
											{{csrf_field()}}
											<h4 class="mt-5 font-weight-bold">Generer un nouveau mot de passe</h4>
											<p class="text-muted">Nous avons reçu votre demande de réinitialisation de mot de passe. Veuillez saisir votre nouveau mot de passe!</p>
											<div class="mb-3 mt-5">
												<label class="form-label">Nouveau mot de passe</label>
												<input type="password" class="form-control @error('npwd1') is-invalid @enderror" placeholder="Entrez un nouveau mot de passe" name="npwd1"/>
												@error('npwd1')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
											<div class="mb-3">
												<label class="form-label">Confirmez le nouveau mot de passe</label>
												<input type="password" class="form-control" placeholder="Confirmez le nouveau mot de passe" name="npwd2"/>
												
											</div>
											<div class="d-grid gap-2">
												<button type="submit" class="btn btn-primary">Changer le mot de passe</button> <a href="{{url('authentication/connexion')}}"></i>Retour connexion</a>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<img src="{{asset('assets/images/login-images/forgot-password-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>