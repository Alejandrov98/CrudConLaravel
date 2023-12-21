<h1>{{$modo}} empleado</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>

        @foreach( $errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>



@endif

<div class="form-group">

    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" id="Nombre"
        value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}">

</div>

<div class="form-group">
    <label for="ApellidoPaterno">Apellido Paterno</label>
    <input type="text" class="form-control" name="ApellidoPaterno" id="ApellidoPaterno"
        value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno')  }}">

</div>

<div class="form-group">
    <label for="ApellidoMaterno">Apellido Materno</label>
    <input type="text" class="form-control" name="ApellidoMaterno" id="ApellidoMaterno"
        value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}">

</div>

<div class="form-group">

    <label for="Correo">Correo</label>
    <input type="text" class="form-control" name="Correo" id="Correo"
        value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}">

</div>


<div class="form-group">
    <label for="Foto">Foto</label>

    <input type="file" class="form-control" name="Foto" id="Foto" value="">
    @if(isset($empleado->Foto))
    <img class="img-thumbnail img-fluid" width="100" src="{{ asset('storage').'/'.$empleado -> Foto }}" alt="">
    <!-- primer arg es la carpeta de almacenamiento y depspues le pasamos el identificador -->
    @endif
    <br />

</div>

<input class="btn btn-success" type="submit" value="{{$modo}}">
<a class="btn btn-primary" href="{{ url('empleado/') }}"> Volver</a>
