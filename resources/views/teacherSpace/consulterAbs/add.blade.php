<div class="card">
	<div class="card-block">
		<ul class="nav nav-tabs" id="myTab" role="tablist">

			<li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab"
															aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i
							class="ti-home"></i></span> <span class="hidden-xs-down"> Ajouter justificatif </span></a>
			</li>

		</ul>

		<div class="tab-content tabcontent-border p-20" id="myTabContent">

			<div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">

				<form class="form-horizontal form-material" action="{{route('consultersabs.ajoutJust')}}"
							enctype="multipart/form-data" method="post">

					@csrf

					<div class="form-group col-12">


						<div class="col-md-12 m-b-20">
							<label class="col-md-12 text-center" style="margin : 15px">Ajouter l'image</label>
							<input type="hidden" name="idE" value="{{$a->etudiant_id}}">
							<input type="hidden" name="idS" value="{{$a->seance_id}}">
							<input type="hidden" name="date" value="{{$a->date}}">
							<input id="img" type="file" class="form-control" name="img">
						</div>

						<div class="col-md-12 m-b-20 text-center">
							<button class="btn btn-success btn-rounded waves-effect waves-light" type="submit">Terminer</button>
						</div>

					</div>
				</form>

			</div>

		</div>
	</div>
</div>
