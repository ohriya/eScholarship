@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User : {{$user->name}} : Info</div>

                <div class="card-body">
                    <div class="float-right mr-5">
                        <a target="_blank" href="/{{$user->profile->your_photo}}">
                            <img src="/{{$user->profile->your_photo}}" alt="{{$user->profile->your_photo}}"
                            style="border: 1px solid #ddd;
                                    border-radius: 4px;
                                    padding: 5px;
                                    width: 150px;">
                        </a>
                    </div>
                    <table class="table table-light">
                        <tbody>
                            <tr>
                                <td><strong>User ID</strong></td>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td>{{ $user->profile->gender }}</td>
                            </tr>
                            <tr>
                                <td><strong>Permanent Address</strong></td>
                                <td>{{ $user->profile->perma_address }}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth (A.D.)</strong></td>
                                <td>{{ $user->profile->dob }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone Number</strong></td>
                                <td>{{ $user->profile->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>High School Name</strong></td>
                                <td>{{ $user->profile->high_school_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>High School GPA</strong></td>
                                <td>{{ $user->profile->high_school_gpa }}</td>
                            </tr>

                            <tr>
                                <td><strong>Caste</strong></td>
                                <td>{{ $user->profile->caste }}</td>
                            </tr>

                            <tr>
                                <td><strong>Parent Govt. ID</strong></td>
                                <td>{{ $user->profile->parent_id }}</td>
                            </tr>
                            
                            <tr>
                                <td><strong>Citizenship Front</strong></td>
                                <td><a target="_blank" href="/{{$user->profile->citizenship_front}}">
                                        <img src="/{{$user->profile->citizenship_front}}" alt="{{$user->profile->citizenship_front}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Citizenship Back</strong></td>
                                <td><a target="_blank" href="/{{$user->profile->citizenship_back}}">
                                        <img src="/{{$user->profile->citizenship_back}}" alt="{{$user->profile->citizenship_back}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Marksheet Copy</strong></td>
                                <td><a target="_blank" href="/{{$user->profile->marksheet_photo}}">
                                        <img src="/{{$user->profile->marksheet_photo}}" alt="{{$user->profile->marksheet_photo}}"
                                        style="border: 1px solid #ddd;
                                                border-radius: 4px;
                                                padding: 5px;
                                                width: 150px;">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
