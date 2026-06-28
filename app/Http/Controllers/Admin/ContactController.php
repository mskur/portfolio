<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $messages = Contact::latest()->get();
        return view('admin.contacts.index', compact('messages'));
    }

    public function show(Contact $contact) {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return back()->with('success', 'Pesan dihapus.');
    }
}