@extends('layouts.master')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">

	<div class="mx-auto text-center">
		<h2 class="text-center my-0">Bienvenue</h2>
		<h1 class="text-center">{{ Auth::guard('enseignant')->user()->fullName }}</h1>
	</div>

	<br>

	<div class="row">
		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-success">
		<div class="box bg-success text-center">
			<h1 class="font-light text-white">{{ $seances }}</h1>
			<h6 class="text-white">Séances</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-info">
		<div class="box bg-info text-center">
			<h1 class="font-light text-white">{{ $cours }}</h1>
			<h6 class="text-white">Cours</h6>
		</div>
		</div>
		</div>


		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-warning">
		<div class="box bg-warning text-center">
			<h1 class="font-light text-white">{{ $td }}</h1>
			<h6 class="text-white">TD</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-primary">
		<div class="box bg-primary text-center">
			<h1 class="font-light text-white">{{ $tp }}</h1>
			<h6 class="text-white">TP</h6>
		</div>
		</div>
		</div>

	</div>


</div>
</div>
</div>
</div>
</div>

@endsection