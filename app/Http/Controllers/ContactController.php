<?php

namespace App\Http\Controllers;

use App\{Contact, TelephoneType};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
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
    public function index()
    {
        $contacts = Contact::whereUserId(Auth::id())->latest()->paginate(5);

        return view('contact.home', compact('contacts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $types_telephones = TelephoneType::all();

        return view('contact.create', compact('types_telephones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contact')
                        ->with('success','Usuário cadastrado com sucesso.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact')
                        ->with('success','Usuário deletado com sucesso');
    }
}
