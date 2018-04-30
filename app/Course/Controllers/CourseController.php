<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:00
 */

namespace LaravelAcl\Course\Controllers;


use Illuminate\Support\Facades\Redirect;
use LaravelAcl\Course\Models\Moodles;
use Validator;
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

        $moodles_values = Moodles::select('name')->get()->toArray();

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
        dd($course);

        try
        {
            if ($validator->fails()) {
                return redirect('courses/edit')
                    ->withErrors($validator)
                    ->withInput();
            }

            if($course == null)
            {
                $course = $this->model->create([
                    'name' => $request->input('name'),
                    'fullname' => $request->input('fullname')
                ]);

            }else{

                $course->name = $request->input('name');
                $course->fullname = $request->input('fullname');
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



}