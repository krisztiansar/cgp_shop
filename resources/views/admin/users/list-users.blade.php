@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">Propducts</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        {{ Form::open(array('route' => 'edit-manager', 'method' => 'get')) }}
                                        <a style="color: darkorange" data-toggle="modal" data-target="#modal{{ $user->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="modal{{ $user->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $user->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="userName">Name</label>
                                                            <input type="text" name="user_name" value="{{ $user->name }}" class="form-control" id="userName">
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="password">{{ __('Password') }}</label>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                        <a href="delete-manager/{{ $user->id }}" style="color: darkred" onclick="return confirm('Are you sure you want to delete this shop manager?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
