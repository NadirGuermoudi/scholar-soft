@extends('layouts.master', ['title' => 'Codée un paquet'])
@include('layouts/partials/#tableExport')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Codée le paquet :</h4>

	<div>
		<center>
			<h1>{{ $paquet->type }} | {{ $paquet->module }}</h1>
		</center>
	</div>

	{{-- return paquet --}}
	@if(!$paquet->encrypted)
	<div>
		<button type="button" class="btn btn-warning btn-block btn-md" data-toggle="modal" data-target="#return-paquet{{$paquet->id}}">
			<i class="fas fa-sign-language fa-lg"></i> Rendre le paquet 
		</button>
		{{-- including the return Modal --}}
		@include('encryptorSpace/paquets/_returnPaquetModal')
		<br/>
	</div>
	@endif
	{{-- end return paquet --}}

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Matricule</th>
				<th>Nom et prenom</th>
				<th>Date-naissance</th>
				<th>Code</th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Matricule</th>
				<th>Nom et prenom</th>
				<th>Date-naissance</th>
				<th>Code</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($paquet->etudiants()->get() as $etudiant)
			<tr>
				<td>{{ $etudiant->matricule }}</td>
				<td>{{ $etudiant->fullName }}</td>
				<td>{{ $etudiant->date_naissance }}</td>
				<td><center>{{ $etudiant->pivot->code }}</center></td>
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