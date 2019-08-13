@push('styles')
<!-- Chosen -->
<link href="{{asset('css/chosen.min.css')}}" rel="stylesheet"/>
<style type="text/css">
	.chosen-container.chosen-container-single {
		width: 100% !important; /* or any value that fits your needs */
	}
</style>
@endpush

@push('scripts')
<!-- Chosen -->
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".chosen-select").chosen({width: "100%", disable_search_threshold: 10});
	});
</script>
@endpush