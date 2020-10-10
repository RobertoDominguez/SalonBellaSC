@extends ('layouts.header')

@section('content')
<body>

            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Editar servicio</h3>
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

                    <form action="{{ route('services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="name" value="{{$service->name}}" maxlength="50" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Descripción:</strong>
                                    <div class="input-group">
                                        <textarea name="description" class="form-control" rows="4" maxlength="300">{{$service->description}}</textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Precio:</strong>
                                    <input type="number" name="price" value="{{$service->price}}" min="1" max="999" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-primary" href="{{ route('services.index') }}">Atras</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.card-body -->

    </div>

   
</body>
@endsection