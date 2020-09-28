<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function testGet() {
        return '200 Returned';
    }

    public function testCreate() {
        return '201 Created';
    }

    public function testUpdate() {
        return '200 Updated';
    }

    public function testPatch() {
        return '200 Patched';
    }

    public function testDelete() {
        return '200 Deleted';
    }

    public function hello() {
        return view('hello')->with('first_name', 'Nikola');
    }
}
