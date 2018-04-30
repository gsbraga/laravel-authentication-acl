<?php
/**
 * Created by PhpStorm.
 * User: gsbraga
 * Date: 10/04/18
 * Time: 17:01
 */

namespace LaravelAcl\Course\Models;


use Illuminate\Database\Eloquent\Model;

class Moodles extends Model
{
    protected $fillable = ["id", "name", "description", "url", "activated"];

}