<a href="{{ url('empleado/') }}"> Volver</a> <br/>
<br/>

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre: '' }}">
<br/>

<label for="ApellidoPaterno">Apellido Paterno</label>
<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno: '' }}">
<br/>

<label for="ApellidoMaterno">Apellido Materno</label>
<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno: '' }}">
<br/>

<label for="Correo">Correo</label>
<input type="text" name="Correo" id="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo: '' }}">
<br/>

<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
<img src="{{ asset('storage').'/'.$empleado -> Foto }}" alt=""> <!-- primer arg es la carpeta de almacenamiento y depspues le pasamos el identificador -->
@endif

<input type="file" name="Foto" id="Foto" value="">
<br/>

<input type="submit" value="Guardar Datos" id="Enviar">

<br/>
