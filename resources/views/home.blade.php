@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Task 1</div>


                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="..." alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Task Detail 1</h4>
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading">Task 2</div>

                <div class="panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="..." alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Task Detail 2</h4>
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
