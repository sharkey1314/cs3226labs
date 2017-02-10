<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller {

    private $studentDB;

    public function __construct() {
        $this->studentDB = unserialize(file_get_contents('../students.txt'));
    }

    public function index() {
        return view('index')->with('studentDB', $this->studentDB);
    }

    public function detail($id) {
        $student = $this->studentDB[$id - 1];
        return view('detail')->with('student', $student)->with('id', $id);
    }

    public function create() {
        return view('create');
    }

    public function check(Request $request) {
        $rules = [
            'nick' => 'required|min:5|max:30',
            'name' => 'required|min:5|max:30',
            'kattis' => 'required|min:5|max:30',
            'country' => 'required'
        ];

        $messages = [
            'nick.required' => 'Every awesome people has a nick name.',
            'nick.min' => 'Your nick name may be awesome but it\'s too bloody damn short!',
            'nick.max' => 'Your nick name may be awesome but it\'s too bloody damn long!!!!!',
            'name.required' => 'You have a name don\'t you ?!',
            'name.min' => 'Your name is too damn short!',
            'name.max' => 'Unless your name is Uvuvwevwevwe Onyetenyevwe Ugwemuhwem Osas, it\'s too bloody damn long!!!!!',
            'kattis.required' => 'Every awesome people also has a Kattis account.',
            'kattis.min' => 'Your Kattis account name is too short and that\'s just not right!',
            'kattis.max' => 'Your Kattis account name is too long and that\'s just not right!',
            'country.required' => 'Oi what\'s your nationality lah. Don\'t be shy.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('create')->withErrors($validator)->withInput();
        } else {
            $nick = $request->input('nick');
            $name = $request->input('name');
            $kattis = $request->input('kattis');
            $country = $request->input('country');
            return $this->store($nick, $name, $kattis, $country);
        }
    }

    private function store($nick, $name, $kattis, $country) {
        return '<p>' . $nick . ' ' . $name . ' ' . $kattis . ' ' . $country . '</p>';
    }

    /*public function changeImage() {

        for ($i = 0; $i < count($this->studentDB); $i++) {
            $this->studentDB[$i]["nick"] = strtolower($this->studentDB[$i]["nick"]);
            $this->studentDB[$i]["image"] = "/img/icons/" . ($this->studentDB[$i]["nick"]) . ".png";
        }

        $string = serialize($this->studentDB);
        $fn = "../students.txt";
        $fh = fopen($fn, 'w');
        fwrite($fh, $string);
        fclose($fh);
    }*/
}
?>
