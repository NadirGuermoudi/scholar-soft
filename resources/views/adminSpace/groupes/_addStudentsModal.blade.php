<div id="add-students" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel"
		 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myDeleteModalLabel">Suppression</h4>
			</div>
			<form action="{{ route('groupes.addStudents', compact('groupe')) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">

					<div class="form-group {{ $errors->has('etudiants') ? 'has-danger' : '' }}">
						<label for="etudiants" class="control-label">Liste des etudiants (Excel : matricule * | nom * | prenom * |
							date_naissance | email) <a id="helpme"><i class="fas fa-info-circle"></i><img id="excel_help"
																																														src="{{asset('images/other-images/excel_data_example.PNG')}}"></a></label>
						<input type="file" name="etudiants" id="etudiants" class="form-control" required="required"
									 value="{{ old('etudiants') }}">
						{!! $errors->first('etudiants', '<span class="help-block form-control-feedback">:message</span>') !!}
					</div>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary waves-effect">
						Ajouter au groupe
					</button>
					&nbsp;
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
						Annuler
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
