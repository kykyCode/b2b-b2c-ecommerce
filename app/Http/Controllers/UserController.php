<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = Auth::user();

        $avatarName = $user->id . '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        $avatarPath = 'users/avatars/' . $avatarName;

        $request->file('avatar')->storeAs('public', $avatarPath);

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $avatarPath;
        $user->save();

        $appUrl = env('APP_URL', 'http://localhost');
        $fullAvatarUrl = $appUrl . Storage::url($user->avatar);

        return response()->json([
            'message' => 'Avatar uploaded successfully!',
            'avatar_url' => $fullAvatarUrl,
        ]);
    }

    public function updateDepartments(Request $request)
    {
        $request->validate([
            'department_ids' => 'required|array',
            'department_ids.*' => 'exists:departments,id',
        ]);

        $user = Auth::user();

        $user->departments()->sync($request->department_ids);

        return response()->json([
            'message' => 'Departments updated successfully!',
            'department_ids' => $request->department_ids,
        ]);
    }

    public function userDepartments()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json($user->departments()->get());
        }
    }

    public function updateDefaultAddress(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $validatedData = $request->validate([
                'first_name' => 'string|max:255',
                'last_name' => 'string|max:255',
                'email' => 'string|max:255',
                'zip' => 'string|max:10',
                'city' => 'string|max:255',
                'country' => 'string|max:255',
                'last_name' => 'string|max:255',
                'first_name' => 'string|max:255',
                'phone_number' => 'string|max:20',
                'address_line_1' => 'string|max:255',
                'address_line_2' => 'string|max:255',
            ]);

            $user->update(['default_address_data' => $validatedData]);
            return response()->json(['message' => 'Default address updated successfully.']);
        }
    }
}
