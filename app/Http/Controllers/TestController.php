<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function index(){
        $users = DB::select('select * from users');

        var_dump($users);
    }
}
