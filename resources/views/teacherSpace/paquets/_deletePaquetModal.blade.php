<div id="delete-paquet{{$paquet->id}}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myDeleteModalLabel">Suppression</h4> 
			</div>
			<div class="modal-body">


				<p style="color:white;">
					Êtes-vous sûre de vouloir supprimer le paquet {{ $paquet->type }} | {{ $paquet->module }} ?
				</p>

			</div>
			<div class="modal-footer">
				<form class="form-inline" action="{{ route('paquets.destroy', $paquet->id) }}"  method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-danger waves-effect">
						Oui 
					</button>
					&nbsp;
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
						Annuler
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
