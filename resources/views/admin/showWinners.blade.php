@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Winners') }}</div>

                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->scholarship_status == 1)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        @if($user->is_admin == 0 && $user->profile_id)
                                            <td><a href="/user/{{$user->id}}"><button class="btn btn-sm btn-dark">Info</button></a></td>
                                        @elseif($user->is_admin == 1)
                                            <td><button class="btn btn-sm btn-dark">Admin</button></td>
                                        @else
                                        <td></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
