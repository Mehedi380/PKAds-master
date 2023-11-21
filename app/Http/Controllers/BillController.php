<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DSR;

class BillController extends Controller
{
    public function index()
    {
        $data = array(
            'dsrs' => DSR::with(['schedule', 'schedule.client', 'schedule.client.agent'])->orderBy('id', 'desc')->get()
        );
        return view('bills.index', $data);
    }

    public function print(DSR $dsr)
    {
        $data = array(
            'dsr' => $dsr
        );
        return view('bills.print', $data);
    }
}