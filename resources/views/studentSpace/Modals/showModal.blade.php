<div id="show-seance{{$absence->seance->id}}" class="w-100 modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">détails de la séance ratée</h4> 
			</div>
			<div class="modal-body">


			@include('studentSpace/voirAbsences/details')



			</div>
	                                        
			<div class="modal-footer">	

				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
					Annuler
				</button>

			</div>

		</div>

	</div>

</div>
