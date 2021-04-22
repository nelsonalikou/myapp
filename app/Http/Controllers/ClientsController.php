<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function list(){
        $clients =  Client::status();    //Client::all();
        $entreprises = Entreprise::all();
        return view('clients.index',compact('clients','entreprises'));
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required|integer',
            'entreprise_id' => 'required|integer'
        ]);
        //dd($data);
        Client::create($data);

        /*$name = request('name');
        $email = request('email');
        $status = request('status');
        //dd($pseudo);

        $client = new Client();
        $client->name = $name;
        $client->email = $email;
        $client->status = $status;
        $client->save();*/

        return back();
    }
}
