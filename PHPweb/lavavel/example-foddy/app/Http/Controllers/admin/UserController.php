<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * danh sách nhân viên.
     */
    public function index()
    {
        //hiển thị danh sách tài khoản
        $users = User::whereIn('role', ['admin', 'staff'])->orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function customers()
    {
        //hiển thị danh sách khách hàng
        $users = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        return view('admin.user.customers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //hiển thị form tạo tài khoản mới
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //lưu database
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Thêm tài khoản thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'nullable|in:admin,staff,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if (Auth::user()->role === 'admin') {
            $user->role = $request->input('role', $user->role);
        }

        $user->save();
        ///kiểm tra nếu là user thì chuyển về trang khách hàng
        if ($user->role === 'user') {
            return redirect()->route('admin.customers.index')->with('success', 'Cập nhật khách hàng thành công!');
        }

        return redirect()->route('admin.user.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //xóa tài khoản
        if ($user->is(Auth::user())) {
            return back()->with('error', 'Bạn không thể tự xóa chính mình!');
        }
        $user->delete();
        return back()->with('success', 'Đã xóa tài khoản!');
    }
}
