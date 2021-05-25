<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $table = 'Employees';
    protected $primaryKey = 'employees_id';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
}
