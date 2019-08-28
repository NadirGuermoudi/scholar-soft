@extends('layouts.master', ['title' => $groupe->fullName])
@include('layouts/partials/#tableExport')

@push('styles')
	<style type="text/css">
		#excel_help {
			display: none;
		}
		#helpme:hover>#excel_help{
			display: block;
		}
	</style>
@endpush

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Groupe détails</h4>

	<div>
		<center>
			<h1>{{ $groupe->fullName }}</h1>
		</center>
	</div>

	{{-- add students to the groupe --}}
	<button type="button" class="btn  btn-success btn-block btn-md" data-toggle="modal" data-target="#add-students">
		<i class="fa fa-plus"></i> Ajouter un ou plusieurs etudiants via un fichier excel <i class="fas fa-file-excel"></i>
	</button>
	{{-- including the delete Modal --}}
	@include('adminSpace/groupes/_addStudentsModal')
	{{-- end add students --}}
	<hr>

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Matricule</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>date_naissance</th>
				<th>email</th>
				<th>TMP password</th>
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
				<th>TMP password</th>
				<th>Actions</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($etudiants as $etudiant)
			<tr>
				<td>{{ $etudiant->matricule }}</td>
				<td>{{ $etudiant->nom }}</td>
				<td>{{ $etudiant->prenom }}</td>
				<td>{{ $etudiant->date_naissance }}</td>
				<td>{{ $etudiant->email }}</td>
				<td>{{ substr(md5($etudiant->nom . $etudiant->matricule . $etudiant->prenom), 5, 10) }}</td>
				<td>
					<a href="{{ route('groupes.addStudent', compact('groupe','etudiant')) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i></a>
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