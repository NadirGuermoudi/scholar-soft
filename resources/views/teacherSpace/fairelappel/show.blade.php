@extends('layouts.master', ['title' => "Faire l'appel"])
@include('layouts/partials/#tableExport')

@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">

						<h4 class="card-title">
							Faire l'appel
						</h4>

						<div class="table-responsive m-t-40">

							<table id="example23" class="myclass display nowrap table table-hover table-striped table-bordered"
										 cellspacing="0" style="width: 100%;" name="personDataTable">
								<thead>
								<tr>
									<th class="text-center">Nom et prenom</th>
									<th class="text-center">presence</th>
									<th class="text-center">etat</th>

								</tr>
								</thead>

								<tfoot>
								<tr>
									<th class="text-center">Nom et prenom</th>
									<th class="text-center">presence</th>
									<th class="text-center">etat</th>
								</tr>
								</tfoot>

								<tbody>

								@foreach($groupe as $g)
									@foreach($g->etudiants()->get() as $e)
										<tr>
											<td class="text-center">{{$e->fullName}}</td>
											<td class="text-center">

												<a>
													<i id="present" id-etu="{{$e->id}}" class="fas fa-check-circle fa-2x text-success"
														 onclick="groupe(this)"
														 style="margin-right: 10px">

													</i>
												</a>
												<a><i id="absent" id-etu="{{$e->id}}" class="fas fa-times-circle fa-2x text-danger"
															onclick="groupe(this)"></i></a>
											</td>
											<td class="text-center">
												<span id="success{{ $e->id }}" class="text-success" style="display: none;">present</span>
												<i id="warning{{ $e->id}}" class="fas fa-sync-alt text-warning" style="display: none;"></i>
												<span id="danger{{ $e->id }}" class="text-danger" style="display: none;">absent</span>
												<i id="error{{ $e->id }}" class="fa fa-times text-danger" style="display: none;"></i>
											</td>

										</tr>
									@endforeach
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
          var idEtudiant = $(e).attr('id-etu');
          $('#success' + idEtudiant).hide();
          $('#danger' + idEtudiant).hide();
          $('#error' + idEtudiant).hide();
          $('#warning' + idEtudiant).show();

          var presence;

          var idSeance = {{$id}};

          var date = "{{$today}}";
          if ($(e).attr('id') == 'present') {
              presence = 1;
          } else {
              presence = 0;
          }


          $.ajax({

              type: 'POST',

              url: '{{route('fairelappel.store')}}',

              data: {
                  presence: presence,
                  idEtudiant: idEtudiant,
                  idSeance: idSeance,
                  date: date
              },

              success: function (data) {
                  console.log(data['success']);
                  if (data['success'] == 'present') {
                      $('#success' + idEtudiant).show();
                      $('#warning' + idEtudiant).hide();
                  } else {
                      $('#danger' + idEtudiant).show();
                      $('#warning' + idEtudiant).hide();
                  }
              },
              error: function (response) {
                  $('#error' + idEtudiant).show();
                  $('#warning' + idEtudiant).hide();
              }

          });
      }
	</script>
@endpush
