<?php

namespace App\Models;

use App\Events\EmployeeDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'national_id',
        'position',
        'name',
        'phone_no',
    ];
}
