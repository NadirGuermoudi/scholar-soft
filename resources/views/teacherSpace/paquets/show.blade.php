@extends('layouts.master', ['title' => 'Notes d\'un paquet '])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Notes du paquet {{ $paquet->type }} | {{ $paquet->module }}</h4>

						<table id="example23" class="display nowrap table table-hover table-striped table-bordered"
									 style="width: 100%;">
							<thead>
							<tr>
								<th>Matricule</th>
								<th>Nom Prenom</th>
								<th>Date-naissance</th>
								<th>Note</th>
							</tr>
							</thead>

							<tfoot>
							<tr>
								<th>Matricule</th>
								<th>Nom Prenom</th>
								<th>Date-naissance</th>
								<th>Note</th>
							</tr>
							</tfoot>

							<tbody>
							@foreach($paquet->etudiants as $etudiant)
								<tr>
									<td>{{ $etudiant->matricule }}</td>
									<td>{{ $etudiant->fullName }}</td>
									<td>{{ $etudiant->date_naissance }}</td>
									<td>
										<center>{{ $etudiant->pivot->note }}</center>
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
