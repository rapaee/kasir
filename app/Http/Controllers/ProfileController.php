<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editProfile(Request $request): View
    {
        return view('user.in-ed.edit-profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    // Mengisi data yang divalidasi ke user
    $request->user()->fill($request->validated());

    // Reset email verification jika email diubah
    if ($request->user()->isDirty('email')) {
        $request->user()->email_verified_at = null;
    }

    // Jika pengguna memasukkan password baru, update password
    if ($request->filled('password')) {
        $request->user()->password = bcrypt($request->input('password'));
    }

    // Simpan perubahan
    $request->user()->save();

    return Redirect::route('User.home')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
