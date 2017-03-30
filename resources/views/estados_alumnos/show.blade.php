@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Estados_alumno</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Estados_alumno    </div>

    <div class="panel-body">
                

        <form action="{{ url('/estados_alumnos') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
            <div class="col-sm-6">
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$model['descripcion'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/estados_alumnos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection