<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function profile()
    {
        $info = User::first();

        return view('backend.profile', compact('info'));
    }

    // public function updateProfile(Request $request)
    // {
    //     // return $request;

    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string',
    //         'email' => 'required|string|email',
    //         'old_password' => 'required|string|min:8',
    //         'new_password' => 'nullable|string|min:8',
    //         'confirm_password' => 'nullable|string|min:8',
    //     ]);

    //     if ($validator->fails()) {
    //         $errors = $validator->errors();

    //         return back()->with('inlineerror', $errors)->withInput();
    //     }

    //     $user = User::where('type', User::TYPE_ADMIN)->first();
    //     // return $user->password;
    //     // return Hash::check($request->old_password, $user->password) ?? false;

    //     // if (Hash::check($request->old_password, $user->password)) {
    //     //     return 'Password is correct!';
    //     // } else {
    //     //     return 'Password is incorrect.';
    //     // }

    //     // return [Hash::make($request->old_password), $user->password];
    //     // if (Hash::make($request->old_password) != $user->password) {
    //     if (! Hash::check($request->old_password, $user->password)) {
    //         return back()->with('inlineerror1', ' Incorrect password!')->withInput();
    //     }

    //     if ($request->new_password && $request->new_password != $request->confirm_password) {
    //         return back()->with('inlineerror2', 'New password does not match!')->withInput();
    //     }

    //     // return $request;
    //     $user->email = $request->email;
    //     $user->name = $request->name;
    //     if ($request->new_password) {
    //         $user->password = Hash::make($request->new_password);
    //     }
    //     $user->save();
    //     if ($user) {
    //         return back()->with('success', 'Profile Updated Successfully.');
    //     }

    //     return back()->with('error', 'Failed to update your profile.');
    // }

    // public function flushDatabase()
    // {
    //     // dd('asd');

    //     DB::table('users')->truncate();
    //     DB::table('carts')->truncate();
    //     DB::table('inquiries')->truncate();
    //     DB::table('orders')->truncate();
    //     DB::table('reservations')->truncate();
    //     DB::table('user_orders')->truncate();

    //     DB::table('users')->create([
    //         'name' => 'admin',
    //         'email' => 'admin@admin.com',
    //         'email_verified_at' => now(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //         'remember_token' => Str::random(10),
    //         'type' => User::TYPE_ADMIN,
    //     ]);

    //     return ['status' => true, 'msg' => 'Database flushed!'];
    // }
}
