@extends('layouts.app')

@section('content')

    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    <div class="container">
        @if(count($tasks) == 0)

            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                Hiç bir göreviniz yok. Eklemek için <a href="{{ url('addTasks' )}}"><strong>tıklayın..</strong></a>
            </div>

@endif
    @if(count($tasks)> 0)


        <div class="col-md-12">
                <div class="row">
                    <a href="{{ url('addTasks' )}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="false"> Ekle</span></button></a>
            </div>
            <br>
            <div class="row">
        <div class=" panel panel-default">
            <div class="panel-heading">
                Güncel Görevler
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Görev</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <img width="120" height="120" style="border-radius: 100px" src="{{$task->task_picture}}"></img>
                            </td>
                            <!--- Task Name -->
                            <td class="table-text">
                                <div>{{$task->name}}</div>
                            </td>

                            <td>

                                <!--- TODO: Delete Button -->
                                <form action="{{url('task/'.$task->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}

                                    <button id="delete-task-{{$task->id}}" class="btn btn-danger" type="submit">
                                        <i class="fa fa-btn fa-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </div>
        @endif
@endsection