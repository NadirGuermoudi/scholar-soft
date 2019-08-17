@extends('layouts.master', ['title' => 'Chiffreurs'])
@include('layouts/partials/#tableExport')
@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">

						<h4 class="card-title">
							Liste des chiffreurs
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
									<th>Prenom</th>
									<th>email</th>
									<th>Action</th>
								</tr>
								</thead>
								<tfoot>
								<tr>
									<div>
										<button type="button" class="btn  btn-success btn-block btn-md"
														data-toggle="modal" data-target="#add-encryptor">
											<i class="fa fa-plus">
												Ajouter un chiffreur
											</i>
										</button>

										{{-- including the add Modal --}}
										@include('adminSpace/encryptors/modals/addModal')

										<br>


									</div>
								</tr>
								<tr>
									<th>Nom</th>
									<th>Prenom</th>
									<th>email</th>
									<th>Action</th>
								</tr>

								</tfoot>
								<tbody>
								@foreach($encryptors as $encryptor)
									<tr>

										<td>
											{{$encryptor->nom}}
										</td>

										<td>
											{{$encryptor->prenom}}
										</td>


										<td>
											{{$encryptor->email}}
										</td>

										<td>


											<button type="button" class="btn btn-outline-info" data-toggle="modal"
															data-target="#edit-encryptor{{$encryptor->id}}">
												<i class="fa fa-edit">
												</i>
											</button>
											{{--											 including the edit Modal --}}
											@include('adminSpace/encryptors/modals/editModal')


											<button type="button" class="btn btn-outline-danger" data-toggle="modal"
															data-target="#delete-encryptor{{$encryptor->id}}">
												<i class="fa fa-times">
												</i>
											</button>
											@include('adminSpace/encryptors/modals/deleteModal')
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