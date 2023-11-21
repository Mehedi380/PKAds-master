<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Agent;
use Session;

class ClientController extends Controller
{
    public function index()
    {
        $data = array(
            'clients' => Client::with(['agent'])->orderBy('id', 'desc')->get()
        );
        return view('clients.index', $data);
    }

    public function create()
    {
        $data = array(
            'agents' =>  Agent::where('status', 1)->orderBy('name', 'asc')->get()
        );
        return view('clients.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'category' => 'required',
            'agent_id' => 'required',
            'phone' => 'required',
        ]);

        if ($validated == true) {
            $client = new Client();
            $client->name = $request->name;
            $client->address = $request->address;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->category = $request->category;
            $client->agent_id = $request->agent_id;
            $client->status = $request->status;

            if ($client->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Client Added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('clients');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            // return redirect('clients/create');
            return redirect()->back()->withInput();
        }
    }

    public function show(Client $client)
    {
        $data = array(
            'client' => $client
        );
        return view('clients.show', $data);
    }

    public function edit(Client $client)
    {
        $data = array(
            'client' => $client,
            'agents' =>  Agent::where('status', 1)->orderBy('name', 'asc')->get()
        );
        return view('clients.edit', $data);
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'category' => 'required',
            'agent_id' => 'required',
            'phone' => 'required',
        ]);

        if ($validated == true) {
            $client->name = $request->name;
            $client->address = $request->address;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->category = $request->category;
            $client->agent_id = $request->agent_id;
            $client->status = $request->status;

            if ($client->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Client updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('clients');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('clients/' . $client->id . '/edit');
            //return redirect()->back()->withInput()->withErrors();
        }
    }

    public function destroy(Client $client)
    {
        if ($client->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Client deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('clients');
    }
}
