<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
    
$users = User::with('role')->get();
$auth =Auth::user();

$user = UserRole::where('user_id', "=", $auth->id)->first();
if($user->role_name == "admin"){
    return view('dashboard.admin.users', compact('users'));

}else{
    return view('dashboard.user.user', compact('auth'));

}
     
    }


   




    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'email' => 'required'
        ]);
        $quiz = User::findOrFail($id);
        $quiz->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back()->with('success', 'Quiz: ' . $request->name . ' updated successfully');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Quiz was deleted successfully');
    }


}
