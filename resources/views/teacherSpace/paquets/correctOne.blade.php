@extends('layouts.master', ['title' => 'Correction d\'un paquet'])
@include('layouts/partials/#tableExport')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Correction du paquet : {{ $paquet->type }} | {{ $paquet->module }}</h4>

	{{-- return paquet --}}
	<div>
		<button type="button" class="btn btn-warning btn-block btn-md" data-toggle="modal" data-target="#return-paquet{{$paquet->id}}">
			<i class="fas fa-sign-language fa-lg"></i> Rendre le paquet 
		</button>
		{{-- including the return Modal --}}
		@include('teacherSpace/paquets/_returnPaquetModal', ['correcteur' => $correcteur])
		<br/>
	</div>
	{{-- end return paquet --}}

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Code</th>
				<th>Note</th>
				{{-- <th>Actions</th> --}}
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Code</th>
				<th>Note</th>
				{{-- <th>Actions</th> --}}
			</tr>
		</tfoot>

		<tbody>
			@foreach($etudiants as $etudiant)
			<tr>
				<td><center>{{ str_pad($etudiant->pivot->code, 3, '0', STR_PAD_LEFT) }}</center></td>
				<td>
					<center>
					<input type="number" class="form-control" style="width: 100px;" id="{{ $etudiant->pivot->code }}" data-paquet="{{ $paquet->id }}" data-correcteur="{{ $correcteur }}" name="" step="0.01" onchange="affectation(this);" value="{{ $correcteur == 1 ? $etudiant->pivot->note1 : ($correcteur == 2 ? $etudiant->pivot->note2 : ($correcteur == 3 ? $etudiant->pivot->note3 :'')) }}">
					<i id="success{{ $etudiant->pivot->code }}" class="fas fa-check-circle text-success" style="display: none;"></i>
					<i id="warning{{ $etudiant->pivot->code }}" class="fas fa-sync-alt text-warning" style="display: none;"></i>
					<i id="danger{{ $etudiant->pivot->code }}" class="fa fa-times text-danger" style="display: none;"></i>
					</center>
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

@push('scripts')
<script type="text/javascript">

	var url = '{{ route('paquets.correct.one.copy') }}';
	
	function affectation(code){
		$('#success'+code.id).hide();
		$('#danger'+code.id).hide();
		$('#warning'+code.id).show();
		
		$.ajax({
			url: url,
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			data: {
				// Any data you want to post here
				'code': code.id,
				'paquet': code.getAttribute('data-paquet'),
				'correcteur': code.getAttribute('data-correcteur'),
				'note': code.value
			},
			success:function(data){
				if(data == 1){
					$('#success'+code.id).show();
					$('#warning'+code.id).hide();
				}else{
					$('#danger'+code.id).show();
					$('#warning'+code.id).hide();
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				$('#danger'+code.id).show();
				$('#warning'+code.id).hide();
			}
		});
	}

</script>
@endpush