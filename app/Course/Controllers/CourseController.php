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
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Courses();
    }

    public function getList(Request $request)
    {
        $courses = $this->model->all();

        return \view('laravel-authentication-acl::admin.course.list', compact('courses', 'request' ));
    }

    public function editCourse(Request $request)
    {
        $id = $request->get('id');
        $course = $this->model->find($id);

        if(!isset($course)){
            $course = new Courses();
        }

        return \view('laravel-authentication-acl::admin.course.edit', compact('course'));

    }


}