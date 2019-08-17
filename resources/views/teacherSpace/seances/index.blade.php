@extends('layouts.master', ['title' => 'Séances'])
@include('layouts/partials/#tableExport')
@include('layouts/partials/#chosen')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Mes séances</h4>

					{{-- add seance --}}
					<div>
						<!-- Button trigger modal -->
						<a href="{{ route('seances.create') }}" class="btn  btn-success btn-block btn-md">
							<i class="fa fa-plus"></i> Ajouter une séance
						</a>
						<br/>
					</div>
					{{-- end add seance --}}

					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
						<thead>
							<tr>
								<th>Jour</th>
								<th>Heur_debut</th>
								<th>Heur_fin</th>
								<th>Salle</th>
								<th>Type</th>
								<th>Module</th>
								<th>Groupes</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>Jour</th>
								<th>Heur_debut</th>
								<th>Heur_fin</th>
								<th>Salle</th>
								<th>Type</th>
								<th>Module</th>
								<th>Groupes</th>
								<th>Actions</th>
							</tr>
						</tfoot>

						<tbody>
							@foreach($seances as $seance)
							<tr>
								<td>{{ $seance->jour }}</td>
								<td><center>{{ substr ($seance->heur_debut, 0, 5) }}</center></td>
								<td><center>{{ substr ($seance->heur_fin, 0, 5) }}</center></td>
								<td>{{ $seance->salle->nom }}</td>
								<td>{{ $seance->type }}</td>
								<td>{{ $seance->module }}</td>
								<td><ul>@foreach($seance->groupes as $groupe)<li>{{ $groupe->specialite }} G{{ $groupe->numero }}</li>@endforeach</ul></td>
								<td>
									<a href="{{ route('seances.edit', $seance) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>

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