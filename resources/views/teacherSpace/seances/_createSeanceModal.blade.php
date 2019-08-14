<!-- Modal -->
<div class="modal fade" id="add-seance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Séance</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="{{-- {{ route('contact_path') }} --}}" method="POST">
					@csrf

					<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
						<label for="type" class="control-label">Type</label>
						<select name="type" class="chosen-select" style="width: 100%">
							<option value="Cours">Cours</option>
							<option value="TD">TD</option>
							<option value="TP">TP</option>
						</select>
						{!! $errors->first('type', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('module') ? 'has-error' : '' }}">
						<label for="module" class="control-label">Module</label>
						<input type="text" name="module" id="module" class="form-control" required="required" value="{{ old('module') }}">
						{!! $errors->first('module', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('jour') ? 'has-error' : '' }}">
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
						{!! $errors->first('jour', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('heur_debut') ? 'has-error' : '' }}">
						<label for="heur_debut" class="control-label">Heur_debut</label>
						<input type="time" name="heur_debut" id="heur_debut" class="form-control" required="required" value="{{ old('heur_debut') }}">
						{!! $errors->first('heur_debut', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('heur_fin') ? 'has-error' : '' }}">
						<label for="heur_fin" class="control-label">Heur_fin</label>
						<input type="time" name="heur_fin" id="heur_fin" class="form-control" required="required" value="{{ old('heur_fin') }}">
						{!! $errors->first('heur_fin', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('salle_id') ? 'has-error' : '' }}">
						<label for="salle_id" class="control-label">Salle</label>
						<select name="salle_id" class="chosen-select" style="width: 100%">
							@foreach($salles as $salle)
								<option value="{{ $salle->id }}">{{ $salle->nom }}</option>
							@endforeach
						</select>
						{!! $errors->first('salle_id', '<span class="help-block">:message</span>') !!}
					</div>

					<div class="form-group {{ $errors->has('once_two_week') ? 'has-error' : '' }}">
						<label for="once_two_week" class="control-label">Une fois par quinzaine </label>
						<input type="checkbox" name="once_two_week" id="once_two_week" class="" required="required" value="{{ old('once_two_week') }}">
						{!! $errors->first('once_two_week', '<span class="help-block">:message</span>') !!}
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save Séance</button>
			</div>
		</div>
	</div>
</div>