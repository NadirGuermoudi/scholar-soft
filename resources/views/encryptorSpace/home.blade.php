@extends('layouts.master')

@section('content')

<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-block">

	<div class="mx-auto text-center">
		<h2 class="text-center my-0">Bienvenue</h2>
		<h1 class="text-center">{{ Auth::guard('encryptor')->user()->fullName }}</h1>
	</div>

	<br>

	<div class="row">
		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-success">
		<div class="box bg-success text-center">
			<h1 class="font-light text-white">{{ $encrypted }}</h1>
			<h6 class="text-white">Mes paquets codée</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-info">
		<div class="box bg-info text-center">
			<h1 class="font-light text-white">{{ $notHolded }}</h1>
			<h6 class="text-white">Paquets non pris</h6>
		</div>
		</div>
		</div>


		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-warning">
		<div class="box bg-warning text-center">
			<h1 class="font-light text-white">{{ $notEncrypted }}</h1>
			<h6 class="text-white">Mes paquets non codée</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-warning">
		<div class="box bg-warning text-center">
			<h1 class="font-light text-white">{{ $notEncryptedAll }}</h1>
			<h6 class="text-white">Paquets non codée</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-success">
		<div class="box bg-success text-center">
			<h1 class="font-light text-white">{{ $encryptedAll }}</h1>
			<h6 class="text-white">Paquets codée</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-danger">
		<div class="box bg-danger text-center">
			<h1 class="font-light text-white">{{ $notHoldedLate }}</h1>
			<h6 class="text-white">Paquets non pris en retard</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-danger">
		<div class="box bg-danger text-center">
			<h1 class="font-light text-white">{{ $notEncryptedLate }}</h1>
			<h6 class="text-white">Mes paquets non codée en retard</h6>
		</div>
		</div>
		</div>

		<div class="col-md-6 col-lg-3 col-xlg-3">
		<div class="card card-inverse card-danger">
		<div class="box bg-danger text-center">
			<h1 class="font-light text-white">{{ $notEncryptedAllLate }}</h1>
			<h6 class="text-white">Paquets non codée en retard</h6>
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