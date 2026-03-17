<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index ()
    {
        $categories = Category::all();

        return view('contact.index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();

        $category = Category::find($request->category_id);

        $contact['name'] = $request->last_name . ' ' . $request->first_name;

        $contact['tel'] = $request->tel1 . '-' .$request->tel2 . '-' . $request->tel3;

        return view('contact.confirm', compact('contact','category'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

            $contact['name'] = implode(' ',[
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


