<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function home()
    {
        return view('app');
    }


    public function search()
    {
        $search = request()->query('search');
        $posts =  Post::where('title', 'LIKE', "%{$search}%")->get();

        return view('search', compact('posts'));
    }


    public function single(Post $post)
    {
        $comments = $post->comments()->where('status', 'accepted')->get();
        return view('single', compact('post', 'comments'));
    }


    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        Comment::create(array_merge(['user_id' => auth()->user()->id], $request->only('commentable_id', 'commentable_type', 'comment')));
        toast('نظر شما باموفقیت ثبت شد منتظر تایید مدیران باشید', 'success', 'bottom-right')->autoClose(3000);
        return back();
    }


    public function changePassword()
    {
        return view('auth.passwords.change-password');
    }

    public function authChangePassword(Request $request)
    {
        $password = auth()->user()->password;
        $oldPassword = $request->oldPassword;
        $newPassword = $request->password;
        $confirm = $request->password_confirmation;

        if (Hash::check($oldPassword, $password)) {
            if ($newPassword === $confirm) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                toast('رمز عبور با موفقیت تغییر کرد', 'success', 'bottom-right')->autoClose(3000);
                return redirect(route('login'));
            } else {
                toast('رمز عبور با تایید آن مطابقت ندارد', 'error', 'bottom-right')->autoClose(3000);
                return back();
            }
        } else {
            toast('رمز عبور فعلی صحیح نمی باشد', 'error', 'bottom-right')->autoClose(3000);
            return back();
        }
    }
}
