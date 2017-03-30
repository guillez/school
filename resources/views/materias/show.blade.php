@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Materia</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Materia    </div>

    <div class="panel-body">
                

        <form action="{{ url('/materias') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-6">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$model['nombre'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="curso" class="col-sm-3 control-label">Curso</label>
            <div class="col-sm-6">
                <input type="text" name="curso" id="curso" class="form-control" value="{{$model['curso'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="orden" class="col-sm-3 control-label">Orden</label>
            <div class="col-sm-6">
                <input type="text" name="orden" id="orden" class="form-control" value="{{$model['orden'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/materias') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection