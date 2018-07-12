<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Moodle\Controllers;


use Illuminate\Support\Facades\DB;
use LaravelAcl\Moodle\Models\Moodles;
use LaravelAcl\Course\Models\Courses;

use LaravelAcl\User;
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

    function getCategoriesList(Request $request)
    {
        $moodle_id = $request->get('id');
        $moodle = $this->model->find($moodle_id);
        $courses = [];
        if($moodle_id != null){
            $courses = Courses::where('moodle_id', '=', $moodle_id)->get();

        }
//            $url = $moodle->url . "/api-monit/funcoes_api.php?type=cursos_moodle";
//
//            $courses = json_decode(file_get_contents($url));


        return \view('laravel-authentication-acl::moodle.categories-list', compact('courses'));
    }

    function getCoursesList(Request $request)
    {
        $id = $request->get('id');
        $category_id = $request->get('category_id');
        if($category_id != null){
            $category = Courses::find($id);

        }else{
            $category = null;
        }

        return \view('laravel-authentication-acl::admin.course.courses-list', compact('category'));
    }

    function getMoodleDashboard(Request $request)
    {
        $moodle_id = $request->get('id');
        if($moodle_id != null){
            $courses = Courses::where('moodle_id', '=', $moodle_id)->get();

        }else{
            $courses = Courses::get();
        }
        $chart = new AvaDashboard;

        return \view('laravel-authentication-acl::moodle.dashboard', compact('chart'));
    }

    function getMoodleAccess(Request $request)
    {
        $moodle_id = $request->get('id');
        if($moodle_id != null){
            $moodle = Moodles::find($moodle_id);
        }

        return \view('laravel-authentication-acl::moodle.dashboard-access', compact('moodle'));
    }

}