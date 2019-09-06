@extends('layouts.master')

@section('content')



	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">

						<h4 class="card-title">
							Emploi du temps
						</h4>

						<h6 class="card-subtitle">
							Exporter les données en Copy, CSV, Excel, PDF ou Imprimer
						</h6>

						<div class="table-responsive m-t-40">

							<table id="example23" class="display nowrap table table-hover table-striped table-bordered"
										 cellspacing="0" width="100%">

								{{-- <thead>
																		<tr>
																				<th> date </th>
																				<th> module </th>
																				<th> remarque </th>
																				<th> justification </th>
																				<th> action </th>
																		</tr>
																</thead> --}}


								{{-- <tfoot>
										<tr>
												<th> date </th>
												<th> module </th>
												<th> remarque </th>
												<th> justification </th>
												<th> action </th>
										</tr>
								</tfoot> --}}

								<tbody>

								@foreach($absences as $absence)
									<tr>

										<td>
											{{$absence->absent_at}}
										</td>

										<td>
											{{-- to get --}}
											{{$absence->seance->module}}
										</td>

										<td>
											{{-- to get --}}
											@if( $absence->justified == '1' )
												<p>
													justifiée
												</p>
											@else
												<p
													class="text-info">
													non justifiée
												</p>
											@endif
										</td>

										<td>
											{{$absence->justification}}
										</td>

										<td>

											<button type="button" class="btn btn-outline-info" data-toggle="modal"
															data-target="#show-seance{{$absence->seance->id}}">
												<i class="far fa-eye">
												</i>
											</button>

											{{-- including the Modal --}}
											@include('studentSpace/Modals/showModal')

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
