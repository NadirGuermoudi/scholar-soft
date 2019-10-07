<div id="delete-enseignant{{$a->date}}" class="modal fade in" tabindex="-1" role="dialog"
		 aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myDeleteModalLabel">Suppression</h4>
			</div>
			<div class="modal-body">


				<p style="color:white;">
					Êtes-vous sûre de vouloir supprimer le justificatifs ?
				</p>

			</div>

			<div class="modal-footer">

				<form class="form-inline" action="{{route('consultersabs.suppJust')}}" method="POST">
					@csrf
					<input type="hidden" name="idE" value="{{$a->etudiant_id}}">
					<input type="hidden" name="idS" value="{{$a->seance_id}}">
					<input type="hidden" name="date" value="{{$a->date}}">
					<button type="submit" class="btn btn-danger waves-effect">
						Oui
					</button>
					&nbsp;
					<button type="button" class="btn btn-defaut waves-effect" data-dismiss="modal">
						Annuler
					</button>

				</form>

			</div>

		</div>

	</div>

</div>
