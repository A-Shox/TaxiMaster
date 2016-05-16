@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Accounts
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-fw fa-users"></i> View accounts
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-8 col-lg-offset-2">
            <ul class="list-group">
                @foreach(\App\User::where('isActive', true)->get() as $user)
                    <li class="list-group-item">
                        <div style="height: 30px; line-height: 30px;">
                            <a href="/accounts/view/{{$user->id}}" >{{$user->firstName . ' ' . $user->lastName}}</a>
                            <button class="btn btn-danger pull-right" style="margin-left: 5px;" data-toggle="modal" data-target="#deleteModal_{{$user->id}}">Delete</button>
                            <a href="/accounts/edit/{{$user->id}}" class="btn btn-info pull-right" role="button">Edit</a>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_{{$user->id}}" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Delete user</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to delete user {{$user->firstName}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button onclick="deleteUser({{$user->id}})" type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        deleteUser = function (id) {
            $.get('/accounts/delete/' + id, function () {
                $('#deleteModal_' + id).modal('hide');
                window.location.reload();
            })
        }
    </script>

@stop