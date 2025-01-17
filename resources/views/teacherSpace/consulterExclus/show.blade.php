@extends('layouts.master', ['title' => "Faire l'appel"])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">
						<div class="card-title">
							<h3>
								Consulter liste des Exclus du {{$type}} {{$g->module}} de @foreach($groupes as $g)
									{{$g->specialite}}
								@endforeach
							</h3>
						</div>
						@if($exclusNj != [] or $exclusJ != [])
							<hr class="col-12">
							<div class="table-responsive m-t-40">

								<table id="example23" class="myclass display nowrap table table-hover table-striped table-bordered"
											 cellspacing="0" style="width: 100%;" name="personDataTable">
									<thead>
									<tr>
										<th class="text-center">Nom et prenom</th>
										<th class="text-center">Matricule</th>
										<th class="text-center">Email</th>
										<th class="text-center">raison</th>
									</tr>
									</thead>


									<tbody>

									@foreach($exclusNj as $e)
										<tr>
											<td class="text-center">{{$e->fullname}}</td>
											<td class="text-center">{{$e->matricule}}</td>
											<td class="text-center" s>{{$e->email}}</td>
											<td class="text-center" s>+ 3 non justifer</td>
										</tr>

									@endforeach
									@foreach($exclusJ as $e)
										<tr>
											<td class="text-center">{{$e->fullname}}</td>
											<td class="text-center">{{$e->matricule}}</td>
											<td class="text-center" s>{{$e->email}}</td>
											<td class="text-center" s>+ 5  justifer</td>
										</tr>
									@endforeach
									</tbody>
								</table>

							</div>
						@endif

						@if($exclusJ == [] and $exclusNj == [])
							<hr class="col-12">
							<h4> Pas D'Exclus</h4>
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')

@endpush
