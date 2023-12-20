<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;// gpt me parecia que debia importarlo, debo estar atento el error dice use  unkown class


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5); // guardamos en una variable empleados y paginamos a 5 items por pagina
        return view("empleado.index", $datos); //2do argumento es para pasarle la informacion
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("empleado.create"); // le damos la informacion de la vista cuando accedamos a create, hay que enlazarlo en web.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Recibe toda la informacion y la prepara para acceder o Guardar
    {
        // Obtiene todos los datos de la solicitud HTTP
        //$datosEmpleado = request()->all();

        // Vamos agarrar todsos los datos pero pedimos que quite el token de la respuesta
        $datosEmpleado = request()->except('_token');
        // para la foto
        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('upload', 'public'); //La función store toma dos argumentos:

            // Carpeta de destino ('upload'): Este es el primer argumento y representa la carpeta dentro del sistema de archivos de tu aplicación donde se almacenará el archivo. En este caso, se está utilizando la carpeta llamada 'upload'.

            // Disco de almacenamiento ('public'): Este es el segundo argumento y representa el disco de almacenamiento que se utilizará. Laravel admite varios discos de almacenamiento, y 'public' es uno de ellos. El disco 'public' generalmente está configurado para almacenar archivos accesibles de forma pública a través de HTTP.
        }
        Empleado::insert($datosEmpleado); // lo inserta de esta forma directamente en la DB

        // Devuelve los datos del empleado en formato JSON
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token', '_method']);
        if ($request->hasFile('Foto')) {
            $datosEmpleado['Foto'] = $request->file('Foto')->store('upload', 'public');
        }


        EMPLEADO::where('id', '=', $id)->update($datosEmpleado);
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //debemos saber que foto vamos a borrar
        $empleado = Empleado::findOrFail($id);
        // Si exista va a borrar la informacion en la carpeta public esa foto
        if(Storage::delete('public/'.$empleado->Foto )); {

            Empleado::destroy($id);
        }
        return redirect('empleado');
    }
}
