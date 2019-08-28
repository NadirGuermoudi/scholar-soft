@extends('layouts.master', ['title' => 'Groupes'])
@include('layouts/partials/#tableExport')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Liste des groupes</h4>

	{{-- add groupe --}}
	<div>
		<a href="{{ route('groupes.create') }}" class="btn  btn-success btn-block btn-md">
			<i class="fa fa-plus"></i> Ajouter un groupe
		</a>
		<br/>
	</div>
	{{-- end add groupe --}}

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Année</th>
				<th>Spécialité</th>
				<th>Numero</th>
				<th>Nombre d'étudiants</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Année</th>
				<th>Spécialité</th>
				<th>Numero</th>
				<th>Nombre d'étudiants</th>
				<th>Actions</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($groupes as $groupe)
			<tr>
				<td>{{ $groupe->annee }}</td>
				<td>{{ $groupe->specialite }}</td>
				<td>G{{ $groupe->numero }}</td>
				<td>{{ $groupe->etudiants->count() }}</td>
				<td>
					<a href="{{ route('groupes.show', $groupe) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
					
					<a href="{{ route('groupes.edit', $groupe) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>

					<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-groupe{{$groupe->id}}">
						<i class="fa fa-times"></i>
					</button>
					{{-- including the delete Modal --}}
					@include('adminSpace/groupes/_deleteGroupeModal')
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