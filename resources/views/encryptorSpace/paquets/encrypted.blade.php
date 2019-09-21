@extends('layouts.master', ['title' => 'Paquets non pris'])
@include('layouts/partials/#tableExport')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Paquets non pris</h4>

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Date | Type | Module</th>
				<th>date-limite</th>
				<th>Responsable</th>
				<th>Correcteurs</th>
				<th>Copies</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Date | Type | Module</th>
				<th>date-limite</th>
				<th>Responsable</th>
				<th>Correcteurs</th>
				<th>Copies</th>
				<th>Actions</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($paquets as $paquet)
			<tr>
				<td>{{ $paquet->created_at }} <br> {{ $paquet->type }} | {{ $paquet->module }}</td>
				<td>{{ $paquet->date_limite_encryptor }}</td>
				<td>{{ $paquet->responsable->fullName }}</td>
				<td>
					@if($paquet->correcteur1 != null) (1) {{ $paquet->correcteur1->fullName }} <br> @endif
					@if($paquet->correcteur2 != null) (2) {{ $paquet->correcteur2->fullName }} <br> @endif
					@if($paquet->correcteur3 != null) (3) {{ $paquet->correcteur3->fullName }} <br> @endif
				</td>
				<td>{{ $paquet->etudiants()->count() }}</td>

				<td>
					@if(!$paquet->encrypted)
						<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#return-paquet{{$paquet->id}}">
							<i class="fas fa-sign-language"></i>
						</button>
						{{-- including the return Modal --}}
						@include('encryptorSpace/paquets/_returnPaquetModal')
					@endif

					<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#encrypt-paquet{{$paquet->id}}">
						<i class="fa fa-lock"></i>
					</button>
					{{-- including the encrypt paquet Modal --}}
					@include('encryptorSpace/paquets/_encryptPaquetModal')
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