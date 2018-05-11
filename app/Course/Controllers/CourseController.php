<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Course\Controllers;


use LaravelAcl\Moodle\Models\Moodles;
use LaravelAcl\Course\Models\UsersCourses;
use Validator;
use Illuminate\View\View;
use LaravelAcl\Authentication\Controllers\Controller;
use LaravelAcl\Course\Models\Courses;
use Illuminate\Http\Request;
use Redirect, App, Config;

class CourseController extends Controller
{
    private $model;

    function __construct()
    {
        $this->model = new Courses();
    }

    public function getList(Request $request)
    {
        $name = $request->get('name');
        $courses = $this->model->getAll($name);

        return \view('laravel-authentication-acl::admin.course.list', compact('courses', 'request' ));
    }

    public function editCourse(Request $request)
    {
        $id = $request->get('id');
        $course = $this->model->find($id);

        if(!isset($course)){
            $course = new Courses();
        }

        $moodles = Moodles::select('id', 'name')->get();
        $moodles_values = [];

        foreach ($moodles as $key => $value){
            $moodles_values[$value->id] = $value->name;
        }

        return \view('laravel-authentication-acl::admin.course.edit', compact('course', 'moodles_values'));

    }

    public function postEditCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'fullname' => 'required',
            'moodle_id' => 'required',

        ]);

        $id = $request->get('id');
        $course = $this->model->find($id);


        try
        {
            if ($validator->fails()) {
                return redirect('admi/courses/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            if($course == null)
            {
                $course = $this->model->create([
                    'name' => $request->input('name'),
                    'fullname' => $request->input('fullname'),
                    'moodle_id' => $request->input('moodle_id'),
                    'activated' => 1,
                    'protected' => 0,
                ]);

            }else{

                $course->name = $request->input('name');
                $course->fullname = $request->input('fullname');
                $course->moodle_id = $request->input('moodle_id');
                $course->save();
           }

        }
        catch(\Exception $e)
        {
            $errors = $e;
            // passing the id incase fails editing an already existing item
            return Redirect::route("courses.edit", $id ? ["id" => $id]: [])->withInput()->withErrors($errors);
        }
        return Redirect::route('courses.edit',["id" => $course->id])->withMessage(Config::get('acl_messages.flash.success.course_edit_success'));
    }

    public function getUsersCourseList(Request $request)
    {
        $id = $request->get('id');
        $course = $this->model->find($id);
        $users = $this->model->getUsersCourses($course->id);

        return \view('laravel-authentication-acl::admin.course.course-view-user', compact('users', 'request', 'course' ));
    }

    public function deleteUserCourse(Request $request){

        try{

        $id = $request->get('id');
        $course_id = $request->get('course_id');

        $user_course = UsersCourses::find($id);
        $user_course->delete();

        return Redirect::route('courses.course-view-user',["id" => $course_id])->withMessage(Config::get('acl_messages.flash.success.user_course_remove_success'));

        }catch (\Exception $ex){
            return Redirect::route('courses.course-view-user',["id" => $course_id])->withMessage(Config::get('acl_messages.flash.error.user_course_remove_error'));
        }

    }

    public function addUserCourse(Request $request){

        try{

            $user_id = $request->get('user_id');
            $course_id = $request->get('course_id');

            $course = $this->model->find($course_id);

            $user_course = new UsersCourses();
            $user_course->create(array(
                'course_id' => $course->id,
                'user_id' => $user_id,
                'moodle_id' => $course->moodle_id
            ));

            return Redirect::route('courses.course-view-user',["id" => $course_id])->withMessage(Config::get('acl_messages.flash.success.user_course_add_success'));

        }catch (\Exception $ex){
            return Redirect::route('courses.course-view-user',["id" => $course_id])->withMessage(Config::get('acl_messages.flash.error.user_course_add_error'));
        }

    }

}