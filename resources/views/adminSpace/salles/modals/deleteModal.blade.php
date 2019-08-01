<div id="delete-salle{{$salle->id}}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myDeleteModalLabel">Suppression</h4> 
			</div>
			<div class="modal-body">


			<p style="color:white;">
				Êtes-vous sûre de vouloir supprimer la salle {{$salle->nom}} ?
			</p>

{{-- 					
we don't need a delete page, the modal is enough
@include('adminSpace/salles/delete')
 --}}


			</div>
	                                        
			<div class="modal-footer">
				
				<form class="form-inline" action="{{ route('salles.destroy', $salle->id) }}"  method="POST">
					
					@method('DELETE')
					@csrf

					<button type="submit" class="btn btn-default waves-effect">
						Oui
					</button>

					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
						Annuler
					</button>

				</form>

			</div>

		</div>

	</div>

</div>
