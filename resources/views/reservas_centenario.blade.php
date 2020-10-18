@extends ('layouts.header')

@section('content')
<body>

    <div class="container-fluid">
        <h1 class="mt-4">Reservas Centenario</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Salon Bella Santa Cruz Cosmetics & Spa Centenario</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Reservas para hoy día</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Hora</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Hora</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($reserves as $reserve)
                            <tr>
                                <td>{{$reserve->client_name}}</td>
                                <td>{{$reserve->phone}}</td>
                                <td>{{$reserve->service_name}}</td>
                                <td>{{$reserve->time}}</td>
                                <td>
                                    <form action="{{route('reserves3.destroy',$reserve->id)}}" method="post">
                                        {{ csrf_field() }}
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

</body>
@endsection