<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role == 1) {
                return $next($request);
            } else {
                return redirect('dashboard');
            }
        });
    }

    public function index()
    {
        $data = array(
            'admins' => User::orderBy('id', 'asc')->get()
        );
        return view('admins.index', $data);
    }

    public function create()
    {
        $data = array();
        return view('admins.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['string', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        if ($validated == true) {
            $admin = new User();
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->email = $request->email;
            $admin->username = $request->username;
            $admin->role = $request->role;
            $admin->password = Hash::make($request->password);

            if ($admin->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Admin added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admins');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admins/create');
        }
    }

    public function show(User $admin)
    {
        $data = array(
            'admin' => $admin
        );
        return view('admins.show', $data);
    }

    public function edit(User $admin)
    {
        $data = array(
            'admin' => $admin
        );
        return view('admins.edit', $data);
    }

    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin->id],
            'username' => ['string', 'max:255', 'unique:users,username,' . $admin->id],
            'role' => ['required']
        ]);

        if ($validated == true) {
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->email = $request->email;
            $admin->username = $request->username;
            $admin->role = $request->role;
            $admin->password = $request->password ? Hash::make($request->password) : $admin->password;

            if ($admin->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Admin updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admins');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admins/' . $admin->id . '/edit');
        }
    }

    public function destroy(User $admin)
    {
        if ($admin->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Admin deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('admins');
    }
}
