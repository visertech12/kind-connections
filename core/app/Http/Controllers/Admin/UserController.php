<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = 'Users';
        $users = User::when(request('search'), function ($q) {
                $s = request('search');
                $q->where(function ($q) use ($s) {
                    $q->where('firstname', 'like', "%$s%")
                      ->orWhere('lastname',  'like', "%$s%")
                      ->orWhere('email',     'like', "%$s%")
                      ->orWhere('username',  'like', "%$s%");
                });
            })
            ->when(request('status') !== null && request('status') !== '', fn($q) => $q->where('status', request('status')))
            ->latest()
            ->paginate(15);

        return view('admin.users.index', compact('pageTitle', 'users'));
    }

    public function detail($id)
    {
        $user      = User::with(['transactions', 'deposits', 'withdrawals', 'referrals', 'loginLogs'])->findOrFail($id);
        $pageTitle = 'User Detail';
        return view('admin.users.detail', compact('pageTitle', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'nullable|unique:users,mobile,' . $user->id,
            'status' => 'required|in:0,1',
        ], [
            'mobile.unique' => 'This mobile number is already used by another user.',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email     = $request->email;
        $user->mobile    = $request->mobile;
        $user->status    = $request->status;
        $user->ev        = $request->ev ?? $user->ev;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }
}
