@extends('layouts.master', ['title' => 'Etudiants'])
@include('layouts/partials/#tableExport')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Liste des étudiants</h4>

						{{-- add seance --}}
						<div>
							<!-- Button trigger modal -->
							<a href="{{ route('etudiants.create') }}" class="btn  btn-success btn-block btn-md">
								<i class="fa fa-plus"></i> Ajouter un étudiant
							</a>
							<br/>
						</div>
						{{-- end add seance --}}

						<table id="example23" class="display nowrap table table-hover table-striped table-bordered"
									 style="width: 100%;">
							<thead>
							<tr>
								<th>Matricule</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>date_naissance</th>
								<th>email</th>
								<th>Actions</th>
							</tr>
							</thead>

							<tfoot>
							<tr>
								<th>Matricule</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>date_naissance</th>
								<th>email</th>
								<th>Actions</th>
							</tr>
							</tfoot>

							<tbody>
							@foreach($etudiants as $etudiant)
								<tr>
									<td>{{ $etudiant->matricule }}</td>
									<td>{{ $etudiant->nom }}</td>
									<td>{{ $etudiant->prenom }}</td>
									<td>{{ date_format(date_create($etudiant->date_naissance), 'd-m-Y') }}</td>
									<td>{{ $etudiant->email }}</td>
									<td>
										<a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-outline-info"><i
												class="fa fa-edit"></i></a>

										<button type="button" class="btn btn-outline-danger" data-toggle="modal"
														data-target="#delete-student{{$etudiant->id}}">
											<i class="fa fa-times"></i>
										</button>
										{{-- including the delete Modal --}}
										@include('adminSpace/students/_deleteStudentModal')
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

@endsection
