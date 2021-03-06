<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Moodle\Controllers;


use Illuminate\Support\Facades\DB;
use LaravelAcl\Authentication\Interfaces\AuthenticateInterface;
use LaravelAcl\Course\Models\UsersCourses;
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

    public function getList(AuthenticateInterface $auth)
    {
        $user = $auth->getLoggedUser();
        $moodles = $this->model->get();
        foreach ($moodles as $key => $moodle){

            $url = $moodle->url . "/api-monit/funcoes_api.php?type=qtd_users_online";

            $qtd = json_decode(file_get_contents($url));
            $moodles[$key]->users_online = $qtd;
        }



        return \view('laravel-authentication-acl::moodle.list', compact('moodles', 'user'));
    }

    public function getListDashboards()
    {
        return \view('laravel-authentication-acl::moodle.dashboards-list', compact('moodles'));
    }

    function getCategoriesList(Request $request, AuthenticateInterface $auth)
    {
        $user = $auth->getLoggedUser();
        $moodle_id = $request->get('id');
        if($moodle_id == null && session('moodle_id') != null){
            $moodle_id = session('moodle_id');
        }else if($moodle_id == null && session('moodle_id') == null){
            return redirect('/dashboards/moodles');
        }

        $moodle = $this->model->find($moodle_id);

        $courses = [];

        if($moodle_id != null){
            session(['moodle_id' => $moodle_id]);
            $course = new UsersCourses();
            $courses = $course->cursos($user->id, $moodle_id);

        }
//            $url = $moodle->url . "/api-monit/funcoes_api.php?type=cursos_moodle";
//
//            $courses = json_decode(file_get_contents($url));


        return \view('laravel-authentication-acl::moodle.categories-list', compact('courses', 'moodle'));
    }

    function getCoursesList(Request $request)
    {
        $id = $request->get('id');
        $category_id = $request->get('curso');
        if($category_id != null){
            $curso_info = Courses::find($id);

        }else{
            return redirect('/dashboards/moodles');
        }

        return \view('laravel-authentication-acl::admin.course.courses-list', compact('curso_info'));
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

    function getMoodleAccess(Request $request, AuthenticateInterface $auth)
    {

        $moodle_id = $request->get('id');

        if($moodle_id == null){
            $moodle_id = session('moodle_id');
        }
        $moodle = Moodles::find($moodle_id);

        $user = $auth->getLoggedUser();

        $course = new UsersCourses();
        $courses = $course->cursos($user->id, $moodle_id);


        return \view('laravel-authentication-acl::moodle.dashboard-access', compact('moodle', 'courses'));
    }

    function getMoodleUserAccess(Request $request, AuthenticateInterface $auth)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->first();

        }

        $moodle_id = $request->get('id');
        if($moodle_id == null){
            $moodle_id = session('moodle_id');
        }
        $moodle = Moodles::find($moodle_id);

        $user = $auth->getLoggedUser();

        $course = new UsersCourses();
        $courses = $course->cursos($user->id, $moodle_id);

        return \view('laravel-authentication-acl::moodle.user-access', compact('moodle', 'curso_info', 'courses'));
    }

    function getMoodleAccessCourses(Request $request)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->where('moodle_id','=', session('moodle_id'))->first();

        }

        $moodle_id = $request->get('id');
        if($moodle_id != null){
            $moodle = Moodles::find($moodle_id);
        }

        return \view('laravel-authentication-acl::moodle.courses-access', compact('moodle', 'curso_info'));
    }

    function getMoodleAccessActivity(Request $request)
    {
//        $moodle_id = $request->get('id');
//        if($moodle_id != null){
//            $moodle = Moodles::find($moodle_id);
//        }

        return \view('laravel-authentication-acl::moodle.access-activity');
    }

    function getMoodleReportActivity(Request $request)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->where('moodle_id','=', session('moodle_id'))->first();

        }

        return \view('laravel-authentication-acl::moodle.report-activity', compact('curso_info'));
    }

    function getMoodleReportForum(Request $request)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->where('moodle_id','=', session('moodle_id'))->first();

        }

        return \view('laravel-authentication-acl::moodle.report-forum', compact('curso_info'));
    }

    function getMoodleReportQuiz(Request $request)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->where('moodle_id','=', session('moodle_id'))->first();

        }

        return \view('laravel-authentication-acl::moodle.report-quiz', compact('curso_info'));
    }

    function getMoodleReportCourse(Request $request)
    {
        $curso_id = $request->get('curso');
        if($curso_id != null){
            $curso_info = Courses::where('category_id', '=', $curso_id)->where('moodle_id','=', session('moodle_id'))->first();

        }

        return \view('laravel-authentication-acl::moodle.report-course', compact('curso_info'));
    }

    function getUsersCategory(Request $request, AuthenticateInterface $auth)
    {
        $user = $auth->getLoggedUser();
        
        $moodle_id = session('moodle_id');
        

        $moodle = $this->model->find($moodle_id);

        $courses = [];
        $course = new UsersCourses();
        $courses = $course->cursos($user->id, $moodle_id);

        return \view('laravel-authentication-acl::moodle.report-category-users', compact('courses', 'moodle'));
    }

}