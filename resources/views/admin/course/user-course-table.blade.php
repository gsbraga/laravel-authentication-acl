<div class="panel panel-info">
    <div class="panel-heading">
        {{--<h3 class="panel-title bariol-thin"><i class="fa fa-user"></i> {!! $request->all() ? 'Search results:' : 'Users' !!}</h3>--}}
    </div>
    <div class="panel-body">

      <div class="row">
          <div class="col-md-12">
              @if( count($users) > 0 )
              <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Email</th>
                              <th class="hidden-xs">First name</th>
                              <th class="hidden-xs">Last name</th>
                              <th>Active</th>
                              <th>Operations</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                              <td>{!! $user->email !!}</td>
                              <td class="hidden-xs">{!! $user->first_name !!}</td>
                              <td class="hidden-xs">{!! $user->last_name !!}</td>
                              <td>{!! $user->user_course_id ? '<i class="fa fa-circle green"></i>' : '<i class="fa fa-circle-o red"></i>' !!}</td>
                              <td>
                                  @if($user->user_course_id)
                                      <a title="Remover usuário" href="{!! URL::route('courses.deleteusercourse',['id' => $user->user_course_id, 'course_id' => $course->id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete red"><i class="fa fa-trash-o fa-2x"></i></a>
                                  @else
                                      <a title="Adicionar usuário" href="{!! URL::route('courses.addusercourse',['user_id' => $user->id, 'course_id' => $course->id, '_token' => csrf_token()]) !!}" class="margin-left-5 green"><i class="fa fa-plus fa-2x"></i></a>

                                  @endif
                              </td>
                          </tr>
                      </tbody>
                      @endforeach
              </table>
              <div class="paginator">
                  {{--{!! $users->appends($request->except(['page']) )->render() !!}--}}
              </div>
              @else
                  <span class="text-warning"><h5>No results found.</h5></span>
              @endif
          </div>
      </div>
    </div>
</div>
