<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Http\Requests\SocialLinkRequest;

class SocialLinkController extends Controller
{
    public function index()
    {
        // Mengurutkan berdasarkan kolom sort_order (angka terkecil tampil duluan)
        $socialLinks = SocialLink::orderBy('sort_order', 'asc')->get();
        return view('admin.social_links.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.social_links.create');
    }

    public function store(SocialLinkRequest $request)
    {
        SocialLink::create($request->validated());

        return redirect()->route('admin.social-links.index')
                         ->with('success', 'Tautan sosial berhasil ditambahkan.');
    }

    public function show(SocialLink $social_link)
    {
        return redirect()->route('admin.social-links.index');
    }

    public function edit(SocialLink $social_link)
    {
        return view('admin.social_links.edit', compact('social_link'));
    }

    public function update(SocialLinkRequest $request, SocialLink $social_link)
    {
        $social_link->update($request->validated());

        return redirect()->route('admin.social-links.index')
                         ->with('success', 'Tautan sosial berhasil diperbarui.');
    }

    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();

        return redirect()->route('admin.social-links.index')
                         ->with('success', 'Tautan sosial berhasil dihapus.');
    }
}