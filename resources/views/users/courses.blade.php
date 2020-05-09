
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">create posts</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($courses as $course)
                                <li class="list-group-item"> course name: {{$course->name}}
                                    , the teacher : {{$course->teacher}}
                                    <a id="" class="nav-link" href="#" role="button" >
                                        join <span class="caret"></span>
                                    </a>
                                    <a id="" class="nav-link" href="#" role="button" >
                                        Show <span class="caret"></span>
                                    </a>
                                </li>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


