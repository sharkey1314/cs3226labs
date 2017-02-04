<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller {

    private $studentDB;

    public function __construct() {
        $this->studentDB = unserialize(file_get_contents('../students.txt'));
    }

    public function index() {
        return view('index')->with('studentDB', $this->studentDB);
    }

    public function detail($id) {
        $data = $studentDB[$id - 1];
        return view('detail', $data);
    }
}
?>
