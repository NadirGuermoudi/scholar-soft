@extends('layouts.master', ['title' => 'Salle'])
@section('title','Salles | Scholar-soft')
@section('content')
	

	<div class="container-fluid">

		<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title"> Lliste des salles  </h4>
                                <h6 class="card-subtitle">Exporter les données en Copy, CSV, Excel, PDF ou Imprimer</h6>
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
                                                <th>Nom</th>
                                                <th>Capacité</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                            	<div>
                                            	  <button href="{{route('salles.create')}}" type="button" class="btn btn-block btn-outline-success btn-md" data-toggle="modal" data-target="#add-contact" ><i class="fa fa-plus"> Ajouter une salle</i></button>
                                            	  <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            	  	<div class="modal-dialog">
                                            	  	<div class="modal-content">
	                                            	  	<div class="modal-header">
	                                            	  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                                            	  	<h4 class="modal-title" id="myModalLabel">Add New Contact</h4> </div>
	                                            	  	<div class="modal-body">
	                                            	  	<from class="form-horizontal form-material">
	                                            	  	<div class="form-group">
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Type name"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Email"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Phone"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Designation"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Age"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Date of joining"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<input type="text" class="form-control" placeholder="Salary"> </div>
	                                            	  	<div class="col-md-12 m-b-20">
	                                            	  	<div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
	                                            	  	<input type="file" class="upload"> </div>
	                                            	  </div>
	                                            	</div>
	                                            </from>
	                                        </div>
	                                        <div class="modal-footer">
	                                        	<button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
	                                        	<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
	                                        </div>
                                        </div>	{{-- /. modal-content --}}
                                    </div>{{-- / . modal dialog  --}}
                                </div>

                                            	</div>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	@foreach($salles as $salle)
                                        		<tr>
                                        			<td> {{$salle->nom}} </td>
                                        			<td> {{$salle->capacite}} </td>
                                        			<td>

                                        				<a href="" class="btn text-info">
                                        				<i class="fa fa-edit"></i>
                                        				</a>

                                        				<a href="" class="btn text-danger">
                                        				<i class="fa fa-times"></i>
                                        				</a>

                                        				<a href="" class="btn text-dark">
                                        				<i class="fa fa-eye"></i>
                                        				</a>

                                        				
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