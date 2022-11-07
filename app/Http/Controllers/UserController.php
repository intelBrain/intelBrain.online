<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Products;
use App\Models\Images;
use App\Models\Cart;

// PDF
use PDF;

// Excel
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Exports\ExportActivity;


class UserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Products::all();
        $images = Images::all();
        $carts = Cart::all();
        $users = User::all();
        return view('index', compact('categories','products','images','carts','users'));
    }
    
    public function redirect()
    {
        $usertype = Auth::User()->usertype;
        if($usertype == 'admin')
        {
            $categories = Category::all();
            $products = Products::all();
            $users = User::all();
            $orders = 0;
            return view('Admin.home',compact('categories','products','users','orders'));
        }
        if($usertype == 'customer')
        {
                $categories = Category::all();
                $products = Products::all();
                $images = Images::all();
                $users = User::all();
                $carts = Cart::where('user_id', Auth::User()->id)->get();
                $user = User::findOrFail(Auth::User()->id);
                
                $activity = ActivityLog::create([
                    'user_id'=>Auth::User()->id,
                    'activity'=>'User Logged in at '.Auth::User()->created_at,
                ]);
    
                return view('index', compact('categories','products','images','carts','users','user'));
        }
    }

    public function viewUsers()
    {
        $users = User::paginate(10);
        return view('Admin.allusers', compact('users'));
    }

    public function createPDF(Request $request)
    {
        // retreive all records from db
        if($request->has('from'))
        {
            $fromdate = $request->from;
            $todate = $request->to;
            $data = User::whereBetween('created_at', [$fromdate, $todate])->get();
            $users = User::whereBetween('created_at', [$fromdate, $todate])->get();
            // share data to view
            if($data->count()<=0)
            {
                return redirect()->back()->with('message','No data within that range Found');
            }
            else
            {
                $data = $data->toArray();
                view()->share('Admin.allusers',compact('data','users'));
                $pdf = PDF::loadView('Admin.pdfdownload', compact('data','users'))->setOptions(['defaultFont' => 'sans-serif']);
                // download PDF file with download method
                $pdf->setPaper('A4', 'landscape');
                return $pdf->stream('intelBrain - User Data From '.$fromdate.' to '.$todate.'.pdf');
            }
        }
        $users = User::all();
        $data = $users->toArray();
        view()->share('Admin.allusers',compact('data','users'));
        $pdf = PDF::loadView('Admin.pdfdownload', compact('data','users'))->setOptions(['defaultFont' => 'sans-serif']);
        // download PDF file with download method
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('intelBrain - All User Data.pdf');
    }

    public function createActivityPDF(Request $request)
    {
        // retreive all records from db
        if($request->has('from'))
        {
            $fromdate = $request->from;
            $todate = $request->to;
            $users = User::all();
            $data = ActivityLog::whereBetween('created_at', [$fromdate, $todate])->get();
            $activities = ActivityLog::whereBetween('created_at', [$fromdate, $todate])->get();
            // share data to view
            if($data->count()<=0)
            {
                return redirect()->back()->with('message','No Logs Data Found');
            }
            else
            {
                $data = $data->toArray();
                view()->share('Admin.activitylog',compact('data','activities'));
                $pdf = PDF::loadView('Admin.activity_pdf', compact('data','activities','users'))->setOptions(['defaultFont' => 'sans-serif']);
                // download PDF file with download method
                $pdf->setPaper('A4', 'landscape');
                return $pdf->stream('intelBrain - Log Data From '.$fromdate.' to '.$todate.'.pdf');
            }
        }
        $activities = ActivityLog::all();
        $users = User::all();
        $data = $activities->toArray();
        view()->share('Admin.activitylog',compact('data','users','activities'));
        $pdf = PDF::loadView('Admin.activity_pdf', compact('data','users','activities'))->setOptions(['defaultFont' => 'sans-serif']);
        // download PDF file with download method
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('intelBrain - All User Activity Log Data.pdf');
    }

    public function exportUsers(Request $request){
        if($request->has('from'))
        {
            $from_date=$request->from;
            $to_date = $request->to;
            $data = User::whereBetween('created_at', [$from_date, $to_date])->get();
            if($data->count()<=0)
            {
                return redirect()->back()->with('message','No Logs Data Found');
            }
            else
            {
                return Excel::download(new ExportUser($from_date,$to_date), 'intelBrain - User Data From '.$from_date.' to '.$to_date.'.xlsx');
            }
        }
        else
        {
            $to_date=date('Y-m-d',time() + 86400);
            $from_date='1970-01-01';
            return Excel::download(new ExportUser($from_date,$to_date), 'intelBrain - All User Data.xlsx');
        }
    }

    public function exportActivities(Request $request){
        if($request->has('from'))
        {
            $from_date=$request->from;
            $to_date = $request->to;
            $data = ActivityLog::whereBetween('created_at', [$from_date, $to_date])->get();
            if($data->count()<=0)
            {
                return redirect()->back()->with('message','No Logs Data Found');
            }
            else
            {
                return Excel::download(new ExportActivity($from_date,$to_date), 'intelBrain - Activity Log Data From '.$from_date.' to '.$to_date.'.xlsx');
            }
        }
        $to_date=date('Y-m-d',time() + 86400);
        $from_date='1970-01-01';
        return Excel::download(new ExportActivity($from_date,$to_date), 'intelBrain - All Activity Log Data.xlsx');
    }
    
    public function edituser($id, Request $request)
    {
        $user = User::findOrFail($id);
        $data = $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        if($data)
        {
            return redirect()->back()->with('message', 'User Edited Successfully');
        }
    }
    
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        //Deleting Data
        if($user->delete()){
            return redirect()->back()->with('message', 'User Deleted Successfully'); 
        }
    }

    public function activateUser($id, Request $request)
    {
        $activate = User::where('id', $id)
        ->update([
            'active' => 1
        ]);
        if($activate)
        {
            return redirect()->back()->with('message', 'Success!! User Activated');
        }
    }

    public function deactivateUser($id, Request $request)
    {
        $deactivate = User::where('id', $id)
        ->update([
            'active' => 0
        ]);
        if($deactivate)
        {
            return redirect()->back()->with('message', 'Success!! User Deactivated');
        }
    }
    
    public function activityLogs(Request $request)
    {
        $users = User::all();
        $activities = ActivityLog::paginate(10);
        if($request->has('search')){
            $activities = ActivityLog::where('activity','like', "%{$request->search}%")->paginate(15);
        }
        
        return view('Admin.activitylog', compact('activities','users'));
    }
}