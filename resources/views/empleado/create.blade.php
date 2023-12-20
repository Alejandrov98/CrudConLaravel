
<!-- completamos el id para las intrcucciones con js -->

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data"> <!-- laravel nos pide que usemos un identificado o llave de seguridad para saber que viene del mimos sistema, lo usaMOS ABAJO -->
@csrf
@include('empleado.form');


</form>
