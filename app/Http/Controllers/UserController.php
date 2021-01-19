<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    
    /*
     * show Display all users
    */
    public function index(User $users)
    {
        if (Gate::allows('view',$users)) {
        $users = User::latest()->paginate();
        return view('cms.users.index',compact('users'));
        }

        abort(403,'شما دسترسی به این صفحه را ندارید');
    }


    /*
    *  delete user
    */

    public function destroy(User $user)
    {
        if(Gate::allows('view',$user)){
        $user->delete();
        session()->flash('success','حذف کاربر با موفقیت صورت گرفت');
        return redirect(route('users.index'));
        }
        abort(403,'شما دسترسی به این صفحه را ندارید');
    }

    
    /*
     *  change role of user 
     */

    public function changeRole(User $user)
    {
        if (Gate::allows('view',$user)) {
            if (auth()->user()->role ==  'admin') {
                $user->update(['role' => 'admin']);
                session()->flash('success','نقش کاربر با موفقیت تغییر یافت');
                return redirect(route('users.index'));
            }
            return redirect(RouteServiceProvider::PANEL);
        }
        abort(403,'شما دسترسی به این صفحه را ندارید');
    }
}
