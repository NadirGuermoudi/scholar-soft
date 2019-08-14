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

				<form class="form-horizontal form-material" action="{{ route('teachers.update', $enseignant->id) }}"
							method="post">
					@method('PUT')
					@csrf


					<div class="form-group col-12">

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="Matricule"
										 value="{{$enseignant->matricule}}"
										 name="matricule">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="Nom"
										 value="{{$enseignant->nom}}"
										 name="nom">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="Prenom"
										 value="{{$enseignant->prenom}}"
										 name="prenom">
						</div>

						<div class="col-md-12 m-b-20">
							<input type="email" class="form-control" placeholder="Email"
										 value="{{$enseignant->email}}"
										 name="email">
						</div>

						<div class="col-md-12 m-b-20">
							<span class="col-md-6">Date Naissance:</span>
							<input type="date" class="form-control col-md-6"
										 value="{{$enseignant->date_naissance}}"
										 name="date_naissance">
						</div>

						<div class="col-md-12 m-b-20">
							<select name="grade" id="grade" class="col-md-12 select2-dropdown text-dark form-control">
								@switch($enseignant->grade)
									@case("MAA")
									<option value="MAA" selected>MAA</option>
									<option value="MAB">MAB</option>
									<option value="MCA">MCA</option>
									<option value="MCB">MCB</option>
									<option value="Doctorant">Doctorant</option>
									<option value="Professeur">Professeur</option>
									@break
									@case("MAB")
									<option value="MAA">MAA</option>
									<option value="MAB" selected>MAB</option>
									<option value="MCA">MCA</option>
									<option value="MCB">MCB</option>
									<option value="Doctorant">Doctorant</option>
									<option value="Professeur">Professeur</option>
									@break
									@case("MCA")
									<option value="MAA">MAA</option>
									<option value="MAB">MAB</option>
									<option value="MCA" selected>MCA</option>
									<option value="MCB">MCB</option>
									<option value="Doctorant">Doctorant</option>
									<option value="Professeur">Professeur</option>
									@break
									@case("MCB")
									<option value="MAA">MAA</option>
									<option value="MAB">MAB</option>
									<option value="MCA">MCA</option>
									<option value="MCB" selected>MCB</option>
									<option value="Doctorant">Doctorant</option>
									<option value="Professeur">Professeur</option>
									@break
									@case("Doctorant")
									<option value="MAA">MAA</option>
									<option value="MAB">MAB</option>
									<option value="MCA">MCA</option>
									<option value="MCB">MCB</option>
									<option value="Doctorant" selected>Doctorant</option>
									<option value="Professeur">Professeur</option>
									@break
									@case("Professeur" )
									<option value="MAA">MAA</option>
									<option value="MAB">MAB</option>
									<option value="MCA">MCA</option>
									<option value="MCB">MCB</option>
									<option value="Doctorant">Doctorant</option>
									<option value="Professeur" selected>Professeur</option>
									@break
								@endswitch
							</select>
						</div>

						<div class="col-md-12 m-b-20">
							<input type="password" class="form-control" placeholder="nouveau mot de passe"
										 name="password">
						</div>

						<div class="col-md-12 m-b-20">
							@if($enseignant->admin)
								<input type="checkbox" checked class="form-check-input col-md-2" value="Admin"
											 name="admin">
								<label for="admin" class="form-check-label">Admin</label>
							@else
								<input type="checkbox" class="form-check-input col-md-2" value="Admin" name="admin">
								<label for="admin" class="form-check-label">Admin</label>
							@endif
						</div>


						<div class="col-md-12 m-b-20">
							<button class="btn btn-success btn-rounded waves-effect waves-light" type="submit">Modifier
								l'enseignant
							</button>
						</div>

					</div>
				</form>

			</div>

		</div>
	</div>
</div>
