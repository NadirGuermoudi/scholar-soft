
	<div class="card">
	    <div class="card-block">
			<h4 class="card-title m-b-40">Tab with dropdown</h4>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					
					<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> Ajout simple </span></a> 
					</li>
					
					<li class="nav-item"> 
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile">
							<span class="hidden-sm-up">
								<i class="ti-user"></i>
							</span> 
							<span class="hidden-xs-down"> 
								Ajouter plusieurs 
							</span>
						</a>
					</li>
	                                   
				</ul>
	                                
		<div class="tab-content tabcontent-border p-20" id="myTabContent">
									
			<div role="tabpanel" class="tab-pane fade show active" id="home5" aria-labelledby="home-tab">

				<form class="form-horizontal form-material" action="{{route('salles.store')}}" method="post">
					
					@csrf
											
					<div class="form-group">  

						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="nom de salle"
							name="nom">
						</div>
	                           
						<div class="col-md-12 m-b-20">
							<input type="text" class="form-control" placeholder="capicité"
							name="capacite">
						</div>          		  	
						
	                                    		  	
						<div class="col-md-12 m-b-20">

							{{-- 

							Other button style

							<button type="submit" class=" btn btn-md btn-primary"><i class="fa fa-check"></i> Ajouter</button>
 							
 							--}}

							<div class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
								<span>
									<i class="ion-upload m-r-5"></i>
									Créer la salle
								</span>
								<input type="submit"  class="upload"> 
							</div>

						</div>

					</div>
				</form>

			</div>
			<div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
				</p>
			</div>                                  
		</div>
	</div>
	</div>