@extends('layouts.master', ['title' => 'Enseignants'])
@include('layouts/partials/#tableExport')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-block">

                        <h4 class="card-title">
                            Liste des enseignants
                        </h4>

                        <h6 class="card-subtitle">
                            Exporter les données en Copy, CSV, Excel, PDF ou Imprimer
                        </h6>

                        <div class="table-responsive m-t-40">

                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
																	 cellspacing="0" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date-Naissance</th>
                                    <th>Grade</th>
                                    <th>Admin</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <div>
                                        <button type="button" class="btn  btn-success btn-block btn-md"
                                                data-toggle="modal" data-target="#add-teacher">
                                            <i class="fa fa-plus">
                                                Ajouter un enseignant
                                            </i>
                                        </button>

                                        {{-- including the add Modal --}}
                                        @include('adminSpace/teachers/modals/addModal')

                                        <br>


                                    </div>
                                </tr>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date-Naissance</th>
                                    <th>Grade</th>
                                    <th>Admin</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>

                                </tfoot>
                                <tbody>
                                @foreach($enseignants as $enseignant)
                                    <tr>
                                        <td>
                                            {{$enseignant->matricule}}
                                        </td>

                                        <td>
                                            {{$enseignant->nom}}
                                        </td>

                                        <td>
                                            {{$enseignant->prenom}}
                                        </td>

                                        <td>
                                            {{$enseignant->date_naissance}}
                                        </td>

                                        <td>
                                            {{$enseignant->grade}}
                                        </td>

                                        <td>
                                            @if($enseignant->admin == 1)
                                                oui
                                            @else
                                                non
                                            @endif
                                        </td>

                                        <td>
                                            {{$enseignant->email}}
                                        </td>

                                        <td>


                                            <button type="button" class="btn btn-outline-info" data-toggle="modal"
																										data-target="#edit-enseignant{{$enseignant->id}}">
                                                <i class="fa fa-edit">
                                                </i>
                                            </button>
                                            {{-- including the edit Modal --}}
                                            @include('adminSpace/teachers/modals/editModal')


                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#delete-enseignant{{$enseignant->id}}">
                                                <i class="fa fa-times">
                                                </i>
                                            </button>
                                            {{-- including the delete Modal --}}
                                            @include('adminSpace/teachers/modals/deleteModal')
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
@endsection
