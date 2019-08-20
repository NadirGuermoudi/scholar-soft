<div class="card">
	<div class="card-block">
		<ul class="nav nav-tabs" id="myTab" role="tablist">

			<li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab"
															aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i
							class="ti-home"></i></span> <span class="hidden-xs-down"> Formulaire edition</span></a>
			</li>

		</ul>

		<div class="tab-content tabcontent-border p-20" id="myTabContent">

			<div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">

				<form class="form-horizontal form-material" action="{{ route('encryptors.update', $encryptor->id) }}"
							method="post">
					@method('PUT')
					@csrf


					<div class="form-group col-12">

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="Nom"
										 value="{{$encryptor->nom}}"
										 name="nom">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="Prenom"
										 value="{{$encryptor->prenom}}"
										 name="prenom">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="email" class="form-control" placeholder="Email"
										 value="{{$encryptor->email}}"
										 name="email">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="password" class="form-control" placeholder="nouveau mot de passe"
										 name="password">
						</div>


						<div class="col-md-12 m-b-20">
							<button class="btn btn-success btn-rounded waves-effect waves-light" type="submit">Modifier
								le chiffreur
							</button>
						</div>

					</div>
				</form>

			</div>

		</div>
	</div>
</div>
