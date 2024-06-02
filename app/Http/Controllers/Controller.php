<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}


// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
