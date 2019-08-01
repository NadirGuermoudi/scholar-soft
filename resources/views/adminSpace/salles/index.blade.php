@extends('layouts.master', ['title' => 'Salle'])
@section('title','Salles | Scholar-soft')
@section('content')
	
	<div class="container-fluid">

		<div class="row">
            
            <div class="col-12">
				
				<div class="card">
                            
                    <div class="card-block">
                               
						<h4 class="card-title">
							Lliste des salles 
						</h4>
                                
						<h6 class="card-subtitle">
							Exporter les données en Copy, CSV, Excel, PDF ou Imprimer
						</h6>
					
						<div class="table-responsive m-t-40">
							
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Capacité</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <div>
                                          	<button type="button" class="btn  btn-danger btn-block btn-md" data-toggle="modal" data-target="#add-salle" >
                                          		<i class="fa fa-plus">
                                          			Ajouter une salle
                                          		</i>
											</button>
                                           
											{{-- including the add Modal --}}
											@include('adminSpace/salles/modals/addModal')

                                           <br>         
                                            	  

                                        </div>
                                    </tr>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Capacité</th>
                                        <th>Action</th>
                                    </tr>
                                            
                                </tfoot>
                                    <tbody>
                                    	@foreach($salles as $salle)
                                      	<tr>
                                       		<td> 
                                       			{{$salle->nom}} 
                                       		</td>

                                       		<td>
                                       			{{$salle->capacite}}
                                       		</td>

                                       		<td>


                                        		<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#edit-salle{{$salle->id}}">
                                        			<i class="fa fa-edit">
                                        			</i>
                                        		</button>
                                        		{{-- including the edit Modal --}}
                                        		@include('adminSpace/salles/modals/editModal')


                                        		<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-salle{{$salle->id}}">
                                        			<i class="fa fa-times">
                                        			</i>
                                        		</button>
                                        		{{-- including the delete Modal --}}
                                        		@include('adminSpace/salles/modals/deleteModal')






                                        		{{-- 
												we don't need eye here
                                        		<a href="" class="btn text-dark">
                                        			<i class="fa fa-eye">
                                        			</i>
                                        		</a> --}}

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
                    

	
		@push('scripts')


			
		    <!-- This is data table -->
		    <script src="{{asset('monster/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
		    <!-- start - This is for export functionality only -->
			<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js">
			</script>
		    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js">
		    </script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
		    </script>
		    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
		    </script>
		    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
		    </script>
		    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js">
		    </script>
		    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js">
		    </script>

		<script>

			$(document).ready(function() {
			        $('#myTable').DataTable();
			        $(document).ready(function() {
			            var table = $('#example').DataTable({
			                "columnDefs": [{
			                    "visible": false,
			                    "targets": 2
			                }],
			                "order": [
			                    [2, 'asc']
			                ],
			                "displayLength": 25,
			                "drawCallback": function(settings) {
			                    var api = this.api();
			                    var rows = api.rows({
			                        page: 'current'
			                    }).nodes();
			                    var last = null;
			                    api.column(2, {
			                        page: 'current'
			                    }).data().each(function(group, i) {
			                        if (last !== group) {
			                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
			                            last = group;
			                        }
			                    });
			                }
			            });
			            // Order by the grouping
			            $('#example tbody').on('click', 'tr.group', function() {
			                var currentOrder = table.order()[0];
			                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
			                    table.order([2, 'desc']).draw();
			                } else {
			                    table.order([2, 'asc']).draw();
			                }
			            });
			        });
			    });
			    $('#example23').DataTable({
			        dom: 'Bfrtip',
			        buttons: [
			            'copy', 'csv', 'excel', 'pdf', 'print'
			        ]
			    });
		
		</script>

		@endpush

@endsection