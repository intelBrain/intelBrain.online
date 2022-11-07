@extends('layouts.adminmain')
@section('content')
<div class="content-wrapper pt-5 pb-3">
    <div class="container-fluid table-responsive">
        <div class="card">
            <div class="card-header">
                <h5>All Normal User System Activities</h5>
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary" href=""  data-toggle="modal" data-target="#export"><i class="fas fa-file-pdf"></i> Export to PDF</a>
                    <div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="activateLabelexport" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="activate">Select Range of Data to Export</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="activate-form" action="{{ route('filter_activity') }}" method="GET">
                                        @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Date from</label>
                                    <input type="date" class="form-control" name="from" max="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Date To</label>
                                    <input type="date" class="form-control" name="to" max="{{date('Y-m-d')}}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Export Selected Range</button>
                                <!--<a href="{{route('filter_activity')}}" class="btn btn-default"><i class="fas fa-download"></i> Export All Data</a>-->
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
                            <form id="activate-form" action="{{ route('export-activities') }}" method="GET">
                                        @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Date from</label>
                                    <input type="date" class="form-control" name="from" required>
                                </div>
                                <div class="form-group">
                                    <label>Date To</label>
                                    <input type="date" class="form-control" name="to" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Data To Excel</button>
                                <a href="{{route('export-activities')}}" class="btn btn-warning"><i class="fas fa-download"></i> Export All Data</a>
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
						<div class="alert {{$errclass}} alert-dismissible fade show mb-2 mt-2" role="alert"  id="mydiv">
							{{session('message')}}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
				</div>
			</div>
            <form method="GET" action="{{route('activitylogs')}}" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="search" placeholder="Search Activity" name="search" class="form-control form-control-sm"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-search"></i> &nbsp{{ __('Search') }}</button>
                        </form> &nbsp
                <table class="table table-stripped table-hover table-bordered table-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name of User</th>
                        <th scope="col">Activity Description</th>
                        <th scope="col">Time of Occurance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($activities->isEmpty())
                        <tr>
                        <td colspan="7"><div class="alert alert-danger text-center">No Data Found.</div></td>
                        </tr>
                        @else
                        @foreach($activities as $activity)
                        <tr>
                        <th scope="row">{{$activity->id}}</th>
                        <td>
                            @foreach($users as $user)
                            @if($user->id == $activity->user_id)
                            {{$user->first_name}} {{$user->last_name}}
                            @endif
                            @endforeach
                        </td>
                        <td>{{$activity->activity}}</td>
                        <td>{{$activity->created_at}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mx-auto"><br>{{ $activities->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection