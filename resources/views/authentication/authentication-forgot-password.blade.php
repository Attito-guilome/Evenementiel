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

<body class="bg-forgot">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="_card forgot-box">
				<div class="card-body">
					<div class="p-4 rounded  border">
						<div class="text-center">
							<img src="{{asset('assets/images/icons/forgot-2.png')}}" width="120" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">Mot de passe oublié?</h4>
						<p class="text-muted">Entrez votre identifiant de messagerie enregistré<br>pour réinitialiser le mot de passe</p>
						<form action="{{url('authentication/mot-de-passe-oublie-traitement')}}" method="POST">
							{{csrf_field()}}	
							<div class="my-4">
								<label class="form-label">Identifiant de l'e-mail</label>
								<input type="text" class="form-control form-control-lg" placeholder="example@user.com" value="{{old('email')}}" name="email"/>
								@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary btn-lg">Envoyer</button> <a href="{{url('authentication/connexion')}}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Retour connexion</a>
							</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>