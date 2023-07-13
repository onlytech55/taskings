<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user());
         //Administrador
        if( auth()->user()->profile_id == 1) 
            $tareas = Tasks::all();

        else
            $tareas = Tasks::where('user_id', auth()->user()->id )->get();

        return view("tasks.index", ["tareas"=>$tareas]);

        // return view("tasks.index", compact($tareas));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("tasks.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);
        Tasks::create([
            'title' => $request->string('title'),
            'description' => $request->string('description'),
            'user_id'   => auth()->id(),
        ]);
        
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit($tarea)
    {
        //
        // dd($tarea);
        $tasks = Tasks::where('id', $tarea)->get();
        return view("tasks.edit", ["tasks"=>($tasks)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTasksRequest  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTasksRequest $request, $tasks)
    {
        //
        // dd($tasks);

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);
        // Tasks::update([
        //     'title' => $request->string('title'),
        //     'description' => $request->string('description'),
        //     'user_id'   => auth()->id(),
        // ]);
        //Invoices::where('id', $id)->update($request->all());
        Tasks::where('id', $id)->update($request->all());


        return redirect()->route('tasks.index');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTasksRequest  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function actualizar(TasksRequest $request, $tasks)
    {
        //

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);
        Tasks::update([
            'title' => $request->string('title'),
            'description' => $request->string('description'),
            'user_id'   => auth()->id(),
        ]);
        // Invoices::where('id', $id)->update($request->all());
        // Tasks::where('id', $id)->update($request->all());


        return redirect()->route('tasks.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
        // dd($tasks);
        $tasks->delete();
        return redirect()->route('tasks.index');

    }

    public function completed(Tasks $tasks)
    {
        //
        // dd($tasks);
        $timestamp = Carbon::now()->toDateTimeString();
        // dd($timestamp);
        
        Tasks::where('id', $tasks->id)->update(['completed_at' => $timestamp]);
        return redirect()->route('tasks.index');

    }

}
