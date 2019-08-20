@extends('layouts.master', ['title' => 'Séances'])
@include('layouts/partials/#chosen')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">

	<h4 class="card-title">Ajouter une séance</h4>
	
	<form action="{{ route('seances.store') }}" method="POST">
		@csrf

		<div class="form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
			<label for="type" class="control-label">Type</label>
			<select name="type" class="chosen-select" style="width: 100%">
				<option value="Cours">Cours</option>
				<option value="TD">TD</option>
				<option value="TP">TP</option>
			</select>
			{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('module') ? 'has-danger' : '' }}">
			<label for="module" class="control-label">Module</label>
			<input type="text" name="module" id="module" class="form-control" required="required" value="{{ old('module') }}">
			{!! $errors->first('module', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('groupes_ids[]') ? 'has-danger' : '' }}">
			<label for="groupes_ids[]" class="control-label">Groupes</label>
			<select name="groupes_ids[]" class="chosen-select" style="width: 100%" multiple>
				@foreach($groupes as $groupe)
				<option value="{{ $groupe->id }}">{{ $groupe->specialite }} {{ $groupe->annee }} G{{ $groupe->numero }}</option>
				@endforeach
			</select>
			{!! $errors->first('groupes_ids', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('jour') ? 'has-danger' : '' }}">
			<label for="jour" class="control-label">Jour</label>
			<select name="jour" class="chosen-select">
				<option value="DIMANCHE">DIMANCHE</option>
				<option value="LUNDI">LUNDI</option>
				<option value="MARDI">MARDI</option>
				<option value="MERCREDI">MERCREDI</option>
				<option value="JEUDI">JEUDI</option>
				<option value="VENDREDI">VENDREDI</option>
				<option value="SAMEDI">SAMEDI</option>
			</select>
			{!! $errors->first('jour', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('heur_debut') ? 'has-danger' : '' }}">
			<label for="heur_debut" class="control-label">Heur_debut</label>
			<input type="time" name="heur_debut" id="heur_debut" class="form-control" required="required" value="{{ old('heur_debut') }}">
			{!! $errors->first('heur_debut', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('heur_fin') ? 'has-danger' : '' }}">
			<label for="heur_fin" class="control-label">Heur_fin</label>
			<input type="time" name="heur_fin" id="heur_fin" class="form-control" required="required" value="{{ old('heur_fin') }}">
			{!! $errors->first('heur_fin', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('salle_id') ? 'has-danger' : '' }}">
			<label for="salle_id" class="control-label">Salle</label>
			<select name="salle_id" class="chosen-select" style="width: 100%">
				@foreach($salles as $salle)
				<option value="{{ $salle->id }}">{{ $salle->nom }}</option>
				@endforeach
			</select>
			{!! $errors->first('salle_id', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('once_two_week') ? 'has-danger' : '' }}">
			<input type="checkbox" name="once_two_week" id="once_two_week" value="once_two_week">
			<label for="once_two_week" class="control-label">Une fois par quinzaine </label>
			{!! $errors->first('once_two_week', '<span class="help-block form-control-feedback">:message</span>') !!}
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Ajouter la séance</button>
		</div>

	</form>

</div>
</div>
</div>
</div>
</div>

@endsection