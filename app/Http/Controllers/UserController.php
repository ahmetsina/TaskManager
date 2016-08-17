<?php
/**
 * Created by PhpStorm.
 * User: ahmetsina
 * Date: 17/08/16
 * Time: 09:55
 */

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();

        return view('auth.profile')->with('user',$user);
    }


    public function update(Request $request)
    {
        $auth = \Auth::user();

        $user = User::find($auth->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return view('auth.profile')->with('user',$user);
    }
}