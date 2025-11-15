@extends ('layouts.header')

@section('content')


<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Editar telefonos</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
      <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Verifica los datos.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('phones.update',1)}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono Principal:</strong>
                        <input type="text" name="phone" value="{{$branches[0]->phone}}" maxlength="20" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{route('phones.update',2)}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono Centro:</strong>
                        <input type="text" name="phone" value="{{$branches[1]->phone}}" maxlength="20" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{route('phones.update',3)}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono Centenario:</strong>
                        <input type="text" name="phone" value="{{$branches[2]->phone}}" maxlength="20" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

      </div>
      <!-- /.card-body -->

</div>

@endsection