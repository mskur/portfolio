<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Http\Requests\SiteSettingUpdateRequest;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::first() ?? new SiteSetting();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(SiteSettingUpdateRequest $request)
    {
        $settings = SiteSetting::first();
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($settings && $settings->logo && Storage::disk('public')->exists($settings->logo)) {
                Storage::disk('public')->delete($settings->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($settings && $settings->favicon && Storage::disk('public')->exists($settings->favicon)) {
                Storage::disk('public')->delete($settings->favicon);
            }
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        if ($settings) {
            $settings->update($data);
        } else {
            SiteSetting::create($data);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}