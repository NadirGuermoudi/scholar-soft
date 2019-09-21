<div id="hold-paquet{{$paquet->id}}" class="modal fade in" tabindex="-1" role="dialog"
		 aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myDeleteModalLabel">Rendre</h4>
			</div>
			<div class="modal-body">


				<p style="color:white;">
					Êtes-vous sûre que vous vouller prendre le paquet {{ $paquet->type }} | {{ $paquet->module }} ?
				</p>

			</div>
			<div class="modal-footer">
				<form class="form-inline" action="{{ route('encrypt-paquet.hold', $paquet->id) }}" method="POST">
					@method('PUT')
					@csrf
					<button type="submit" class="btn btn-success waves-effect">
						Prendre
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
