<table class="table table-stripped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">User First Name</th>
                        <th scope="col">User Middle Name</th>
                        <th scope="col">User Last Name</th>
                        <th scope="col">Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($activities->isEmpty())
                        <tr>
                        <td colspan="7"><div class="alert alert-danger text-center">No Data Found.</div></td>
                        </tr>
                        @else
                        @foreach($activities as $activity)
                        @foreach($users as $user)
                        @if($activity->user_id == $user->id)
                        <tr>
                        <th scope="row">{{$activity->id}}</th>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$activity->activity}}</td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                        @endif
                    </tbody>
                </table>