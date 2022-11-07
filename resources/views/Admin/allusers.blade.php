@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
   <div class="container-fluid table-responsive">
      <div class="card">
         <div class="card-header">
            <h5>All Users</h5>
            <div class="d-flex justify-content-end mb-4">
               <a class="btn btn-primary" href=""  data-toggle="modal" data-target="#exportPDF"><i class="fas fa-file-pdf"></i> Export to PDF</a>
               <div class="modal fade" id="exportPDF" tabindex="-1" role="dialog" aria-labelledby="activateLabelexport" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="activate">Select Range to Export to PDF</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <form id="activate-form" action="{{ route('filter') }}" method="GET">
                           @csrf
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Date from</label>
                                 <input type="date"  max="{{date('Y-m-d')}}"class="form-control" name="from" required>
                              </div>
                              <div class="form-group">
                                 <label>Date To</label>
                                 <input type="date"  max="{{date('Y-m-d')}}"class="form-control" name="to" required>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Export Selected Range To PDF</button>
                              <a href="{{route('filter')}}" class="btn btn-default"><i class="fas fa-download"></i> Export All Data</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               &nbsp;
               <a class="btn btn-success" href=""  data-toggle="modal" data-target="#exportExcel"><i class="fas fa-file-excel"></i> Export to Excel</a>
               <div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="activateLabelexport" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="activate">Select Range to Export to Excel</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <form id="activate-form" action="{{ route('export-users') }}" method="GET">
                           @csrf
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Date from</label>
                                 <input type="date"  max="{{date('Y-m-d')}}"class="form-control" name="from" required>
                              </div>
                              <div class="form-group">
                                 <label>Date To</label>
                                 <input type="date"  max="{{date('Y-m-d')}}"class="form-control" name="to" required>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Data To Excel</button>
                              <a href="{{route('export-users')}}" class="btn btn-warning"><i class="fas fa-download"></i> Export All Data</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body table-responsive">
            <div class="row">
               <div class="col-md-6 mx-auto">
                  @if(session()->has('message'))
                  {{$errclass=''}}
                  <span style="display:none">
                  @if(str_contains(session('message'), 'no'))
                  {{ $errclass='alert-danger'}}
                  @else
                  {{ $errclass='alert-success'}}
                  @endif
                  </span>
                  <div class="alert {{$errclass}} alert-dismissible show mb-2 mt-2" role="alert"  id="mydiv">
                     {{session('message')}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
               </div>
            </div>
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
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @if($users->isEmpty())
                  <tr>
                     <td colspan="7">
                        <div class="alert alert-danger text-center">No Data Found.</div>
                     </td>
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
                        <button class="btn btn-success btn-sm">
                        Active
                        </button>
                        @else
                        @if($user->active == '0')
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#activate<?php echo $user->id?>">
                        <i class="fas fa-times"></i> Activate?
                        </button>
                        <!-- Activate Modal -->
                        <div class="modal fade" id="activate<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="activateLabel<?php echo $user->id?>" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="activate">Activate User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    Are you sure you want to activate {{ $user->first_name}} {{ $user->last_name}}?
                                 </div>
                                 <div class="modal-footer">
                                    <form id="activate-form" action="{{ route('activate', $user->id) }}" method="POST">
                                       @csrf
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Leave as is</button>
                                       <button type="submit" class="btn btn-primary">Yes, Activate</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @else
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#deactivate<?php echo $user->id?>">
                        <i class="fas fa-check"></i> Deactivate?
                        </button>
                        <!-- Activate Modal -->
                        <div class="modal fade" id="deactivate<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel<?php echo $user->id?>" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="activate">Deactivate User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    Are you sure you want to deactivate {{ $user->first_name}} {{ $user->last_name}}?
                                 </div>
                                 <div class="modal-footer">
                                    <form action="{{ route('deactivate', $user->id) }}" method="POST">
                                       @csrf
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Leave as is</button>
                                       <button type="submit" class="btn btn-primary">Yes, Deactivate</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                        @endif
                     </td>
                     <td>
                         @if($user->usertype == 'admin')
                            <button class="btn btn-default">No Action</button>
                        @else
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $user->id?>"><i class="fas fa-pencil"></i> Edit User</a>
                        <div class="modal fade" id="edit<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel<?php echo $user->id?>" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="activate">Edit User</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('edituser', $user->id) }}" method="POST">
                                    @csrf
                                       <div class="row">
                                          <div class="col-md-4 mb-3">
                                             <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>
                                             <div class="">
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autocomplete="first_name" autofocus>
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="middle_name" class=" col-form-label text-md-end">{{ __('Middle Name') }}</label>
                                             <div class="">
                                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}" required autocomplete="middle_name" autofocus>
                                                @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>
                                             <div class="">
                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name" autofocus>
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="phone" class="col-form-label text-md-end">{{ __('Phone') }}</label>
                                             <div class="">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone" autofocus>
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="address" class="col-form-label text-md-end">{{ __('Address') }}</label>
                                             <div class="">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address" autofocus>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-4 mb-3">
                                             <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>
                                             <div class="">
                                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                          <button type="submit" class="btn btn-primary">Edit</button>
                                          </div>
                                       </div>
                                    </form>
                                </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                              </div>
                           </div>
                        </div>
         </div>
         &nbsp;
         <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirm<?php echo $user->id?>"><i class="fas fa-trash"></i> Delete User</a>
                        <div class="modal fade" id="deleteConfirm<?php echo $user->id?>" tabindex="-1" role="dialog" aria-labelledby="deactivateLabel<?php echo $user->id?>" aria-hidden="true">
                           <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="activate">Delete User?</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to delete {{$user->first_name}}?
                                </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="{{route('deleteuser', $user->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                              </div>
                              </div>
                           </div>
                        </div>
         </div>
         @endif
         </td>
         </tr>
         @endforeach
         @endif
         </tbody>
         </table>
         <div class="mx-auto"><br>{{ $users->links() }}</div>
      </div>
   </div>
</div>
</div>
@endsection