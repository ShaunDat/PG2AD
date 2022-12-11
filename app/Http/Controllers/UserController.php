<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('user')->latest()->get();
        return view('users.index',compact('users'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = User::latest()->get();
        return view('users.create',compact('user'));
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::findOrFail($id);
        return view('users.edit')->with('user',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(!empty($request['password'])){
            $users['password'] = Hash::make($request['password']);
        }
        return redirect(route('users.index'))->with('success', 'User update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
        return redirect()->route('users.index');
    }


    // code user old


    function showProfile(){
        return view('profile.show_profile');
    }

    /**
     * Update admin profile info
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    function updateProfile(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .Auth::user()->id,
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $update = $user->update($request->all());

        if ($update){
            return back()->with('success', 'Profile update successfully');
        }else{
            return back()->with('error', 'Profile could not be update');
        }
    }

    /**
     * @return Factory|View
     */
    function changePassword(){
        return view('auth.passwords.change_password');
    }

    /**
     * Update admin password
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    function updatePassword(Request $request){

        $this->validate($request, [
            'password' => 'required|min:8|confirmed'
        ]);

        $data = [];
        $data['password'] = Hash::make($request->password);

        $update_password = User::where('id', Auth::user()->id)
            ->update($data);

        if ($update_password){
            return redirect(url('/'))->with('success', 'Password update successfully');
        }else{
            return redirect(url('/'))->with('error', 'Profile could not be update');
        }
    }
}
