<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Course\Controllers;


use Illuminate\View\View;
use LaravelAcl\Authentication\Controllers\Controller;
use LaravelAcl\Course\Models\Courses;
use LaravelAcl\Http\Requests\Request;

class CourseController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Courses();
    }

    public function getList()
    {
        $courses = $this->model->all();
//        return response($courses, 200);

        return View::make('laravel-authentication-acl::admin.course.list')->with(["courses" => $courses]);
    }

}