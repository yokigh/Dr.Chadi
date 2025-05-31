<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang)
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($lang)
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($lang, Request $request)
    {
        $request->validate([
            'address_en' => 'required|string',
            'address_ar' => 'required|string',
            'location_url' => 'required|url',
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index', ['lang' => app()->getLocale()])->with('success', __('messages.contact_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lang, Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($lang, Request $request, Contact $contact)
    {
        $request->validate([
            'address_en' => 'required|string',
            'address_ar' => 'required|string',
            'location_url' => 'required|url',
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index', ['lang' => app()->getLocale()])->with('success', __('messages.contact_created_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index', ['lang' => app()->getLocale()])->with('success', __('messages.contact_created_successfully'));
    }
}
