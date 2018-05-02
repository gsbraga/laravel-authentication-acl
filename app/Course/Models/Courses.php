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
}