<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller {

    public function index() {
        return view('index');
    }

    public function detail($id) {
        $data['id'] = $id;
        return view('detail', $data);
    }
}
?>
