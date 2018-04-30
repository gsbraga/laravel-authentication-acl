<?php namespace LaravelAcl\Authentication\Validators;

use Event;
use LaravelAcl\Library\Validators\AbstractValidator;

class CourseValidator  extends AbstractValidator
{
    protected static $rules = array(
        "name" => ["required"],
        "fullname" => ["required"],

    );

    public function __construct()
    {
        Event::listen('validating', function($input)
        {
            static::$rules["name"][] = "unique:courses,name,{$input['id']}";
            static::$rules["fullname"][] = "unique:groups,courses,{$input['id']}";

        });
    }
} 