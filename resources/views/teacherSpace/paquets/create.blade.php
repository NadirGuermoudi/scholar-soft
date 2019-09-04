@extends('layouts.master', ['title' => 'Créer un paquet'])
@include('layouts/partials/#chosen')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">

	<h4 class="card-title">Ajouter un paquet</h4>
	
	<form action="{{ route('paquets.store') }}" method="POST">
		@csrf

		<div class="form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
			<label for="type" class="control-label">Type</label>
			<select name="type" class="chosen-select" style="width: 100%">
				<option value="EXAM">Examen</option>
				<option value="CC">Control continu</option>
			</select>
			{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('module') ? 'has-danger' : '' }}">
			<label for="module" class="control-label">Module</label>
			<input type="text" name="module" id="module" class="form-control" required="required" value="{{ old('module') }}">
			{!! $errors->first('module', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('groupe_id') ? 'has-danger' : '' }}">
			<label for="groupe_id" class="control-label">Groupes</label>
			<select name="groupe_id" class="chosen-select" style="width: 100%">
				@foreach($groupes as $groupe)
				<option value="{{ $groupe->id }}">{{ $groupe->specialite }} {{ $groupe->annee }} G{{ $groupe->numero }}</option>
				@endforeach
			</select>
			{!! $errors->first('groupe_id', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="row">
			<div class="form-group {{ $errors->has('type_calcul') ? 'has-danger' : '' }} col-md-6">
				<label for="type_calcul" class="control-label">type_calcul</label>
				<select name="type_calcul" class="chosen-select" style="width: 100%">
					<option value="MAX">Maximum(corr1, corr2)</option>
					<option value="MOY">Moyenne(corr1, corr2)</option>
				</select>
				{!! $errors->first('type_calcul', '<span class="help-block">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('difference') ? 'has-danger' : '' }} col-md-6">
				<label for="difference" class="control-label">Difference entre corr1 et corr2 pour passer au 3eme</label>
				<input type="number" name="difference" id="difference" class="form-control" required value="{{ old('difference') ?? '2' }}">
				{!! $errors->first('difference', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->has('date_limite_encryptor') ? 'has-danger' : '' }}">
			<label for="date_limite_encryptor" class="control-label">Date limite chiffreur</label>
			<input type="date" name="date_limite_encryptor" id="date_limite_encryptor" class="form-control" required value="{{ old('date_limite_encryptor') }}">
			{!! $errors->first('date_limite_encryptor', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="row">
			<div class="form-group {{ $errors->has('correcteur1_id') ? 'has-danger' : '' }} col-md-6">
				<label for="correcteur1_id" class="control-label">Correcteur 1</label>
				<select name="correcteur1_id" class="chosen-select" style="width: 100%">
					@foreach($enseignants as $enseignant)
					<option value="{{ $enseignant->id }}">{{ $enseignant->fullName }}</option>
					@endforeach
				</select>
				{!! $errors->first('correcteur1_id', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('date_limite_correcteur1') ? 'has-danger' : '' }} col-md-6">
				<label for="date_limite_correcteur1" class="control-label">Date limite correcteur 1</label>
				<input type="date" name="date_limite_correcteur1" id="date_limite_correcteur1" class="form-control" required="required" value="{{ old('date_limite_correcteur1') }}">
				{!! $errors->first('date_limite_correcteur1', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>
		</div>

		<div class="row">
			<div class="form-group {{ $errors->has('correcteur2_id') ? 'has-danger' : '' }} col-md-6">
				<label for="correcteur2_id" class="control-label">Correcteur 2</label>
				<select name="correcteur2_id" class="chosen-select" style="width: 100%">
					<option value="0">Aucun</option>
					@foreach($enseignants as $enseignant)
					<option value="{{ $enseignant->id }}">{{ $enseignant->fullName }}</option>
					@endforeach
				</select>
				{!! $errors->first('correcteur2_id', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('date_limite_correcteur2') ? 'has-danger' : '' }} col-md-6">
				<label for="date_limite_correcteur2" class="control-label">Date limite correcteur 2</label>
				<input type="date" name="date_limite_correcteur2" id="date_limite_correcteur2" class="form-control" value="{{ old('date_limite_correcteur2') }}">
				{!! $errors->first('date_limite_correcteur2', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>
		</div>

		<div class="row">
			<div class="form-group {{ $errors->has('correcteur3_id') ? 'has-danger' : '' }} col-md-6">
				<label for="correcteur3_id" class="control-label">Correcteur 3</label>
				<select name="correcteur3_id" class="chosen-select" style="width: 100%">
					<option value="0">Aucun</option>
					@foreach($enseignants as $enseignant)
					<option value="{{ $enseignant->id }}">{{ $enseignant->fullName }}</option>
					@endforeach
				</select>
				{!! $errors->first('correcteur3_id', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('date_limite_correcteur3') ? 'has-danger' : '' }} col-md-6">
				<label for="date_limite_correcteur3" class="control-label">Date limite correcteur 3</label>
				<input type="date" name="date_limite_correcteur3" id="date_limite_correcteur3" class="form-control" value="{{ old('date_limite_correcteur3') }}">
				{!! $errors->first('date_limite_correcteur3', '<span class="help-block form-control-feedback">:message</span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->has('responsable_rendu') ? 'has-danger' : '' }}">
			<input type="checkbox" name="responsable_rendu" id="responsable_rendu" value="responsable_rendu">
			<label for="responsable_rendu" class="control-label">Le paquet se trouve deja au département </label>
			{!! $errors->first('responsable_rendu', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Ajouter le paquet</button>
		</div>

	</form>

</div>
</div>
</div>
</div>
</div>

@endsection