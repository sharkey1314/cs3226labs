<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Score;


class StudentController extends Controller {

    public function index() {
        $students = Student::all();
        $scoresDB = array();
        foreach(Score::all() as $score) {
            $mcs = array_map("floatval", array_filter(explode(",", $score->mc), "is_numeric"));
            $tcs = array_map("floatval", array_filter(explode(",", $score->tc), "is_numeric"));
            $hws = array_map("floatval", array_filter(explode(",", $score->hw), "is_numeric"));
            $pbs = array_map("floatval", array_filter(explode(",", $score->pb), "is_numeric"));
            $kss = array_map("floatval", array_filter(explode(",", $score->ks), "is_numeric"));
            $acs = array_map("floatval", array_filter(explode(",", $score->ac), "is_numeric"));
            $scoresDB[] = [
                'student_id' => $score->student_id,
                'mc' => $mcs,
                'tc' => $tcs,
                'hw' => $hws,
                'pb' => $pbs,
                'ks' => $kss,
                'ac' => $acs,
            ];
        }
        return view('index')->with('students', $students)->with('scoresDB', $scoresDB);
    }

    public function detail($id) {
        $student = Student::where('id', $id)->first();
        $score = Score::where('student_id', $id)->first();
        $mcs = explode(",", $score->mc);
        $tcs = explode(",", $score->tc);
        $hws = explode(",", $score->hw);
        $pbs = explode(",", $score->pb);
        $kss = explode(",", $score->ks);
        $acs = explode(",", $score->ac);
        $scores = [
            'mc' => $mcs,
            'tc' => $tcs,
            'hw' => $hws,
            'pb' => $pbs,
            'ks' => $kss,
            'ac' => $acs,
        ];
        return view('detail')->with('student', $student)->with('scores', $scores);
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
            $image = '/img/icons/default.png';

            $file = $request->file('image');
            if ($file) {
                $destinationPath = 'img/icons/';
                $filename = $nick . ".png";
                $file->move($destinationPath, $filename);
                $image = '/' . $destinationPath . $filename;
            }
            return $this->store($nick, $name, $kattis, $country, $image);
        }
    }

    private function store($nick, $name, $kattis, $country, $image) {

        $iso3_codes = json_decode(file_get_contents('../iso3.json'), true);

        $student = Student::create([
            'nick' => $nick,
            'name' => $name,
            'kattis' => $kattis,
            'image' => $image,
            'country_iso2' => $country,
            'country_iso3' => $iso3_codes[$country],
        ]);

        $id = $student->id;

        Score::create([
            'student_id' => $id,
        ]);

        return Redirect::to('student/' . $id);
    }

    private function updateDB() {
        $string = serialize($this->studentDB);
        $fn = "../students.txt";
        $fh = fopen($fn, 'w');
        fwrite($fh, $string);
        fclose($fh);
    }

    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();

        return Redirect::to('/');
    }

    /*public function fillscores() {
        foreach (Student::all() as $student) {
            $id = $student->id;

            $mcs = (array_slice((array) DB::table('mcs')->where('student_id', $id)->first(), 2, 9));
            $tcs = (array_slice((array) DB::table('tcs')->where('student_id', $id)->first(), 2, 2));
            $hws = (array_slice((array) DB::table('hws')->where('student_id', $id)->first(), 2, 10));
            $pbs = (array_slice((array) DB::table('pbs')->where('student_id', $id)->first(), 2, 9));
            $kss = (array_slice((array) DB::table('kss')->where('student_id', $id)->first(), 2, 12));
            $acs = (array_slice((array) DB::table('acs')->where('student_id', $id)->first(), 2, 8));

            $mcs = $this->implodeToString($mcs, "x.y");
            $tcs = $this->implodeToString($tcs, "xy.z");
            $hws = $this->implodeToString($hws, "x.y");
            $pbs = $this->implodeToString($pbs, "x");
            $kss = $this->implodeToString($kss, "x");
            $acs = $this->implodeToString($acs, "x");

            Score::create([
                'student_id' => $id,
                'mc' => $mcs,
                'tc' => $tcs,
                'hw' => $hws,
                'pb' => $pbs,
                'ks' => $kss,
                'ac' => $acs,
            ]);
        }
    }

    /*public function implodeToString($arr, $def) {
        $keys = array_keys($arr);
        $str = "";
        for ($i = 0; $i < count($arr); $i++) {
            if (!isset($arr[$keys[$i]])) {
                $str .= $def . ",";
            } else {
                $str .= $arr[$keys[$i]] . ",";
            }
        }
        return rtrim($str, ",");
    }*/

    /*public function removetests() {
        unset($this->studentDB[count($this->studentDB) - 1]);
        array_values($this->studentDB);
        $this->updateDB();
    }*/

/*    public function filltable() {

        for ($i = 0; $i < 50; $i++) {
            $scores = $this->studentDB[$i]["scores"];
            DB::table('acs')->insert([
                'student_id' => $i + 1,
                '01' => $scores["ac"][0],
                '02' => $scores["ac"][1],
                '03' => $scores["ac"][2],
            ]);
        }

    }*/
}
?>
