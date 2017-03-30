@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Materia</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Materia    </div>

    <div class="panel-body">
                
        <form action="{{ url('/materias'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$model['nombre'] or ''}}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="curso" class="col-sm-3 control-label">Curso</label>
                <div class="col-sm-2">
                    <input type="number" name="curso" id="curso" class="form-control" value="{{$model['curso'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="orden" class="col-sm-3 control-label">Orden</label>
                <div class="col-sm-2">
                    <input type="number" name="orden" id="orden" class="form-control" value="{{$model['orden'] or ''}}">
                </div>
            </div>
                                                
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/materias') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection