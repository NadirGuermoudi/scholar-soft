@extends('layouts.master', ['title' => 'Modifier étudiant'])
@include('layouts/partials/#chosen')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">

						<h4 class="card-title">Modifier l'étudiant {{ $etudiant->fullName }}</h4>

						<form action="{{ route('etudiants.update', $etudiant) }}" method="POST">
							@csrf
							@method('PUT')

							<div class="form-group {{ $errors->has('matricule') ? 'has-danger' : '' }}">
								<label for="matricule" class="control-label">Matricule</label>
								<input type="text" name="matricule" id="matricule" class="form-control" required="required"
											 value="{{ $etudiant->matricule }}">
								{!! $errors->first('matricule', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('nom') ? 'has-danger' : '' }}">
								<label for="nom" class="control-label">Nom</label>
								<input type="text" name="nom" id="nom" class="form-control" required="required"
											 value="{{ $etudiant->nom }}">
								{!! $errors->first('nom', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('prenom') ? 'has-danger' : '' }}">
								<label for="prenom" class="control-label">Prenom</label>
								<input type="text" name="prenom" id="prenom" class="form-control" required="required"
											 value="{{ $etudiant->prenom }}">
								{!! $errors->first('prenom', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('date_naissance') ? 'has-danger' : '' }}">
								<label for="date_naissance" class="control-label">Date_naissance</label>
								<input type="date" name="date_naissance" id="date_naissance" class="form-control" required="required"
											 value="{{ $etudiant->date_naissance }}">
								{!! $errors->first('date_naissance', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
								<label for="email" class="control-label">Email</label>
								<input type="email" name="email" id="email" class="form-control" required="required"
											 value="{{ $etudiant->email }}">
								{!! $errors->first('email', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
								<label for="password" class="control-label">Password</label>
								<input type="password" name="password" id="password" class="form-control" required="required" value="">
								{!! $errors->first('password', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('password') ? 'has-danger' : '' }}">
								<label for="password" class="control-label">Confirm password</label>
								<input type="password" name="password" id="confirm_password" class="form-control" required="required"
											 value="">
								{!! $errors->first('password', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit">Modifier l'étudiant</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script type="text/javascript">
      var password = document.getElementById("password"),
          confirm_password = document.getElementById("confirm_password");

      function validatePassword() {
          if (password.value != confirm_password.value) {
              confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
              confirm_password.setCustomValidity('');
          }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
	</script>
@endpush
