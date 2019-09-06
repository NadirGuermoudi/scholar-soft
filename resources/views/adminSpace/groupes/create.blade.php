@extends('layouts.master', ['title' => 'Crée un groupe'])
@include('layouts/partials/#chosen')

@push('styles')
	<style type="text/css">
		#excel_help {
			display: none;
		}

		#helpme:hover > #excel_help {
			display: block;
		}
	</style>
@endpush

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">

						<h4 class="card-title">Ajouter un groupe</h4>

						<form action="{{ route('groupes.store') }}" method="POST" enctype="multipart/form-data">
							@csrf

							<div class="form-group {{ $errors->has('specialite') ? 'has-danger' : '' }}">
								<label for="specialite" class="control-label">Specialité</label>
								<input type="text" name="specialite" id="specialite" class="form-control" required="required"
											 value="{{ old('specialite') }}">
								{!! $errors->first('specialite', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('numero') ? 'has-danger' : '' }}">
								<label for="numero" class="control-label">Numero</label>
								<input type="number" name="numero" id="numero" class="form-control" required="required"
											 value="{{ old('numero') }}">
								{!! $errors->first('numero', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('annee') ? 'has-danger' : '' }}">
								<label for="annee" class="control-label">Année exp : 2019/2020</label>
								<input type="text" name="annee" id="annee" class="form-control" required="required"
											 value="{{ old('annee') }}">
								{!! $errors->first('annee', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group {{ $errors->has('etudiants') ? 'has-danger' : '' }}">
								<label for="etudiants" class="control-label">Liste des etudiants (Excel : matricule * | nom * | prenom *
									| date_naissance | email) <a id="helpme"><i class="fas fa-info-circle"></i><img id="excel_help"
																																																	src="{{asset('images/other-images/excel_data_example.PNG')}}"></a></label>
								<input type="file" name="etudiants" id="etudiants" class="form-control" required="required"
											 value="{{ old('etudiants') }}">
								{!! $errors->first('etudiants', '<span class="help-block form-control-feedback">:message</span>') !!}
							</div>

							<div class="form-group">
								<button class="btn btn-primary btn-block" type="submit">Ajouter le groupe</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
