@push('styles')
<link href="{{asset('monster/assets/plugins/datatables-responsive/css/responsive.dataTables.css')}}" rel="stylesheet">
@endpush

@push('scripts')		
<!-- This is data table -->
<script src="{{asset('monster/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<!-- responsive data table -->
<script src="{{asset('monster/assets/plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
				responsive: true
		});
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
		responsive: true,
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
	$('#datatable_desc').DataTable({
		responsive: true,
		"order": [
			[0, 'desc']
		],
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
</script>

@endpush