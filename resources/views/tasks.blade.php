@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   @lang('localtext.newtask')
                </div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')
                    {{Form::open(['route' => 'resource.index', 'method' => 'post'])}}
                    <div class="form-group">
                        {!! Form::label('name', trans('localtext.task'), ['class' => 'col-sm-3 control-label'] ) !!}

                        <div class="col-sm-6">
                            {{ Form::text('name', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {{ Form::button(trans('localtext.addtask'), ['type' => 'submit', 'class'=>'btn btn-default fa fa-plus']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('localtext.curtask')
                </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>@lang('localtext.task')</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->name }}</div></td>
                                    <!-- Task Delete Button -->
                                    <td>
                                        {{ Form::open(['route' => ['resource.destroy', $task->id]]) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit( trans('localtext.delete'), ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
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

