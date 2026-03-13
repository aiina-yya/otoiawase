<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index ()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','tel1','tel2','tel3','address','building','contact_type','content']);

        return view('contact.confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
            'gender',
            'email',
            'address',
            'building',
            'contact_type',
            'content'
            ]);

            $contact['name'] = implode('',[
                $request->last_name,
                $request->first_name
            ]);

            $contact['tel'] =implode('-',[
                $request->tel1,
                $request->tel2,
                $request->tel3
            ]);

            Contact::create($contact);

        return view('contact.thanks');

    }
}


