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

class AdminsController extends Controller {

    public function __construct() {
      $this->middleware('admin');
    }

    public function confirmAdmin() {
      if(\Auth::user()->isAdmin) {
        $users = User::get();
        return view('users.index', compact('users'));
      }
    }

    public function show(User $user) {
      return view('users.show', compact('user'));
    }

    public function confirmRemoval(User $user) {
      $item = "user";
      return view('warnings.confirmRemoval', compact('user', 'item'));
    }

    public function delete(User $user) {
      if ($user->isAdmin == 0) {
        $user->delete();
        return redirect('/admin');
      } else {
        return view('warnings.notOwner');
      }
    }

    public function setAdminWarning(User $user) {
      return view('warnings.confirmSetAdmin', compact('user'));
    }

    public function setAdmin(User $user) {
      $user->isAdmin = 1;
      $user->save();
      return redirect('admin-login');
    }

    public function home() {
      return redirect('/admin');
    }

}
