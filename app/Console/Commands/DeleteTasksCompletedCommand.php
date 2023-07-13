<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tasks;

class DeleteTasksCompletedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:deleteCompleted';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eliminar las tareas finalizadas hace 7 días o  mas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = now()->subDays(7);

        Tasks::whereDate('completed_at', '<=', $date )->update(['deleted_at' => now()]);

    }

    
}
