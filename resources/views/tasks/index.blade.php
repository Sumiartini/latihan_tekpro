@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Task
                </div>

        <div class="panel-body">
        {{-- Display validation error --}}
        

        {{-- New Task form --}}
        <form action="{{ url('tasks')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        {{-- Task name --}}
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Name : </label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="">
            </div>
        </div>

        {{-- Add Task Button --}}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                Add Task
                </button>
            </div>
        </div>

        </form>
            
            </div>
        </div>
    </div>

    {{-- current task --}}
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
            Daftar Task
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>
                        <form class="form" method="get" action="{{ route('search') }}">
                            <div class="form-group mb-0">
                                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="input keyword">
                                <button type="submit" class="btn btn-primary mb-1">search</button>
                            </div>
                        </form>
                    </th>
                    
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td class="table-text"><div>{{$task->name}}</div></td>
                    {{-- Task Delete Button --}}
                    <td>
                        <form action="{{url('task/' . $task->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                            Delete
                            </button>
                        </form>                       
                    </td>
                </tr>   
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        @endif  
</div>
</div>

@endsection