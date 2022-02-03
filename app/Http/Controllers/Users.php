<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Chat;
use App\Models\Community;
use App\Models\Solution;
use Session;

class Users extends Controller
{
    
    function profile()
    {
        $user = User::select('*')->where(
            [
                ['email','=','pb@gmail.com'],
                ['password','=','123']
            ]
        )->get();
        return view('profile1',['user'=>$user]);
    }
    function pricelist()
    {
        return view('price');
    }
    function login()
    {
        return view('auth-login');
    }
    function registration()
    {
        return view('auth-register');
    }

    function crm()
    {

        $data  = User::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        
        $project  = Project::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        
        $activity  = Activity::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();

        $projectdata = Project::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();

        return view('index-crm',['data'=>$data,'projectdata'=>$projectdata,'project'=>$project,'activity'=>$activity]);
    }

    function chat()
    {
        $data = Chat::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        $user =  User::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();

        return view('app-chat',compact('data','user'));
    }

    function community()
    {
        $data = Community::all();
        $user = User::all();
        return view('community',compact('data','user'));
    }

    function team()
    {
        $data =  User::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        return view('team',compact('data'));
    }

    function manageteam($id)
    {
        session()->put('tempuser',$id);
        return redirect('manageteam');
    }

    function manageteam1(){
        $data = User::select('*')->where(
            [
                ['user_id','=',Session::get('tempuser')]
            ]
        )->get();
        return view('manage-team',compact('data'));
    }

    function monitering()
    {
        $data = Project::all();
        return view('monitering',compact('data'));
    }

    function projectdetail($id)
    {
        session()->put('tempproject',$id);
        return redirect('projectdetails');
    }

    function projectdetails()
    {
        $data  = User::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();

        $project  = Project::select('*')->where(
            [
                ['project_id','=',Session::get('tempproject')]
            ]
        )->get();
        
        $activity  = Activity::select('*')->where(
            [
                ['project_id','=',Session::get('tempproject')]
            ]
        )->get();

        return view('project-details',compact('data','project','activity'));
    }

    function completeproject($project_id)
    {
        $project = Project::where('project_id', $project_id)
            ->update([
                'status' => 1,
                'due_date' => date('Y-m-d')
        ]);
        Activity::where('project_id',$project_id)->update(['status'=>1,'update_id'=>Session::get('loguser')]);
        return redirect('projectdetails');
    }

    function tasklist()
    {
        $data  = User::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();

        $project  = Project::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        
        $activity  = Activity::select('*')->where(
            [
                ['team_id','=',Session::get('logteam')]
            ]
        )->get();
        return view('page-task-list',compact('activity','project','data'));
    }

    function problemshow($id,$user)
    {
        session()->put('tempid',$id);
        
        session()->put('tempiduser',$user);
        return redirect('problem-show');
    } 
    function problemshow1()
    {
        
        $data = Community::select('*')->where(
            [
                ['problem_id','=',Session::get('tempid')]
            ]
        )->get();
        $solution = Solution::select('*')->where(
            [
                ['problem_id','=',Session::get('tempid')]
            ]
        )->get();
        $user = User::select('*')->where(
            [
                ['user_id','=',Session::get('tempiduser')]
            ]
        )->get();
        return view('problem-show',compact('data','user','solution'));
    } 

    function login1(Request $req){

        $a = User::select('*')->where(
            [
                ['email','=',$req->email],
                ['password','=',$req->password]
            ]
        )->get();
        
        //print_r($req->email);
        foreach($a as $b)
        {
            if($b->email == $req->email)
            {
                $req->session()->put('logdata',$b->name);
                $req->session()->put('logemail',$b->email);
                $req->session()->put('logprofile',$b->profile);
                $req->session()->put('loguser',$b->user_id);
                $req->session()->put('logteam',$b->team_id);
                $req->session()->put('logtname',$b->team_name);
                //$as = Session::get('logdata');
                //print_r($as[1]);
                //print_r(Session::get('name'));
                return redirect('index');
            }
        }
        echo "<script>alert('Password Invalid!!');</script>";
        return redirect('/');
    }

    function registration1(Request $req)
    {
        $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('/assets/img/profile/'), $imageName);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->number = $req->contact;
        $user->team_name = $req->tname;
        $user->team_id = $req->tid;
        $user->role = $req->role;
        $user->profile = $imageName;
        $user->a_token = 0;
        $user->password = $req->password;
        $result = $user->save();
        if($result)
            return redirect('/');
    }

    function logout(){
        Session::flush();
        return Redirect('/');
    }

    function addmember(){
        return view('addmember');
    }

    
}
