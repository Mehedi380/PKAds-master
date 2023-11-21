<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Client;
use Session;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = array(
            'schedules' => Schedule::with(['client'])->orderBy('id', 'desc')->get()
        );
        return view('schedules.index', $data);
    }

    public function create()
    {
        $data = array(
            'clients' => Client::where('status', 1)->orderBy('name', 'asc')->get()
        );
        return view('schedules.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial' => 'required',
            'client_id' => 'required',
            'page_no' => 'required',
            'advt_size' => 'required',
            'mode' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]);

        if ($validated == true) {
            $schedule = new Schedule();
            $schedule->serial = $request->serial;
            $schedule->client_id = $request->client_id;
            $schedule->page_no = $request->page_no;
            $schedule->advt_size = $request->advt_size;
            $schedule->mode = $request->mode;
            $schedule->type = $request->type;
            $schedule->repeat_from = $request->repeat_from;
            $schedule->amount = $request->amount;
            $schedule->remarks = $request->remarks;
            $schedule->status = $request->status;

            if ($schedule->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Schedule added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('schedules');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('schedules/create');
        }
    }

    public function show(Schedule $schedule)
    {
        $data = array(
            'schedule' => $schedule
        );
        return view('schedules.show', $data);
    }

    public function edit(Schedule $schedule)
    {
        $data = array(
            'clients' => Client::where('status', 1)->orderBy('name', 'asc')->get(),
            'schedule' => Schedule::with(['client'])->find($schedule->id)
        );
        return view('schedules.edit', $data);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'serial' => 'required',
            'client_id' => 'required',
            'page_no' => 'required',
            'advt_size' => 'required',
            'mode' => 'required',
            'type' => 'required',
            'amount' => 'required'
        ]);

        if ($validated == true) {
            $schedule->serial = $request->serial;
            $schedule->client_id = $request->client_id;
            $schedule->page_no = $request->page_no;
            $schedule->advt_size = $request->advt_size;
            $schedule->mode = $request->mode;
            $schedule->type = $request->type;
            $schedule->repeat_from = $request->repeat_from;
            $schedule->amount = $request->amount;
            $schedule->remarks = $request->remarks;
            $schedule->status = $request->status;

            if ($schedule->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Schedule updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('schedules');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('schedules/' . $schedule->id . '/edit');
        }
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Schedule deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('schedules');
    }
}
