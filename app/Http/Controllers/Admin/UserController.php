<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role_id' => 'required|exists:roles,id',
                'status' => 'required|in:0,1'
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->status = $request->status;
            $user->save();

            return redirect()->route('admin.users.index')
                ->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        try {
            \Log::info('Updating user', ['user_id' => $user->id, 'request_data' => $request->all()]);

            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'role_id' => 'required|exists:roles,id',
                'status' => 'required|in:0,1'
            ];

            if ($request->filled('password')) {
                $rules['password'] = 'required|string|min:8|confirmed';
            }

            $validatedData = $request->validate($rules);

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->role_id = $validatedData['role_id'];
            $user->status = $validatedData['status'];

            if ($request->filled('password')) {
                $user->password = Hash::make($validatedData['password']);
            }

            if (!$user->save()) {
                throw new \Exception('Failed to save user data');
            }

            \Log::info('User updated successfully', ['user_id' => $user->id]);

            return redirect()->route('admin.users.index')
                ->with('success', 'User updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error while updating user', [
                'user_id' => $user->id,
                'errors' => $e->errors()
            ]);
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('Error updating user', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function toggleStatus(User $user)
    {
        $user->status = !$user->status;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User status updated successfully.',
            'status' => $user->status
        ]);
    }
}
