<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeCreateRequest;

class UserController extends Controller
{
    /**
     * Displays the form for creating an employee.
     *
     */
    public function create()
    {
        $this->authorize('create', auth()->user());
        return view('employees.create');
    }

    /**
     * Creating a user.
     *
     * @var $request
     */
    public function store(EmployeeCreateRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'manager_id' => auth()->user()->id,
        ]);
        $role = Role::where('name', 'employee')->firstOrCreate(['name' => 'employee']);
        $user->roles()->attach($role);

        return redirect()->route('posts');
    }
}
