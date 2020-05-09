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
                                @if ($course->name == $teacher)
                                    <li class="list-group-item">{{$course->teacher}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


