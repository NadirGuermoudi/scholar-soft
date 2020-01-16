@extends('layouts.master', ['title' => "consulter les absences"])
@include('layouts.partials.#tableExport')
@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">
						<div class="card-title">
							<h3>
								Consulter les absences de {{$type}}
								@foreach($groupes as $g)
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
											<select class="form-control" id="{{$a->etudiant_id}}" data-idS="{{$a->seance_id}}"
															data-date="{{$a->date}}" onchange="groupe(this)">
												@if($a->justification != null)
													<option selected>oui</option>
												@elseif($a->justified == 0)
													<option selected>non</option>
													<option>oui</option>
												@else
													<option selected>oui</option>
													<option>non</option>
												@endif
											</select>
										</td>
										<td>
											@if($a->justification == null)
												<div class="text-center">
													<button type="button" class="btn btn-circle btn-success btn-md"
																	data-toggle="modal" data-target="#add-teacher{{$a->date}}">
														<i class="fa fa-plus"></i>
													</button>
													{{-- including the add Modal --}}
													@include('teacherSpace/consulterAbs/modals/addModal')
													<br>
												</div>
											@else
												<div class="col-12 text-center">
													<div style="display: inline">
														<a href="{{url($a->justification)}}" target="_blank">
															<button type="button" class="btn btn-circle btn-success">
																<i class="fa fa-eye"></i>
															</button>
														</a>
													</div>
													<div style="display: inline">
														<button type="button" class="btn btn-warning"
																		data-toggle="modal" data-target="#edit-enseignant{{$a->date}}">
															<i class="fa fa-list"></i>
														</button>
														{{-- including the add Modal --}}
														@include('teacherSpace/consulterAbs/modals/editModal')
													</div>
													<div style="display: inline">
														<button type="button" class="btn btn-danger "
																		data-toggle="modal" data-target="#delete-enseignant{{$a->date}}">
															<i class="fa fa-trash"></i>
														</button>
														{{-- including the add Modal --}}
														@include('teacherSpace/consulterAbs/modals/deleteModal')
													</div>
												</div>

											@endif
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
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });

      function groupe(e) {

          var date = $(e).attr('data-date');
          var idE = $(e).attr('id');
          var idS = $(e).attr('data-idS');
          console.log(idE, " ", idS);
          var j = null;
          if ($(e).find(":selected").text() == "oui") {
              j = 1;
          } else {
              j = 0;
          }


          $.ajax({

              type: 'POST',

              url: '/consulterabs/justification',

              data: {idE: idE, date: date, idS: idS, j: j},

              success: function (data) {


              },
              error: function (response) {

              }

          });
      }
	</script>
@endpush
