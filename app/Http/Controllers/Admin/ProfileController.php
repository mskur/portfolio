<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        // Ambil profil user yang sedang login, atau buat instance baru jika belum ada
        $profile = Auth::user()->profile ?? new Profile();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $profile = $user->profile;
        $data = $request->validated();
        $data['user_id'] = $user->id;

        // Handle Photo Upload
        if ($request->hasFile('photo')) {
            if ($profile && $profile->photo && Storage::disk('public')->exists($profile->photo)) {
                Storage::disk('public')->delete($profile->photo);
            }
            $data['photo'] = $request->file('photo')->store('profile', 'public');
        }

        // Handle CV Upload (PDF)
        if ($request->hasFile('cv')) {
            if ($profile && $profile->cv && Storage::disk('public')->exists($profile->cv)) {
                Storage::disk('public')->delete($profile->cv);
            }
            $data['cv'] = $request->file('cv')->store('profile/cv', 'public');
        }

        if ($profile) {
            $profile->update($data);
        } else {
            Profile::create($data);
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}