<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Tasks;

class TasksFormBody extends Component
{

    private $tasks;

    /**
     * Create a new component instance.
     * @param  \App\Models\Tasks  $tasks
     * @return void
     */
    public function __construct($tasks =  null)
    {
        //
        if( is_null($tasks)){
            $tasks = Tasks::make([]);
        }
        $this->tasks[0] = $tasks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'tasks' => $this->tasks,
        ];

        return view('components.tasks-form-body', $params);
    }
}
