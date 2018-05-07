<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:01
 */

namespace LaravelAcl\Course\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Courses extends Model
{
    protected $fillable = ["name", "fullname", "moodle_id"];


    public function getAll($name = '')
    {
        if($name != ''){
            $dados = DB::table('courses')
                ->where('name', 'like', "%$name%")->get();

            return $dados;
        }

        return DB::table('courses')->get();
    }

    public function getUsersCourses($id)
    {

        $dados = DB::select("
            SELECT
              users.id, users.activated, users.last_login, users.email, user_profile.first_name, 
              user_profile.last_name,
              (SELECT id FROM users_courses WHERE users.id = users_courses.user_id AND users_courses.course_id = $id ) as user_course_id
            FROM
              users
            INNER JOIN user_profile ON users.id = user_profile.user_id
            ");

        return $dados;
    }
}