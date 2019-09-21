<div id="encrypt-paquet{{$paquet->id}}" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myDeleteModalLabel">Rendre</h4> 
			</div>
			<div class="modal-body">


				<p style="color:white;">
					Êtes-vous sûre que vous vouller prendre le paquet et le codée {{ $paquet->type }} | {{ $paquet->module }} ?
				</p>

			</div>
			<div class="modal-footer">
				<a class="btn btn-success waves-effect" href="{{ route('encrypt-paquet.encrypt', $paquet->id) }}">Prendre et codée</a>
				&nbsp;
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
					Annuler
				</button>
			</div>
		</div>
	</div>
</div>