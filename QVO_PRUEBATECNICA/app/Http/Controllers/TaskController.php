<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /// Metodo que muestra las tardeas de los usuarios y filtra por Fecha de finalizacion.
    public function index()
    {
        $user = auth()->user();
        $tasks = Task::where('user_id', $user->id)
        ->orderby('due_date', 'asc')
        ->where('completed', false)
        ->paginate(5);
        
        return view('dashboard', compact('tasks'));
    }

    /// Funcion para ir a la pagina de create.
    public function create()
    {
        return view('create');
    }

    ///Metodo que se encarga de conectar con create.blade para 
    //enviar los datos a la base de datos.
    public function store(Request $request){
        $tasks = new Task();
        $user = auth()->user();

        $tasks->user_id = $user->id;
        $tasks->title = $request->post('title');
        $tasks->description = $request->post('description');
        $tasks->due_date = $request->post('due_date');
        $tasks->completed = false;
        $tasks->created_at = now();
        $tasks->save();
        
        //Realiza las acciones luego de guardar datos, en este caso ir al metodo de enviar correo
        $emailController = new EmailController();
        $emailController->enviarCorreo();

        return redirect()-> route("dashboard")->with("success","Agregado con exito!");
    }

    //Metodo que busca el usuario y actualiza la tarea
    public function update($id){
        $tasks = Task::find($id);
        $tasks ->completed = true;
        $tasks->save();

        //Realiza las acciones luego de marcar una tarea como pendiente (En este caso enviar correo)
        $emailController = new EmailController();
        $emailController->enviarCorreo();

        return redirect()-> route("dashboard")->with("success","Actualizado con exito!");
    }
}
