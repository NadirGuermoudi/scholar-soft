@extends('layouts.master', ['title' => 'Mails'])
@include('layouts/partials/#tableExport')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">
	<h4 class="card-title">Liste des groupes</h4>

	{{-- add groupe --}}
	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('teacher.mails.all.students') }}" class="btn  btn-info btn-block btn-md">
				<i class="fas fa-envelope"></i> Mails de tous les Etudiants
			</a>
			<br/>
		</div>

		<div class="col-md-6">
			<a href="{{ route('teacher.mails.all.teachers') }}" class="btn  btn-info btn-block btn-md">
				<i class="fas fa-envelope"></i> Mails de tous les Enseignants
			</a>
			<br/>
		</div>
	</div>
	{{-- end add groupe --}}

	<table id="example23" class="display nowrap table table-hover table-striped table-bordered" style="width: 100%;">
		<thead>
			<tr>
				<th>Groupe</th>
				<th>Nombre d'étudiants</th>
				<th>Enseignants</th>
				<th>Etudiants</th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th>Groupe</th>
				<th>Nombre d'étudiants</th>
				<th>Enseignants</th>
				<th>Etudiants</th>
			</tr>
		</tfoot>

		<tbody>
			@foreach($groupes as $groupe)
			<tr>
				<td>{{ $groupe->fullName }}</td>
				<td>{{ $groupe->etudiants->count() }}</td>
				<td>
					<button type="button" onclick="getMailsTeachers({{$groupe->id}});" class="btn btn-outline-info" data-toggle="modal" data-target="#mails-teachers">
						<i class="fas fa-envelope"></i>
					</button>
				</td>
				<td>
					<button type="button" onclick="getMailsStudents({{$groupe->id}});" class="btn btn-outline-info" data-toggle="modal" data-target="#mails-students">
						<i class="fas fa-envelope"></i>
					</button>
				</td>
			</tr>
			@endforeach

			{{-- including the teachers mails Modal --}}
			@include('teacherSpace/mails/_mailsTeachersModal')

			{{-- including the students mails Modal --}}
			@include('teacherSpace/mails/_mailsStudentsModal')
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

	var url = '{{ route('teacher.mails.teachers') }}';
	var url2 = '{{ route('teacher.mails.students') }}';

	$('#students').val("salam");
	$('#teachers').val("salam");
	
	function getMailsTeachers(groupe){
		$.ajax({
			url: url,
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			data: {
				// Any data you want to post here
				'groupe': groupe,
			},
			success:function(data){
				console.log(data);
				$('#teachers').val(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
			}
		});
	}

	function getMailsStudents(groupe){
		$.ajax({
			url: url2,
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			data: {
				// Any data you want to post here
				'groupe': groupe,
			},
			success:function(data){
				console.log(data);
				$('#students').val(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
			}
		});
	}

</script>
@endpush