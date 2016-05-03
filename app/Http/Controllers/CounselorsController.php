<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counselor;
use App\Http\Requests;

class CounselorsController extends Controller
{
    public function index()
    {
      $counselors = Counselor::get();
      return view('counselors.index', compact('counselors'));
    }
}
