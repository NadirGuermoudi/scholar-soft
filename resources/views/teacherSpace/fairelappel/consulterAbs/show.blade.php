@extends('layouts.master', ['title' => "consulter les absences"])
@include('layouts/partials/#tableExport')
@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">
						<div class="card-title">
							<h3>
								Consulter les absences de {{$type}} @foreach($groupes as $g)
									<span> {{$g->specialite}}</span><br>
								@endforeach

							</h3>
						</div>
						<div class="table-responsive m-t-40">

							<table id="example23" class="myclass display nowrap table table-hover table-striped table-bordered"
										 cellspacing="0" style="width: 100%;" name="personDataTable">
								<thead>
								<tr>
									<th class="text-center">Nom et prenom</th>
									<th class="text-center">Date</th>
									<th class="text-center">Justifier</th>
									<th class="text-center">justification</th>

								</tr>
								</thead>

								<tfoot>
								<tr>
									<th class="text-center">Nom et prenom</th>
									<th class="text-center">Date</th>
									<th class="text-center">Justifier</th>
									<th class="text-center">justification</th>
								</tr>
								</tfoot>

								<tbody>
								@foreach($abs as $a)
									<tr>


										<td class="text-center">{{$a->etudiant->fullname}}</td>
										<td class="text-center">{{$a->date}}</td>
										<td class="text-center">
											@if($a->justified == 0)
												non
											@else
												oui
											@endif
										</td>
										<td>

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
	</div>
@endsection
@push('scripts')
	<script>

	</script>
@endpush
