
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">create posts</div>
                    <div class="card-body">
                        <ul class="list-group">
{{--                            {{dd($course->image)}}--}}
                            <img src="uploads/courses/{{$course->image}}" class="img-rounded" alt="Responsive image" >
                            <img asset="{{$course->image}}" class="img-fluid" alt="Responsive image">
                            <li class="list-group-item">course name: {{$course->name}}</li>
                            <li class="list-group-item">course name: {{$course->teacher}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


