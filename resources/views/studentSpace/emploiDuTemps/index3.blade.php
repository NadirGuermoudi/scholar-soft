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
						
									@foreach($days as $day=>$seances)
										{{-- tr --}}
										<div class="row border" >
											
											<div class="col-md-3 bg-secondary py-3 {{--  px-2 --}}"
											 rowspan="2" width="{{0.13*60}}%">
													{{$day}} 
											</div>

											<div class="col-md-9 border {{-- px-2 --}}"
											 rowspan="2" >

												<div class="row bg-light">
													@if(sizeof($seances)==0)
														{{-- <td width="100%" rowspan="2"></td> --}}
														<div class="col-md-12 bg-light py-3 {{-- border py-3 px-2 --}}">
															 <p> </p>
														</div>
													@else
															@foreach($seances as $seance)
																@php
																	$minutesSeance = ( substr($seance->heur_fin, 0, 2) * 60 + substr($seance->heur_fin, 3, 2)) -(substr($seance->heur_debut, 0, 2) * 60+ substr($seance->heur_debut, 3, 2));
																	if($seance->once_two_week && (prev($seances))->once_two_week)
																	{
																		continue;
																	}
																@endphp
																<div class="{{-- col --}} py-3 pl-3 bg-light"{{-- align="center" --}} {{-- class="border" --}}
																{{-- width="{{ 0.13 * $minutesSeance  }}%" --}} 
																style="width:{{0.13*$minutesSeance}}%;">
																	{{substr($seance->heur_debut, 0, 5)}} - {{substr($seance->heur_fin, 0, 5)}}
																</div>
															@endforeach
													@endif
												</div>

												<div class="row bg-secondary">
														@if(sizeof($seances)==0)
															<div class="col-md-12 py-3 bg-secondary{{-- border py-3 px-2 --}}">
																<p></p> 
															</div>
														@else
																@foreach($seances as $seance)
																	@php
																		$minutesSeance = (
																	if($seance->once_two_week && (prev($seances))->once_two_week)
																	{
																		continue;
																	}

																	if($seance->once_two_week && next($seances)->once_two_week)
																	{
																	@endphp
																		<div class="{{-- col --}} bg-secondary border py-3 pl-3"
																		 style="width:{{0.13*$minutesSeance}}%;"  >
																			{{$seance->module}} / {{next($seances)->module}}
																		</div>
																	@php
																	continue;
																	}
																	@endphp

																	<div class="{{-- col --}} bg-secondary border py-3 pl-3"
																	 style="width:{{0.13*$minutesSeance}}%;"  >
																		{{$seance->module}}
																	</div>
																@endforeach
																{{-- 
																	Cette méthode de teste comporte malgré ca un bug qui pourrait poser un probleme dans le planning,
																	le contrexmple est : 
																	si on a une seance once_week qui est juste avant une autre seance qui est once_week aussi mais elle dépend paas de la premiere, la l'emploi du temps va pas considérer la 2 eme séance
																 --}}
														@endif
												</div>

											</div>

										</div>

									@endforeach


						</div>
					</div>
				</div>
			</div>
		</div>



@endsection