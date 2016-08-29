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
use App\Http\Requests;

use Intervention\Image\Facades\Image as Image;


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
        $file = $request->file('profile_picture');

        $url = $request ->name.'.jpg';
        Image::make($file)->save($url);

        $request->user()->create([
            'name' => $request ->name,
            'profile_picture' => $url,
            'email' => $url,
        ]);
        //$user->profile_picture = $request->url;
        //$user->name = $request->name;
        //$user->email = $request->email;
        //$user->save();

        return view('auth.profile')->with('user',$user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);



        $request->user()->tasks()->create([
            'name' => $request ->name,
            'task_picture' => $url,
        ]);
        return redirect('/tasks');
    }
}