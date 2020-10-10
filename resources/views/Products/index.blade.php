@extends ('layouts.header')

@section('content')
            <div class="card card-secondary">
                <div class="card-header">
                <h3 class="card-title">Productos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                    <div class="container">      
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Productos</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->price.' Bs.' }}</td>
                                                <td>
                                                    <form action="{{route('products.destroy',$product->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Editar</a>
                                                        <button type="submit" class="btn btn-danger" >Eliminar</button>
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
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-warning" href="{{route('products.create')}}">Agregar</a>
                </div>
            </div>
@endsection