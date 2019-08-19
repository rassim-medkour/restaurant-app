<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(Request $data)
    {
        $adminn = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'adress' => $data['adress'],
            'job_title' => $data['job_title'],
            'password' => Hash::make($data['password']),
        ]);
        $admin = Admin::where('email', $adminn->email)->first();

        switch ($adminn->job_title) {
            case 'manager':
                $admin->roles()->attach(Role::where('id', '2')->first());
                break;
            case 'admin':
                $admin->roles()->attach(Role::where('id', '1')->first());
                break;
            case 'caissier':
                $admin->roles()->attach(Role::where('id', '4')->first());
                break;
            case 'cuisinier':
                $admin->roles()->attach(Role::where('id', '3')->first());
                break;
            default:
                # code...
                break;
        }

        return redirect()->back();
    }

    public function showCreateForm()
    {
        return view('auth.admin-create');
    }

}
