<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Student;


class StudentController extends Controller {

    public function index() {
        $studentDB = array();
        $i = 0;
        foreach (Student::all() as $student) {
            $id = $student->id;
            $studentDB[$i]["id"] = $student->id;
            $studentDB[$i]["nick"] = $student->nick;
            $studentDB[$i]["name"] = $student->name;
            $studentDB[$i]["kattis"] = $student->kattis;
            $studentDB[$i]["image"] = $student->image;
            $studentDB[$i]["country_iso2"] = $student->country_iso2;
            $studentDB[$i]["country_iso3"] = $student->country_iso3;
            $studentDB[$i]["scores"] = array();

            $studentDB[$i]["scores"]["mc"] = array_sum(array_slice((array) DB::table('mcs')->where('student_id', $id)->first(), 2, 9));
            $studentDB[$i]["scores"]["tc"] = array_sum(array_slice((array) DB::table('tcs')->where('student_id', $id)->first(), 2, 2));
            $studentDB[$i]["scores"]["hw"] = array_sum(array_slice((array) DB::table('hws')->where('student_id', $id)->first(), 2, 10));
            $studentDB[$i]["scores"]["pb"] = array_sum(array_slice((array) DB::table('pbs')->where('student_id', $id)->first(), 2, 9));
            $studentDB[$i]["scores"]["ks"] = array_sum(array_slice((array) DB::table('kss')->where('student_id', $id)->first(), 2, 12));
            $studentDB[$i]["scores"]["ac"] = array_sum(array_slice((array) DB::table('acs')->where('student_id', $id)->first(), 2, 9));

            $i++;
        }

        return view('index')->with('studentDB', $studentDB);
    }

    public function detail($id) {
        $student = Student::where('id', $id)->first();
        $scores = array();
        $scores["mc"] = array_filter(array_slice((array) DB::table('mcs')->where('student_id', $id)->first(), 2, 9));
        $scores["tc"] = array_filter(array_slice((array) DB::table('tcs')->where('student_id', $id)->first(), 2, 2));
        $scores["hw"] = array_filter(array_slice((array) DB::table('hws')->where('student_id', $id)->first(), 2, 10));
        $scores["pb"] = array_filter(array_slice((array) DB::table('pbs')->where('student_id', $id)->first(), 2, 9));
        $scores["ks"] = array_filter(array_slice((array) DB::table('kss')->where('student_id', $id)->first(), 2, 12));
        $scores["ac"] = array_filter(array_slice((array) DB::table('acs')->where('student_id', $id)->first(), 2, 9));
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

        DB::table('students')->insert([
            'nick' => $nick,
            'name' => $name,
            'kattis' => $kattis,
            'image' => $image,
            'country_iso2' => $country,
            'country_iso3' => $iso3_codes[$country],
        ]);

        $id = DB::table('students')->max('id');

        DB::table("mcs")->insert(["student_id" => $id]);
        DB::table("tcs")->insert(["student_id" => $id]);
        DB::table("hws")->insert(["student_id" => $id]);
        DB::table("pbs")->insert(["student_id" => $id]);
        DB::table("kss")->insert(["student_id" => $id]);
        DB::table("acs")->insert(["student_id" => $id]);

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
