<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DSR;
use App\Schedule;
use Session;

class DSRController extends Controller
{
    public function index()
    {
        $data = array(
            'dsrs' => DSR::with(['schedule', 'schedule.client', 'schedule.client.agent'])->orderBy('id', 'desc')->get()
        );
        return view('dsrs.index', $data);
    }

    public function create()
    {
        $data = array(
            'schedules' => Schedule::where('status', 1)->orderBy('id', 'desc')->get()
        );
        return view('dsrs.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'schedule_id' => 'required',
            'release_order' => 'required',
            'publishing_date' => 'required',
            'mr_no' => 'required',
            'cheque_no' => 'required',
            'cheque_date' => 'required',
        ]);

        if ($validated == true) {
            $dsr = new DSR();
            $dsr->schedule_id = $request->schedule_id;
            $dsr->release_order = $request->release_order;
            $dsr->publishing_date = $request->publishing_date;
            $dsr->mr_no = $request->mr_no;
            $dsr->bill_no = date('y') . mt_rand(100000, 999999);
            $dsr->cheque_no = $request->cheque_no;
            $dsr->cheque_date = $request->cheque_date;
            $dsr->remarks = $request->remarks;

            if ($dsr->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'DSR added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('dsrs');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('dsrs/create');
        }
    }

    public function show(DSR $dsr)
    {
        $data = array(
            'dsr' => $dsr
        );
        return view('dsrs.show', $data);
    }

    public function edit(DSR $dsr)
    {
        $data = array(
            'schedules' => Schedule::where('status', 1)->orderBy('id', 'desc')->get(),
            'dsr' => DSR::with(['schedule'])->find($dsr->id)
        );
        return view('dsrs.edit', $data);
    }

    public function update(Request $request, DSR $dsr)
    {
        $validated = $request->validate([
            'schedule_id' => 'required',
            'release_order' => 'required',
            'publishing_date' => 'required',
            'mr_no' => 'required',
            'cheque_no' => 'required',
            'cheque_date' => 'required',
        ]);

        if ($validated == true) {
            $dsr->schedule_id = $request->schedule_id;
            $dsr->release_order = $request->release_order;
            $dsr->publishing_date = $request->publishing_date;
            $dsr->mr_no = $request->mr_no;
            $dsr->cheque_no = $request->cheque_no;
            $dsr->cheque_date = $request->cheque_date;
            $dsr->remarks = $request->remarks;

            if ($dsr->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'DSR updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('dsrs');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('dsrs/create');
        }
    }

    public function destroy(DSR $dsr)
    {
        if ($dsr->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'DSR deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('dsrs');
    }

    public function print(DSR $dsr)
    {
        $data = array(
            'dsr' => $dsr
        );
        return view('dsrs.print', $data);
    }
}