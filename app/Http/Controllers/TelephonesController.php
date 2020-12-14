<?php

namespace App\Http\Controllers;

use App\{Contact, Telephone, TelephoneType};
use Illuminate\Http\Request;

class TelephonesController extends Controller
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
        $contacts = Contact::with('telephones')->whereId($contact->id)->first();

        return view('telephone.home', compact('contacts'));
    }

    public function create(Contact $contact)
    {
        $types_telephones = TelephoneType::all();

        return view('telephone.create', compact(['types_telephones', 'contact']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'telephone' => 'required',
            'telephone_type_id' => 'required',
            'contact_id'        => 'required',
        ]);

        Telephone::create($request->all());

        return redirect()->route('contact.telephone', ['contact' => $request->contact_id])
                        ->with('success','Telefone cadastrado com sucesso.');
    }

    public function destroy(Telephone $telephone)
    {
        $telephone->delete();

        return redirect()->route('contact.telephone', ['contact' => $telephone->contact_id])
                        ->with('success','Usuário deletado com sucesso');
    }
}
