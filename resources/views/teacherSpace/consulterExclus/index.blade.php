@extends('layouts.master', ['title' => "consulter les absences"])
@section('content')
	<div class="container-fluid">

		<div class="row">

			<div class="col-12">

				<div class="card">

					<div class="card-block">

						<h4 class="card-title">
							Consulter List Des Exclus
						</h4>


						<select class="col-md-12 select2-dropdown text-dark form-control"
										required onchange="groupe(this)">
							<option disabled selected>Selectionner le jour de la seance</option>
							@php
								$cptD = 0;$cptL = 0;$cptM = 0;$cptMe = 0;$cptJ = 0;
							@endphp
							@foreach($data as $j)

								@if($j->jour == "DIMANCHE" and $cptD ==0)
									{{$cptD = 1}}
									<option value="{{$j->jour}}">{{$j->jour}}</option>
								@endif
								@if($j->jour == "LUNDI" and $cptL ==0)
									{{$cptL = 1}}
									<option value="{{$j->jour}}">{{$j->jour}}</option>
								@endif
								@if($j->jour == "MARDI" and $cptM ==0)
									{{$cptM = 1}}
									<option value="{{$j->jour}}">{{$j->jour}}</option>
								@endif
								@if($j->jour == "MERCREDI" and $cptMe ==0)
									{{$cptMe = 1}}
									<option value="{{$j->jour}}">{{$j->jour}}</option>
								@endif
								@if($j->jour == "JEUDI" and $cptJ ==0)
									{{$cptJ = 1}}
									<option value="{{$j->jour}}">{{$j->jour}}</option>
								@endif
							@endforeach
						</select>

						<form action="{{route('consulterexclus.afficher')}}" method="post">
							@csrf
							<select name="seance" class="col-md-12 select2-dropdown text-dark form-control"
											style="margin-top: 5px;display:none;"
											onchange="button()"
											id="seance">
								<option disabled selected>Selectionner Seance</option>

							</select>

							<div id="button" style="margin: 5px;display:none;">
								<!-- Button trigger modal -->
								<button type="submit" class="btn  btn-success btn-block btn-md">
									Consulter list Exclus
								</button>


								<br/>
							</div>

						</form>


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

          var jour = e.value;
          var id = {{$eId}};

          $.ajax({

              type: 'POST',

              url: '/fairelappel/ajax',

              data: {jour: jour, id: id},

              success: function (data) {
                  // $('#example23').preventDefault();
                  e = $.parseJSON(data);
                  var ele = $('#seance');
                  ele.empty();
                  ele.append('<option disabled selected>Selectionner seance </option>');
                  for (var i = 0; i < e.length; i++) {
                      // POPULATE SELECT ELEMENT WITH JSON.
                      ele.append('<option value="' + e[i]['id'] + '">' + e[i]['type'] + '(' + e[i]['module'] + ')' + '</option>');
                  }
                  show('seance');

              },
              error: function (response) {
                  alert('Error' + response);
              }

          });
      }

      function button() {
          show('button');
          show('date');
      }

      function show(id) {
          var select = document.getElementById(id);
          select.style.display = 'inline';
      }
	</script>
@endpush
