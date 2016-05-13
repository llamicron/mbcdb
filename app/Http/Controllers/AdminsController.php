<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Badge;
use App\District;
use App\Council;
use DB;
use App\User;
use App\Http\Requests;

class AdminsController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin');
    }

    public function manageUsers()
    {
      $users = User::get();
      return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
      $counselors = $user->counselors;
      return view('users.show', compact('user', 'counselors'));
    }

    public function showDelete(User $user)
    {
      return view('users.delete', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect('/users/manageUsers');
    }
    
}
