@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">the courses</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">course Name</th>
                                <th scope="col">the teacher</th>
                                <th scope="col">the users</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <th scope="row">{{$course->name}}</th>
                                    <td scope="row">
{{--                                        <div class="form-group">--}}
{{--                                            <div class="col-sm-10">--}}

{{--                                                <select class="form-control" id="exampleFormControlSelect1">--}}
{{--                                                    @foreach($users as $user)--}}
{{--                                                        @if($user->hasRole('teacher') != null)--}}
{{--                                                            <option > {{$user->name}}</option>--}}
{{--                                                        @endif--}}

{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
                                        {{$course->teacher}}
                                    </td>
                                    <td scope="row">
                                        <a class="" href="{{route('courses.users',['id' => $course->id])}}">
                                            Show users
                                        </a>
{{--                                        <div class="form-group">--}}
{{--                                            <label for="mjn"></label>--}}
{{--                                            <select class="form-control" name="users" >--}}
{{--                                                @foreach($course->users as $user)--}}
{{--                                                    <option >{{$user->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                    </td>

                                </tr>
                            @endforeach

                            <a class="" href="{{route('courses.create')}}">
                                Add new course
                            </a>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


