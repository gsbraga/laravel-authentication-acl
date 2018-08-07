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

class UsersCourses extends Model
{

    protected $fillable = ["id", "course_id", "moodle_id", "user_id"];


    public function cursos($user_id){
        $dados = DB::select("
            SELECT
             courses.*
            FROM
              courses
            INNER JOIN users_courses ON courses.id = users_courses.course_id
            WHERE users_courses.user_id = $user_id
            ");

        return $dados;
    }

}