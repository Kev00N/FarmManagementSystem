<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employee List') }}
            </h2>
            <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add Employee
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th class="text-left">ID</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Position</th>
                                <th class="text-left">Phone Number</th>
                                <th class="text-left">National ID</th>
                                <th class="text-left">Created at</th>
                                <th class="text-left">Updated at</th>
                                <th class="text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->employee_id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ $employee->phone_no }}</td>
                                    <td>{{ $employee->national_id }}</td>
                                    <td>{{ $employee->created_at }}</td>
                                    <td>{{ $employee->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->employee_id) }}" class="btn btn-primary text-blue-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-red-500" onclick="return confirm('Are you sure you want to delete this employee?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
