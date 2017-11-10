<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    //
    public function editor() {
        return view('admin.editor');
    }
}
