@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje')}}
    </div>
        @endif



    <a href="{{ url('empleado/create') }}" class="btn btn-success"> Registrar nuevo empleado</a>
    <br />
    <br />
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> <!-- aca mostramos la info de DB  -->
            <tr>
                @foreach($empleados as $empleado)
                <td>{{ $empleado -> id }}</td>
                <td> <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado -> Foto }}" alt=""
                        width="100"></td>
                <!-- asset da acceso al deposito, este es llamado storage -->
                <td>{{ $empleado -> Nombre }}</td>
                <td>{{ $empleado -> ApellidoPaterno }}</td>
                <td>{{ $empleado -> ApellidoMaterno }}</td>
                <td>{{ $empleado -> Correo }}</td>
                <td>

                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{url('/empleado/'.$empleado->id ) }}" method="post">
                        <!-- Esta clase alinea los botones -->
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar"
                            class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

  {!! $empleados->links() !!}

</div>
@endsection
