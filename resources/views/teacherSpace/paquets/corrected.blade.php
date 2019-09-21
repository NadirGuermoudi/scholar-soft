@extends('layouts.master', ['title' => 'Mes paquets corrigée'])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">Mes paquets corrigée</h4>

						<table id="datatable_desc" class="display nowrap table table-hover table-striped table-bordered"
									 style="width: 100%;">
							<thead>
							<tr>
								<th>Date | Type | Module</th>
								<th>Cal-Diff</th>
								<th>Correcteur 1</th>
								<th>Correcteur 2</th>
								<th>Correcteur 3</th>
								<th>Actions</th>
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
										<a href="{{ route('paquets.marks', $paquet) }}" class="btn btn-outline-info"><i
												class="fa fa-eye"></i></a>
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
