
@extends('layouts.app')

@section('content')
    @include('common.errors')
    <div class="panel-body">


        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task Picture</label>
                <div class="col-sm-6">
                    <input type="file" name="task_picture"  id="task_picture" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name"  id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection