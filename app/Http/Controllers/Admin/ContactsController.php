<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Newsletter;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contactsIndex()
    {
        $contacts = Contact::all();
        return view('admin.pages.contact.index')->with('contacts',$contacts);
    }

    public function contactDetails($id)
    {
        $contact = Contact::where('id',$id)->get();
        return view('admin.pages.contact.show')->with('contact',$contact);
    }

    public function newsletterList()
    {
        $news = Newsletter::all();
        return view('admin.pages.newsletter.index')->with('news',$news);
    }
}
