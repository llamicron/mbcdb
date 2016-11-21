<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BugController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function submitIssue(Request $request) {
    $file = base_path('make_github_issue.py');
    $username = env('GITHUB_USERNAME');
    $password = env('GITHUB_PASSWORD');
    escapeshellarg($request->body);
    escapeshellarg($request->title);
    $return = shell_exec("/usr/bin/python {$file} \"{$request->title}\" \"{$request->body}\" {$username} {$password}");
    \Session::flash('status', $return);
    return redirect('/feedback');
  }

}
