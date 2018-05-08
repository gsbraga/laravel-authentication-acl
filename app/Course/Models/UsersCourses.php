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

}