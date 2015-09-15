<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class ExampleController extends Controller
{
    public function index() {
        $user = User::find(1);
        //if (Auth::attempt(['email' => 'john@clivern.com', 'password' => 'secret'])) {
        //    // Authentication passed...
        //    return 'auth::attempt passed...!!!';
        //}

        //if ($user->is('admin')) {
        //    return "I am admin...!!!!!!";
        //}

        //Auth::logout();

        return "hello...";
    }
}
