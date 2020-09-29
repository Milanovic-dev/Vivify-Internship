<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function open() {
        $data = "This data is open for all users";
        return response()->json(compact('data'), 200);
    }

    public function closed() {
        $data = "This data is open for all users";
        return response()->json(compact('data'), 200);
    }
}
