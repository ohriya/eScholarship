@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Applicants Information
                </div>
            </div><br>
            <div class="card">
                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <th>Applicant User ID</th>
                            <th>Applicant Name</th>
                            <th>Applicant Email</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                            @if($profile->user->has_applied==1)
                                <tr>
                                    <td>{{$profile->id}}</td>
                                    <td>{{$profile->user->name}}</td>
                                    <td>{{$profile->user->email}}</td>
                                    @if($profile->user->is_admin == 0 && $profile->user->id)
                                        <td><a href="/user/{{$profile->user->id}}"><button class="btn btn-sm btn-dark">Info</button></a></td>
                                    @elseif($profile->user->is_admin == 1)
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
            </div><br>
        </div>
    </div>
</div>
@endsection