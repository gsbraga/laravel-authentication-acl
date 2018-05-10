<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Moodle\Controllers;


use LaravelAcl\Moodle\Models\Moodles;
use LaravelAcl\Course\Models\Courses;

use Validator;
use Illuminate\View\View;
use LaravelAcl\Authentication\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, App, Config;

class MoodleController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Moodles();
    }

    public function getList()
    {
        $moodles = $this->model->get();
        foreach ($moodles as $key => $moodle){

            $url = $moodle->url . "/api-monit/funcoes_api.php?type=qtd_users_online";

            $qtd = json_decode(file_get_contents($url));
            $moodles[$key]->users_online = $qtd;
        }



        return \view('laravel-authentication-acl::moodle.list', compact('moodles'));
    }

    function getCoursesList(Request $request)
    {
        $moodle_id = $request->get('id');
        if($moodle_id != null){
            $courses = Courses::where('moodle_id', '=', $moodle_id)->get();

        }else{
            $courses = Courses::get();
        }

        return \view('laravel-authentication-acl::moodle.courses-list', compact('courses'));
    }



}