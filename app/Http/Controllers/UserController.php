<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){
        $users= $this->user->latest()->paginate(3);
        return view('users.index')->with('users', $users);
    }

    public function edit(){
        $user= $this->user->findOrFail(Auth::user()->id);

        return view('users.edit')->with('user', $user);
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar'=> 'mimes:jpeg, jpg ,gif, png:max:1048',
            'department' =>'required|string|max:255',
            'salary' =>'required|min:1|max:10000000',
            'email' => 'required|string|email|max:255|unique:users,email,' .Auth::user()->id,
        ]);

        $user =$this->user->findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->avatar= $request->avatar;
        $user->department= $request->department;
        $user->salary= $request->salary;
        $user->email= $request->email;


        if ($request->avatar) {
            $user->avatar= 'data:image/' . $request->avatar->extension(). ';base64,'.base64_encode(file_get_contents($request->avatar));
        }

        $user->save();

        return redirect()->route('user.index');
    }
    public function destroy($id){
        $this->user->destroy($id); 
        return redirect()->back();
    }
    public function search(Request $request){
        $users= $this->user->where('name', 'like', '%'.$request->search. '%')->get();
        return view('users.search')->with('users', $users)->with('search' ,$request->search);
    }
}
