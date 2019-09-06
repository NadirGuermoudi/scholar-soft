@extends('layouts.master', ['title' => 'Salle'])
@include('layouts/partials/#tableExport')

@section('content')

	<div class="container-fluid">

		<div class="row">

            <div class="col-12">

				<div class="card">

                    <div class="card-block">

						<h4 class="card-title">
							Liste des salles
						</h4>

											<h6 class="card-subtitle">
							Exporter les données en Copy, CSV, Excel, PDF ou Imprimer
						</h6>

											<div class="table-responsive m-t-40">

												<table id="example23" class="display nowrap table table-hover table-striped table-bordered"
															 cellspacing="0" width="100%">
								<thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Capacité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <div>
                                          	<button type="button" class="btn  btn-success btn-block btn-md" data-toggle="modal" data-target="#add-salle" >
																							<i class="fas fa-plus">
                                          	 </i>
                                              Ajouter une salle
											                       </button>

																					{{-- including the add Modal --}}
											@include('adminSpace/salles/modals/addModal')

																					<br>


																				</div>
                                    </tr>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Capacité</th>
                                        <th>Action</th>
                                    </tr>

																</tfoot>
                                    <tbody>
                                    	@foreach($salles as $salle)
                                      	<tr>
																					<td>
																						{{$salle->nom}}
                                       		</td>

                                       		<td>
                                       			{{$salle->capacite}}
                                       		</td>

                                       		<td>

                                        		<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#edit-salle{{$salle->id}}">
                                        			<i class="fa fa-edit">
                                        			</i>
                                        		</button>
                                        		{{-- including the edit Modal --}}
                                        		@include('adminSpace/salles/modals/editModal')

                                        		<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-salle{{$salle->id}}">
                                        			<i class="fa fa-times">
                                        			</i>
                                        		</button>
                                        		{{-- including the delete Modal --}}
                                        		@include('adminSpace/salles/modals/deleteModal')





																						{{--
												we don't need eye here
																						<a href="" class="btn text-dark">
																							<i class="fa fa-eye">
																							</i>
																						</a> --}}

                                        	</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   	</div>

@endsection
