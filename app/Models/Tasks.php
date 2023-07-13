<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title', 
        'description', 
        'user_id', 
        ];


    public function is_completed(){

        return $this->completed_at == NULL ? 'Pendiente': 'Completada el: '.$this->completed_at;
    }

}
