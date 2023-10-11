<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria; // Asegúrate de importar el modelo de Sucursal
use App\Http\Controllers\GaleriaRequest;

class GaleriaController extends Controller
{
    public function index()
    {   // Mostrar una lista de todas las sucursales

        $galerias = Galeria::all();
        return view('administracion.vistas.galeria.index', compact('galerias'));
    }

    public function create()
    {
        return view('galerias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'imagen' => 'required', // Ajusta según tus necesidades
            'empresa' => 'required',
            'sucursal' => 'required',
        ]);
    
        // Guardar la imagen en el sistema de archivos
        $imagenPath = $request->file('imagen')->store('public/images');
    
        // Obtener solo el nombre del archivo, sin la ruta completa
        $nombreImagen = basename($imagenPath);
    
        // Crear la galería en la base de datos con la ruta de la imagen
        Galeria::create([
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'imagen' => $nombreImagen,
            'empresa' => $request->empresa,
            'sucursal' => $request->sucursal,
        ]);
    
        return redirect()->route('galerias.index')->with('success', 'Galería creada con éxito.');
    }

    public function show(Galeria $galeria)
    {
        return view('galerias.show', compact('galeria'));
    }

    public function edit(Galeria $galeria)
    {
        return view('galerias.edit', compact('galeria'));
    }

    public function update(Request $request, Galeria $galeria)
    {
        // Lógica para actualizar la galería
        // Asegúrate de manejar la carga de imágenes si es necesario

        $galeria->update($request->all());

        return redirect()->route('galerias.index')->with('success', 'Galería actualizada con éxito.');
    }

    public function destroy(Galeria $galeria)
    {
        // Lógica para eliminar la galería
        $galeria->delete();

        return redirect()->route('galerias.index')->with('success', 'Galería eliminada con éxito.');
    }
}
