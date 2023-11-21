<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use Session;

class AgentController extends Controller
{
    public function index()
    {
        $data = array(
            'agents' => Agent::orderBy('id', 'desc')->get()
        );
        return view('agents.index', $data);
    }

    public function create()
    {
        $data = array();
        return view('agents.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validated == true) {
            $agent = new Agent();
            $agent->name = $request->name;
            $agent->address = $request->address;
            $agent->phone = $request->phone;
            $agent->status = $request->status;

            if ($agent->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Agent added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('agents');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('agents/create');
        }
    }

    public function show(Agent $agent)
    {
        $data = array(
            'agent' => $agent
        );
        return view('agents.show', $data);
    }

    public function edit(Agent $agent)
    {
        $data = array(
            'agent' => $agent
        );
        return view('agents.edit', $data);
    }

    public function update(Request $request, Agent $agent)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validated == true) {
            $agent->name = $request->name;
            $agent->address = $request->address;
            $agent->phone = $request->phone;
            $agent->status = $request->status;

            if ($agent->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Agent updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('agents');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('agents/' . $agent->id . '/edit');
        }
    }

    public function destroy(Agent $agent)
    {
        if ($agent->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Agent deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('agents');
    }
}
