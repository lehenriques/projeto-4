<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Contact $contact)
    {
        $contacts = Contact::with('email')->whereId($contact->id)->first();

        return view('email.home', compact('contacts'));
    }

    public function create(Contact $contact)
    {
        return view('email.create', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'         => 'required|email',
            'contact_id'        => 'required',
        ]);

        Email::create($request->all());

        return redirect()->route('contact.email', ['contact' => $request->contact_id])
                        ->with('success','Telefone cadastrado com sucesso.');
    }

    public function destroy(Email $email, Contact $contact)
    {
        $email->delete();

        return redirect()->route('contact.email', ['contact' => $contact])
                        ->with('success','E-mail deletado com sucesso');
    }
}
