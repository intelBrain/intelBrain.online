<table class="table table-stripped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">User First Name</th>
                        <th scope="col">User Middle Name</th>
                        <th scope="col">User Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">User Email</th>
                        <th scope="col">User Role</th>
                        <th scope="col">User Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->isEmpty())
                        <tr>
                        <td colspan="7"><div class="alert alert-danger text-center">No Data Found.</div></td>
                        </tr>
                        @else
                        @foreach($users as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->usertype}}</td>
                        <td>
                            @if($user->id == Auth::User()->id || $user->usertype == 'admin')
                                Active
                            @else
                            @if($user->active == '0')
                                Inactive
                            @else
                                Active
                            @endif
                            @endif
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>