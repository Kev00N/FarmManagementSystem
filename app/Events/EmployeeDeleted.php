<?php

namespace App\Events;

use App\Models\Employee;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmployeeDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $employee;

    /**
     * Create a new event instance.
     *
     * @param  Employee  $employee
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }
}
