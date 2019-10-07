<div id="mails-teachers" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myMailsTeachersModalLabel">Mails</h4> 
			</div>
			<div class="modal-body">

				<textarea id="teachers" class="form-control" rows="5"></textarea>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary waves-effect" onclick="copyMailsTeachers();">
					Copy 
				</button>
				&nbsp;
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
					Annuler
				</button>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script type="text/javascript">
		function copyMailsTeachers(){
			$("#teachers").select();
			document.execCommand('copy');
			window.getSelection().removeAllRanges();
		}
	</script>
@endpush