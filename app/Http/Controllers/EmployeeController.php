<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Events\EmployeeDeleted;


class EmployeeController extends Controller
{
    public function index()
    {
        // Retrieve all employees
        $employees = Employee::all();

        // Return the view with the employees data
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        // Return the view for creating a new employee
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'national_id' => 'required',
            'position' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
        ]);

        // Create a new employee record
        Employee::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        // Return the view for editing the specified employee
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'national_id' => 'required',
            'position' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
        ]);

        // Update the employee record
        $employee->update($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        // Delete the employee record
        $employee->delete();

        // Dispatch the EmployeeDeleted event
        EmployeeDeleted::dispatch($employee);

        // Redirect to the index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
