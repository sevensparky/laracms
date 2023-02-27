<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     *  display all users for admin
     * 
     * @param \App\Models\User $users
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        if (Gate::allows('view', $users)) {
            $users = User::latest()->paginate();
            return view('admin.layouts.users.all', compact('users'));
        }

        abort(403, 'شما دسترسی به این صفحه را ندارید');
    }

    /**
     * destroy user for admin
     * 
     * @param \App\Models\User $users
     * @return \Illuminate\Http\Response 
     */
    public function destroy(User $user)
    {
        if (Gate::allows('view', $user)) {
            $user->delete();
            session()->flash('success', 'حذف کاربر با موفقیت صورت گرفت');
            return redirect(route('users.index'));
        }
        abort(403, 'شما دسترسی به این صفحه را ندارید');
    }

    /**
     * change role of user by admin
     * 
     * @param \App\Models\User $users
     * @return \Illuminate\Http\Response
     */
    public function changeRole(User $user)
    {
        if (Gate::allows('view', $user)) {
            if (auth()->user()->role ==  'admin') {
                $user->update(['role' => 'admin']);
                session()->flash('success', 'نقش کاربر با موفقیت تغییر یافت');
                return redirect(route('users.index'));
            }
            return redirect(RouteServiceProvider::HOME);
        }
        abort(403, 'شما دسترسی به این صفحه را ندارید');
    }

    /**
     * display edit profile
     * 
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('admin.layouts.pages.edit-profile', [
            'user' => auth()->user()
        ]);
    }

    /**
     * update profile information by user
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|string',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        $user = User::query()->whereId(auth()->id())->first();
        $user->update(array_merge($request->only('name'), [
            'image' => CommonService::pictureUpload($request, 'image', $user->image)
        ]));

        toast('اطلاعات با موفقیت ثبت شد', 'success')->autoClose(3000);
        return to_route('profile');
    }
}
