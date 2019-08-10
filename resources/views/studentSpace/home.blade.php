@extends('layouts.master')

@section('content')

	<p> &nbsp; welcome back {{Auth::guard('etudiant')->user()->nom}} </p>

@endsection