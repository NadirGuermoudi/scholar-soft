@extends('layouts.master')

@section('content')

	{{-- 
	Todo:

		- Modifier que le mot de passe et l'email
		le nom et prénom etc, sont des inputs inchangeables
		- Pour modifier l'émail ou le mode passe il doit passer par un check
		  de son mot de passe
		- Pour modifier le mot de passe il doit l'introduire 2 fois 

	 --}}

		<div class="container-fluid ">

			<div class="row">
	            
	            <div class="col-12">
					
					<div class="card">

						<div class="card-block">
	                               
							<h4 class="card-title">
								Paramètres 
							</h4>

							<h6 class="card-subtitle">

								Modifier les informations de votre profile

							</h6>

							<div class="col-md-12">
							  
								<div class="box box-primary">

									<div class="box-body">


										<form class="well form-horizontal" 
											  method="POST" 
											  action="{{route('admin.update', Auth::guard('admin')->user()->id )}}" 
											  id="contact_form" 
											  enctype="multipart/form-data">
										
										@csrf

										@method('PUT')	

											<div class="form-group">  





												<div class="row">

											    	<div class="col-md-3">
											     		<strong>Nom:</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			readonly
											    			type="text" 
											    			class="form-control col-md-3"
											    			name="nom" 
											    			value="{{Auth::guard('admin')->user()->nom}}"
											    		/>
											    	</div>

												</div>



												<br>

												<div class="row">

											    	<div class="col-md-3">
											     		<strong>Prenom:</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			readonly
											    			type="text" 
											    			class="form-control col-md-3"
											    			name="prenom" 
											    			value="{{Auth::guard('admin')->user()->prenom}}"
											    		/>
											    	</div>

												</div>



												<br>



												<div class="row">

											    	<div class="col-md-3">
											     		<strong>Email:</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			type="email" 
											    			class="form-control col-md-3"
											    			name="email" 
											    			value="{{Auth::guard('admin')->user()->email}}"
											    			minlength="5"
											    			maxlength="35" 
											    		/>
											    	</div>

												</div>



												<br>


												<div class="row">

											    	<div class="col-md-3">
											     		<strong>
											     			 Mot de passe actuelle:
											     		</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			type="password" 
											    			class="form-control col-md-3"
											    			name="password_old" 
											    			minlength="8"
											    			maxlength="15" 
											    		/>
											    		{{-- <label class="col-md-6 text-info">
											    			Saissez mot de passe actuelle pour validation
											    		</label> --}}
											    	</div>

												</div>



												<br>

												
												<div class="row">

											    	<div class="col-md-3">
											     		<strong>
											     			Nouveau Mot de passe:
											     		</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			type="password" 
											    			id="password"
											    			class="form-control col-md-3"
											    			name="password"
											    			minlength="0"
											    			maxlength="15" 
											    		/>
											    	</div>

												</div>



												<br>


												<div class="row">

											    	<div class="col-md-3">
											     		<strong>
											     			Répéter Mot de passe:
											     		</strong>
											    	</div>
											    
											    	<div class="col-md-9">
											    		<input 
											    			type="password" 
											    			id="confirm_password"
											    			class="form-control col-md-3"
											    			name="password_check"
											    			minlength="0"
											    			maxlength="15" 
											    		/>
											    	</div>

												</div>



												<br>


												<div 
													class="fileupload btn btn-info waves-effect waves-light">
													
														<span>
															<i 
																class="ion-upload m-r-5">
															</i>
														
																Mettre à jour
													
														</span>

														<input 
															type="submit"  
															class="upload"/>

												</div>



											</div>

										</form>




									</div>

								</div>

							</div>

						</div>


					</div>

				</div>

			</div>

		</div>



		@push('scripts')
		<script type="text/javascript">
			var password = document.getElementById("password"), 
					confirm_password = document.getElementById("confirm_password");

			function validatePassword(){
			  if(password.value != confirm_password.value) {
			    confirm_password.setCustomValidity("Passwords Don't Match");
			  } else {
			    confirm_password.setCustomValidity('');
			  }
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
		@endpush




@endsection