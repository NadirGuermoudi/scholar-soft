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
									
							{{-- 

							A revoir apres

								<h6 class="card-subtitle">
									Exporter les données en Copy, CSV, Excel, PDF ou Imprimer
								</h6> 

							--}}
						
							<div class="table-responsive m-t-40">
								
								
								<table style="width:99%;" border=1>
									{{-- 
											I consider each minute in a senace is 0,13 percent of table
											And I consider that the max line contains 1 hour plus 10 hours  
									--}}

									@foreach($days as $day=>$seances)
										
										<tr style="width:100%;" border=1>
											
											<td style="border-style:solid" 
											class="py-3 px-2" rowspan="2" width="{{0.13*60}}%">
													{{$day}} 
											</td>
											@if(sizeof($seances)==0)
												{{-- <td width="100%" rowspan="2"></td> --}}
											@else
												@foreach($seances as $seance)
													@php
														$minutesSeance = (
																					 substr($seance->heur_fin, 0, 2) * 60
																					 +
																					 substr($seance->heur_fin, 3, 2)
																						) -
																					 (
																					 substr($seance->heur_debut, 0, 2) * 60
																					 +
																					 substr($seance->heur_debut, 3, 2)
																						);
													@endphp
													<td align="center" style="border-style:solid;" class="py-3"
													width="{{ 0.13 * $minutesSeance  }}%">
														{{substr($seance->heur_debut, 0, 5)}} - {{substr($seance->heur_fin, 0, 5)}}
													</td>
												@endforeach

												
											@endif
											

										</tr>

										<tr style="width:100%;" border=1>
											@if(sizeof($seances)==0)
											@else
												@foreach($seances as $seance)
													@php
														$minutesSeance = (
																					 substr($seance->heur_fin, 0, 2) * 60
																					 +
																					 substr($seance->heur_fin, 3, 2)
																						) -
																					 (
																					 substr($seance->heur_debut, 0, 2) * 60
																					 +
																					 substr($seance->heur_debut, 3, 2)
																						);
													@endphp
													<td align="center" style="border-style:solid;" class="py-3"
													width="{{ 0.13 * $minutesSeance }}%">
														{{$seance->module}}
													</td>
												@endforeach

											@endif
										</tr>

									@endforeach

								</table>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



@endsection