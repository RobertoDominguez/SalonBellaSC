@extends ('layouts.header')

@section('content')
<body>

    <div class="container-fluid">
        <h1 class="mt-4">Reservas Centro</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Salon Bella Santa Cruz Cosmetics & Spa Centro</li>
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
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Hora</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($reserves as $reserve)
                            <tr>
                                <td>{{$reserve->client_name}}</td>
                                <td>{{$reserve->phone}}</td>
                                <td>{{$reserve->service_name}}</td>
                                <td>{{$reserve->time}}</td>
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