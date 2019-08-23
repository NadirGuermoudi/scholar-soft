@extends('layouts.master')

@section('content')

	<p> &nbsp; welcome back {{Auth::guard('enseignant	')->user()->nom}} </p>

@endsection