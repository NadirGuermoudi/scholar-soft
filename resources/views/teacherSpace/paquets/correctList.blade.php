@extends('layouts.master', ['title' => 'Paquets à corriger'])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Paquets à corriger</h4>

						<table id="example23" class="display nowrap table table-hover table-striped table-bordered"
									 style="width: 100%;">
							<thead>
							<tr>
								<th>Dispo | Type | Module</th>
								<th>Cal-Diff</th>
								<th>Responsable</th>
								<th>Dispo(max)</th>
								<th>Date limit</th>
								<th>Vous/Correcteurs</th>
								<th>Copies</th>
								<th>Actions</th>
							</tr>
							</thead>

							<tfoot>
							<tr>
								<th>Dispo | Type | Module</th>
								<th>Cal-Diff</th>
								<th>Responsable</th>
								<th>Dispo(max)</th>
								<th>Date limit</th>
								<th>Vous/Correcteurs</th>
								<th>Copies</th>
								<th>Actions</th>
							</tr>
							</tfoot>

							<tbody>
							@foreach($paquets as $paquet)
								{{-- correcteur 1 --}}
								@if($paquet->correcteur1_id == Auth::guard('enseignant')->user()->id && !$paquet->correcteur1_rendu)
									<tr>
										<td>
											@if($paquet->encrypted) <i class="fas fa-check-circle text-success"></i><p hidden>1</p> @else <i
												class="fas fa-sync-alt text-warning"></i><p hidden>2</p> @endif
											{{ $paquet->type }} | {{ $paquet->module }}
										</td>
										<td>{{ $paquet->type_calcul }}-{{ $paquet->difference }}</td>
										<td>{{ $paquet->responsable->fullName }}</td>
										<td>{{ $paquet->date_limite_encryptor }}</td>
										<td>{{ $paquet->date_limite_correcteur1 }}</td>
										<td>1/{{ ($paquet->correcteur3_id != null) ? 3 : (($paquet->correcteur2_id != null) ? 2 : 1) }}</td>
										<td>{{ $paquet->etudiants->count() }}</td>

										<td>
											@if($paquet->encrypted)
												<button type="button" class="btn btn-outline-warning" data-toggle="modal"
																data-target="#return-paquet{{$paquet->id}}">
													<i class="fas fa-sign-language"></i>
												</button>
												{{-- including the return Modal --}}
												@include('teacherSpace/paquets/_returnPaquetModal', ['correcteur' => 1])
											@endif

											<a href="{{ route('paquets.correct.one', ['paquet' => $paquet, 'correcteur' => 1]) }}"
												 class="btn btn-outline-danger"><i class="fa fa-pen"></i></a>
										</td>
									</tr>
								@endif

								{{-- correcteur 2 --}}
								@if($paquet->correcteur2_id == Auth::guard('enseignant')->user()->id && !$paquet->correcteur2_rendu)
									<tr>
										<td>
											@if($paquet->correcteur1_rendu) <i class="fas fa-check-circle text-success"></i><p hidden>
												1</p> @else <i class="fas fa-sync-alt text-warning"></i><p hidden>2</p> @endif
											{{ $paquet->type }} | {{ $paquet->module }}
										</td>
										<td>{{ $paquet->type_calcul }}-{{ $paquet->difference }}</td>
										<td>{{ $paquet->responsable->fullName }}</td>
										<td>{{ $paquet->date_limite_correcteur1 }}</td>
										<td>{{ $paquet->date_limite_correcteur2 }}</td>
										<td>2/{{ ($paquet->correcteur3_id != null) ? 3 : 2 }}</td>
										<td>{{ $paquet->etudiants->count() }}</td>

										<td>
											@if($paquet->correcteur1_rendu)
												<button type="button" class="btn btn-outline-warning" data-toggle="modal"
																data-target="#return-paquet{{$paquet->id}}">
													<i class="fas fa-sign-language"></i>
												</button>
												{{-- including the return Modal --}}
												@include('teacherSpace/paquets/_returnPaquetModal', ['correcteur' => 2])
											@endif

											<a href="{{ route('paquets.correct.one', ['paquet' => $paquet, 'correcteur' => 2]) }}"
												 class="btn btn-outline-danger"><i class="fa fa-pen"></i></a>
										</td>
									</tr>
								@endif

								{{-- correcteur 3 --}}
								@if($paquet->correcteur3_id == Auth::guard('enseignant')->user()->id && !$paquet->correcteur3_rendu)
									<tr>
										<td>
											@if($paquet->correcteur2_rendu) <i class="fas fa-check-circle text-success"></i><p hidden>
												1</p> @else <i class="fas fa-sync-alt text-warning"></i><p hidden>2</p> @endif
											{{ $paquet->type }} | {{ $paquet->module }}
										</td>
										<td>{{ $paquet->type_calcul }}-{{ $paquet->difference }}</td>
										<td>{{ $paquet->responsable->fullName }}</td>
										<td>{{ $paquet->date_limite_correcteur2 }}</td>
										<td>{{ $paquet->date_limite_correcteur3 }}</td>
										<td>3/3</td>
										<td>{{ $paquet->etudiants->count() }}</td>

										<td>
											@if($paquet->correcteur2_rendu)
												<button type="button" class="btn btn-outline-warning" data-toggle="modal"
																data-target="#return-paquet{{$paquet->id}}">
													<i class="fas fa-sign-language"></i>
												</button>
												{{-- including the return Modal --}}
												@include('teacherSpace/paquets/_returnPaquetModal', ['correcteur' => 3])
											@endif

											<a href="{{ route('paquets.correct.one', ['paquet' => $paquet, 'correcteur' => 3]) }}"
												 class="btn btn-outline-danger"><i class="fa fa-pen"></i></a>
										</td>
									</tr>
								@endif
							@endforeach
							</tbody>

						</table>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
