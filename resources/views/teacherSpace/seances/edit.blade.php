@extends('layouts.master', ['title' => 'Séances'])
@include('layouts/partials/#chosen')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">

	<h4 class="card-title">Modifier la séance ( {{ $seance->type . ' - ' . $seance->module }} )</h4>
	
	<form action="{{ route('seances.update', $seance) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
			<label for="type" class="control-label">Type</label>
			<select name="type" class="chosen-select" style="width: 100%">
				<option value="Cours" {{ ($seance->type == 'Cours') ? 'selected' : '' }}>Cours</option>
				<option value="TD" {{ ($seance->type == 'TD') ? 'selected' : '' }}>TD</option>
				<option value="TP" {{ ($seance->type == 'TP') ? 'selected' : '' }}>TP</option>
			</select>
			{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('module') ? 'has-error' : '' }}">
			<label for="module" class="control-label">Module</label>
			<input type="text" name="module" id="module" class="form-control" required="required" value="{{ $seance->module }}">
			{!! $errors->first('module', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('groupes_ids[]') ? 'has-error' : '' }}">
			<label for="groupes_ids[]" class="control-label">Groupes</label>
			<select name="groupes_ids[]" class="chosen-select" style="width: 100%" multiple>
				@foreach($groupes as $groupe)
				<option value="{{ $groupe->id }}" {{ $seance->groupes()->find($groupe->id) != null ? 'selected' : '' }}>{{ $groupe->specialite }} {{ $groupe->annee }} G{{ $groupe->numero }}</option>
				@endforeach
			</select>
			{!! $errors->first('groupes_ids[]', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('jour') ? 'has-error' : '' }}">
			<label for="jour" class="control-label">Jour</label>
			<select name="jour" class="chosen-select">
				<option value="DIMANCHE" {{ ($seance->jour == 'DIMANCHE') ? 'selected' : '' }} >DIMANCHE</option>
				<option value="LUNDI" {{ ($seance->jour == 'LUNDI') ? 'selected' : '' }}>LUNDI</option>
				<option value="MARDI" {{ ($seance->jour == 'MARDI') ? 'selected' : '' }}>MARDI</option>
				<option value="MERCREDI" {{ ($seance->jour == 'MERCREDI') ? 'selected' : '' }}>MERCREDI</option>
				<option value="JEUDI" {{ ($seance->jour == 'JEUDI') ? 'selected' : '' }}>JEUDI</option>
				<option value="VENDREDI" {{ ($seance->jour == 'VENDREDI') ? 'selected' : '' }}>VENDREDI</option>
				<option value="SAMEDI" {{ ($seance->jour == 'SAMEDI') ? 'selected' : '' }}>SAMEDI</option>
			</select>
			{!! $errors->first('jour', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('heur_debut') ? 'has-error' : '' }}">
			<label for="heur_debut" class="control-label">Heur_debut</label>
			<input type="time" name="heur_debut" id="heur_debut" class="form-control" required="required" value="{{ substr ($seance->heur_debut, 0, 5) }}">
			{!! $errors->first('heur_debut', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('heur_fin') ? 'has-error' : '' }}">
			<label for="heur_fin" class="control-label">Heur_fin</label>
			<input type="time" name="heur_fin" id="heur_fin" class="form-control" required="required" value="{{ substr ($seance->heur_fin, 0, 5) }}">
			{!! $errors->first('heur_fin', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('salle_id') ? 'has-error' : '' }}">
			<label for="salle_id" class="control-label">Salle</label>
			<select name="salle_id" class="chosen-select" style="width: 100%">
				<option value="{{ $seance->salle->id }}">{{ $seance->salle->nom }}</option>
				@foreach($salles as $salle)
					@if($seance->salle->id != $salle->id)
					<option value="{{ $salle->id }}">{{ $salle->nom }}</option>
					@endif
				@endforeach
			</select>
			{!! $errors->first('salle_id', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('once_two_week') ? 'has-error' : '' }}">
			<input type="checkbox" name="once_two_week" id="once_two_week" value="once_two_week" {{ $seance->once_two_week == true ? 'checked' : '' }}>
			<label for="once_two_week" class="control-label">Une fois par quinzaine </label>
			{!! $errors->first('once_two_week', '<span class="help-block">:message</span>') !!}
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Modifier la séance</button>
		</div>

	</form>

</div>
</div>
</div>
</div>
</div>

@endsection