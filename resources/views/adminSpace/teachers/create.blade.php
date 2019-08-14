<div class="card">
    <div class="card-block">
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab"
                                    aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i
                                class="ti-home"></i></span> <span class="hidden-xs-down"> Formulaire </span></a>
            </li>

        </ul>

        <div class="tab-content tabcontent-border p-20" id="myTabContent">

            <div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">

                <form class="form-horizontal form-material" action="{{route('teachers.store')}}" method="post">

                    @csrf

                    <div class="form-group col-12">

                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Matricule"
																	 name="matricule" required>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Nom"
																	 name="nom" required>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" placeholder="Prenom"
																	 name="prenom" required>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <input type="email" class="form-control" placeholder="Email"
																	 name="email" required>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <span class="col-md-6">Date Naissance:</span>
                            <input type="date" class="form-control col-md-6" name="date_naissance">
                        </div>

                        <div class="col-md-12 m-b-20">
													<select name="grade" id="grade" class="col-md-12 select2-dropdown text-dark form-control"
																	required>
                                <option value="" disabled selected>Grade</option>
                                <option value="MAA">MAA</option>
                                <option value="MAB">MAB</option>
                                <option value="MCA">MCA</option>
                                <option value="MCB">MCB</option>
                                <option value="Doctorant">Doctorant</option>
                                <option value="Professeur">Professeur</option>
                            </select>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <input type="password" class="form-control" placeholder="Mot de passe"
																	 name="password" required>
                        </div>

                        <div class="col-md-12 m-b-20">
                            <input type="checkbox" class="form-check-input col-md-2" value="Admin" name="admin">
                            <label for="admin" class="form-check-label">Admin</label>
                        </div>


                        <div class="col-md-12 m-b-20">
                            <button class="btn btn-success btn-rounded waves-effect waves-light" type="submit">Ajouter
                                l'enseignant
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
