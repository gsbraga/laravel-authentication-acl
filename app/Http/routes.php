<?php
use Illuminate\Session\TokenMismatchException;

/*
  |--------------------------------------------------------------------------
  | Public side (no auth required)
  |--------------------------------------------------------------------------
  |
*/
Route::get('/', [
    "as"   => "home.moodles",
    "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getList'
]);

/**
 * User login and logout
 */
Route::group(['middleware' => ['web']], function ()
{

    Route::get('/admin/login', [
            "as"   => "user.admin.login",
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getAdminLogin'
    ]);
    Route::get('/login', [
            "as"   => "user.login",
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getClientLogin'
    ]);
    Route::get('/user/logout', [
            "as"   => "user.logout",
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getLogout'
    ]);
    Route::post('/user/login', [
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@postAdminLogin',
            "as"   => "user.login.process"
    ]);
    Route::post('/login', [
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@postClientLogin',
            "as"   => "user.login"
    ]);

    /**
     * Password recovery
     */
    Route::get('/user/change-password', [
            "as"   => "user.change-password",
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getChangePassword'
    ]);
    Route::get('/user/recovery-password', [
            "as"   => "user.recovery-password",
            "uses" => 'LaravelAcl\Authentication\Controllers\AuthController@getReminder'
    ]);
    Route::post('/user/change-password/', [
            'uses' => 'LaravelAcl\Authentication\Controllers\AuthController@postChangePassword',
            "as"   => "user.reminder.process"
    ]);

    Route::get('/user/change-password-success', [
                    "uses" => function ()
                    {
                        return view('laravel-authentication-acl::client.auth.change-password-success');
                    },
                    "as"   => "user.change-password-success"
            ]
    );
    Route::post('/user/reminder', [
            'uses' => 'LaravelAcl\Authentication\Controllers\AuthController@postReminder',
            "as"   => "user.reminder"
    ]);
    Route::get('/user/reminder-success', [
            "uses" => function ()
            {
                return view('laravel-authentication-acl::client.auth.reminder-success');
            },
            "as"   => "user.reminder-success"
    ]);

    /**
     * User signup
     */
    Route::post('/user/signup', [
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postSignup',
            "as"   => "user.signup.process"
    ]);
    Route::get('/user/signup', [
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@signup',
            "as"   => "user.signup"
    ]);
    Route::post('captcha-ajax', [
            "before" => "captcha-ajax",
            'uses'   => 'LaravelAcl\Authentication\Controllers\UserController@refreshCaptcha',
            "as"     => "user.captcha-ajax.process"
    ]);
    Route::get('/user/email-confirmation', [
            'uses' => 'LaravelAcl\Authentication\Controllers\UserController@emailConfirmation',
            "as"   => "user.email-confirmation"
    ]);
    Route::get('/user/signup-success', [
            "uses" => 'LaravelAcl\Authentication\Controllers\UserController@signupSuccess',
            "as"   => "user.signup-success"
    ]);

    /*
      |--------------------------------------------------------------------------
      | Admin side (auth required)
      |--------------------------------------------------------------------------
      |
      */
    Route::group(['middleware' => ['admin_logged', 'can_see']], function ()
    {
        /**
         * dashboard
         */
        Route::get('/admin/users/dashboard', [
                'as'   => 'dashboard.default',
                'uses' => 'LaravelAcl\Authentication\Controllers\DashboardController@base'
        ]);

        Route::get('/dashboards', [
            "as"   => "dashboard.moodle",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getListDashboards'
        ]);

        Route::get('/dashboards/moodles', [
            "as"   => "dashboard.moodles",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getList'
        ]);

        Route::get('/dashboards/access', [
            "as"   => "dashboard.access",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleAccess'
        ]);

        //Dashboard dos Cursos
        Route::get('/dashboards/categories', [
            "as"   => "reports.list",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getCategoriesList'
        ]);

        /**
         * user
         */
        Route::get('/admin/users/list', [
                'as'   => 'users.list',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@getList'
        ]);
        Route::get('/admin/users/edit', [
                'as'   => 'users.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editUser'
        ]);
        Route::post('/admin/users/edit', [
                'as'   => 'users.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postEditUser'
        ]);
        Route::get('/admin/users/delete', [
                'as'   => 'users.delete',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteUser'
        ]);
        Route::post('/admin/users/groups/add', [
                'as'   => 'users.groups.add',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@addGroup'
        ]);
        Route::post('/admin/users/groups/delete', [
                'as'   => 'users.groups.delete',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteGroup'
        ]);
        Route::post('/admin/users/editpermission', [
                'as'   => 'users.edit.permission',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editPermission'
        ]);
        Route::get('/admin/users/profile/edit', [
                'as'   => 'users.profile.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editProfile'
        ]);
        Route::post('/admin/users/profile/edit', [
                'as'   => 'users.profile.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@postEditProfile'
        ]);
        Route::post('/admin/users/profile/addField', [
                'as'   => 'users.profile.addfield',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@addCustomFieldType'
        ]);
        Route::post('/admin/users/profile/deleteField', [
                'as'   => 'users.profile.deletefield',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@deleteCustomFieldType'
        ]);
        Route::post('/admin/users/profile/avatar', [
                'as'   => 'users.profile.changeavatar',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@changeAvatar'
        ]);
        Route::get('/admin/users/profile/self', [
                'as'   => 'users.selfprofile.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\UserController@editOwnProfile'
        ]);

        /**
         * groups
         */
        Route::get('/admin/groups/list', [
                'as'   => 'groups.list',
                'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@getList'
        ]);
        Route::get('/admin/groups/edit', [
                'as'   => 'groups.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@editGroup'
        ]);
        Route::post('/admin/groups/edit', [
                'as'   => 'groups.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@postEditGroup'
        ]);
        Route::get('/admin/groups/delete', [
                'as'   => 'groups.delete',
                'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@deleteGroup'
        ]);
        Route::post('/admin/groups/editpermission', [
                'as'   => 'groups.edit.permission',
                'uses' => 'LaravelAcl\Authentication\Controllers\GroupController@editPermission'
        ]);

        /**
         * courses
         */
        Route::get('/admin/courses/list', [
            'as'   => 'courses.list',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@getList'
        ]);
        Route::get('/admin/courses/edit', [
            'as'   => 'courses.edit',
                'uses' => 'LaravelAcl\Course\Controllers\CourseController@editCourse'
        ]);
        Route::post('/admin/courses/edit', [
            'as'   => 'courses.edit',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@postEditCourse'
        ]);
        Route::get('/admin/courses/delete', [
            'as'   => 'courses.delete',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@deleteCourse'
        ]);
        Route::get('/admin/courses/users', [
            'as'   => 'courses.users',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@usersCourse'
        ]);
        Route::post('/admin/courses/editpermission', [
            'as'   => 'courses.edit.permission',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@editPermission'
        ]);
        Route::get('/admin/courses/userscourses', [
            'as'   => 'courses.course-view-user',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@getUsersCourseList'
        ]);

        Route::get('/admin/courses/deleteusercourse', [
            'as'   => 'courses.deleteusercourse',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@deleteUserCourse'
        ]);

        Route::get('/admin/courses/addusercourse', [
            'as'   => 'courses.addusercourse',
            'uses' => 'LaravelAcl\Course\Controllers\CourseController@addUserCourse'
        ]);

        /**
         * reports
         */

        Route::get('admin/reports/list', [
            "as"   => "reports.moodle",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getCoursesList'
        ]);



        Route::get('admin/reports/useraccess', [
            "as"   => "reports.usersaccess",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleUserAccess'
        ]);

        Route::get('admin/reports/accesscourses', [
            "as"   => "reports.accesscourses",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleAccessCourses'
        ]);

        Route::get('admin/reports/accessactivity', [
            "as"   => "reports.accessactvity",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleAccessActivity'
        ]);

        Route::get('admin/reports/reportactivity', [
            "as"   => "reports.reportactvity",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleReportActivity'
        ]);

        Route::get('admin/reports/reportforum', [
            "as"   => "reports.reportforum",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleReportForum'
        ]);

        Route::get('admin/reports/reportquiz', [
            "as"   => "reports.reportquiz",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleReportQuiz'
        ]);

        Route::get('admin/reports/reportcourse', [
            "as"   => "reports.reportcourse",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getMoodleReportCourse'
        ]);

        Route::get('admin/reports/reportcategory', [
            "as"   => "reports.reportcategory",
            "uses" => 'LaravelAcl\Moodle\Controllers\MoodleController@getUsersCategory'
        ]);

        



        /**
         * permissions
         */
        Route::get('/admin/permissions/list', [
                'as'   => 'permission.list',
                'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@getList'
        ]);
        Route::get('/admin/permissions/edit', [
                'as'   => 'permission.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@editPermission'
        ]);
        Route::post('/admin/permissions/edit', [
                'as'   => 'permission.edit',
                'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@postEditPermission'
        ]);
        Route::get('/admin/permissions/delete', [
                'as'   => 'permission.delete',
                'uses' => 'LaravelAcl\Authentication\Controllers\PermissionController@deletePermission'
        ]);
    });
});
//////////////////// Automatic error handling //////////////////////////

if(Config::get('acl_base.handle_errors'))
{
    App::error(function (RuntimeException $exception, $code)
    {
        switch($code)
        {
            case '404':
                return view('laravel-authentication-acl::client.exceptions.404');
                break;
            case '401':
                return view('laravel-authentication-acl::client.exceptions.401');
                break;
            case '500':
                return view('laravel-authentication-acl::client.exceptions.500');
                break;
        }
    });

    App::error(function (TokenMismatchException $exception)
    {
        return view('laravel-authentication-acl::client.exceptions.500');
    });
}