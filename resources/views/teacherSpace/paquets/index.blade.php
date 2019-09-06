@extends('layouts.master', ['title' => 'Mes paquets'])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Mes paquets</h4>

						{{-- add paquet --}}
						<div>
							<!-- Button trigger modal -->
							<a href="{{ route('paquets.create') }}" class="btn  btn-success btn-block btn-md">
								<i class="fas fa-folder-plus fa-lg"></i> Ajouter un paquet
							</a>
							<br/>
						</div>
						{{-- end add paquet --}}

						<table id="datatable_desc" class="display nowrap table table-hover table-striped table-bordered"
									 style="width: 100%;">
							<thead>
							<tr>
								<th>Date | Type | Module</th>
								<th>Cal-Diff</th>
								<th>Correcteur 1</th>
								<th>Correcteur 2</th>
								<th>Correcteur 3</th>
								<th data-class-name="priority">Actions</th>
							</tr>
							</thead>

							<tfoot>
							<tr>
								<th>Date | Type | Module</th>
								<th>Cal-Diff</th>
								<th>Correcteur 1</th>
								<th>Correcteur 2</th>
								<th>Correcteur 3</th>
								<th>Actions</th>
							</tr>
							</tfoot>

							<tbody>
							@foreach($paquets as $paquet)
								<tr>
									<td>{{ $paquet->created_at }} <br> {{ $paquet->type }} | {{ $paquet->module }}</td>
									<td>{{ $paquet->type_calcul }}-{{ $paquet->difference }}</td>
									<td>
										@if($paquet->correcteur1 != null)
											{{ $paquet->correcteur1->fullName }}
											<br>
											{{ $paquet->date_limite_correcteur1 }} @if($paquet->correcteur1_rendu) <i
												class="fas fa-check-circle text-success"></i> @else <i
												class="fas fa-sync-alt text-warning"></i> @endif
										@endif
									</td>
									<td>
										@if($paquet->correcteur2 != null)
											{{ $paquet->correcteur2->fullName }}
											<br>
											{{ $paquet->date_limite_correcteur2 }} @if($paquet->correcteur2_rendu) <i
												class="fas fa-check-circle text-success"></i> @else <i
												class="fas fa-sync-alt text-warning"></i> @endif
										@endif
									</td>
									<td>
										@if($paquet->correcteur3 != null)
											{{ $paquet->correcteur3->fullName }}
											<br>
											{{ $paquet->date_limite_correcteur3 }} @if($paquet->correcteur3_rendu) <i
												class="fas fa-check-circle text-success"></i> @else <i
												class="fas fa-sync-alt text-warning"></i> @endif
										@endif
									</td>

									<td>
										@if($paquet->responsable_rendu)
											<button type="button" class="btn btn-outline-success" data-toggle="modal"
															data-target="#delivered-paquet">
												<i class="fas fa-check-circle"></i>
											</button>
										@else
											<button type="button" class="btn btn-outline-warning" data-toggle="modal"
															data-target="#return-paquet{{$paquet->id}}">
												<i class="fas fa-sign-language"></i>
											</button>
											{{-- including the return Modal --}}
											@include('teacherSpace/paquets/_returnPaquetModal')
										@endif

										<a href="{{ route('paquets.edit', $paquet) }}" class="btn btn-outline-info"><i
												class="fa fa-edit"></i></a>

										<button type="button" class="btn btn-outline-danger" data-toggle="modal"
														data-target="#delete-paquet{{$paquet->id}}">
											<i class="fa fa-times"></i>
										</button>
										{{-- including the delete Modal --}}
										@include('teacherSpace/paquets/_deletePaquetModal')
									</td>
								</tr>
							@endforeach

							{{-- including the delivered Modal --}}
							@include('teacherSpace/paquets/_deliveredPaquetModal')
							</tbody>

						</table>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
