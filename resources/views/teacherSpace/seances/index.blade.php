@extends('layouts.master', ['title' => 'Séances'])
@include('layouts/partials/#tableExport')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Mes séances</h4>

					{{-- add seance --}}
					<div>
						<button type="button" class="btn  btn-success btn-block btn-md" data-toggle="modal" data-target="#add-salle">
							<i class="fa fa-plus"></i> Ajouter une séance
						</button>

						{{-- including the add Modal --}}
						@include('adminSpace/salles/modals/addModal')
						<br>
					</div>
					{{-- end add seance --}}

					<table id="example23" class="display nowrap table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Jour</th>
								<th>Heur_debut</th>
								<th>Heur_fin</th>
								<th>Type</th>
								<th>Module</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>Jour</th>
								<th>Heur_debut</th>
								<th>Heur_fin</th>
								<th>Type</th>
								<th>Module</th>
								<th>Actions</th>
							</tr>
						</tfoot>

						<tbody>
							@foreach($seances as $seance)
							<tr>
								<td>{{ $seance->jour }}</td>
								<td>{{ $seance->heur_debut }}</td>
								<td>{{ $seance->heur_fin }}</td>
								<td>{{ $seance->type }}</td>
								<td>{{ $seance->module }}</td>
								<td>
									<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#edit-seance{{$seance->id}}">
										<i class="fa fa-edit"></i>
									</button>
									{{-- including the edit Modal --}}
									{{-- @include('teacherSpace/seances/editModal') --}}


									<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-seance{{$seance->id}}">
										<i class="fa fa-times"></i>
									</button>
									{{-- including the delete Modal --}}
									@include('teacherSpace/seances/_deleteSeanceModal')
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