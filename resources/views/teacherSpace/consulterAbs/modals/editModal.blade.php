<div id="edit-enseignant{{$a->date}}" class="modal fade in" tabindex="-1" role="dialog"
		 aria-labelledby="myModalLabel"
		 aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">justificatif</h4>
            </div>
            <div class="modal-body">


							@include('teacherSpace/consulterAbs/edit')


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel
                </button>
            </div>

        </div>

    </div>

</div>
