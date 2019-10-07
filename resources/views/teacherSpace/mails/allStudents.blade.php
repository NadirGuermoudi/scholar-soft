@extends('layouts.master', ['title' => 'Mails'])
@include('layouts/partials/#tableExport')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Liste des mails (Etudiants)</h4>

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Nom et prenom</th>
				<th>email</th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Nom et prenom</th>
				<th>email</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($etudiants as $etudiant)
			<tr>
				<td>{{ $etudiant->fullName }}</td>
				<td>{{ $etudiant->email }}</td>
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