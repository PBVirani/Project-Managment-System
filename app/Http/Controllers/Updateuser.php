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

class Updateuser extends Controller
{
    function tasklist1($id,$status){
        
        $activity = Activity::find($id);
        $activity->update_id = Session::get('loguser');
        if($status == 0)      
            $activity->status = '1';
        else
            $activity->status = '0';
        $activity->update();
        return redirect('tasklist');
    }

    function addtask(Request $req){
        $task = new Activity;
        $task->project_id = $req->pname;
        $task->work = $req->task;
        $task->team_id = Session::get('logteam');
        $task->user_id = Session::get('loguser');
        $task->status = 0;
        $task->update_id = 0;
        $result = $task->save();
        if($result)
            return redirect('tasklist');
    }

    
    function edittask1($id)
    {
        session()->put('temp',$id);
        return redirect('edittask');
    }
    function edittask(){
        $activity  = Activity::select('*')->where(
            [
                ['id','=',Session::get('temp')]
            ]
        )->get();

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

        return view('edit-task',['activity'=>$activity,'user'=>$data,'project'=>$project]);
    }

    function updatetask(Request $req){

        $activity = Activity::find(Session::get('temp'));
        $activity->update_id = Session::get('loguser');
        $activity->work = $req->task;
        $activity->update();
        Session::forget('temp');
        return redirect('tasklist');
    }

    function addmember(Request $req)
    { 
           $user = new User;
           $user->name = $req->name;
           $user->email = $req->email;
           $user->number = $req->number;
           $user->team_name = Session::get('logtname');
           $user->team_id = Session::get('logteam');
           $user->role = $req->role;

           $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
           
                $imageName = time().'.'.$req->image->extension();  
                $req->image->move(public_path('/assets/img/profile/'), $imageName);
                $user->profile = $imageName;
            

           $user->a_token = 0;
           $user->password = $req->password;
           $result = $user->save();
           if($result)
            return redirect('team');
    }

    function updateprofile(Request $req)
    { 
         
           
            if($req->image != "")
            {
                $req->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                $imageName = time().'.'.$req->image->extension();  
                $req->image->move(public_path('/assets/img/profile/'), $imageName);
                User::where('user_id', Session::get('tempuser'))
                ->update([
                    'profile' => $imageName,
                    'name' => $req->name,
                    'number' => $req->number,
                    'email' => $req->email,
                    'role' => $req->role,
                    'team_name' => $req->tname,
                    'password' => $req->password
                ]);
            }
            else{
                User::where('user_id', Session::get('tempuser'))
                ->update([
                    'name' => $req->name,
                    'number' => $req->number,
                    'email' => $req->email,
                    'role' => $req->role,
                    'team_name' => $req->tname,
                    'password' => $req->password
                ]);
            }
            
            return redirect('manageteam');
            
    }

    function addproject()
    {
        return view('addproject');
    }
    function addproject1(Request $req){
        $project = new Project;
        $project->project = $req->name;
        $project->details = $req->pdetails;
        $project->team_id = Session::get('logteam');
        $project->start_date = $req->sdate;
        $project->due_date = $req->ddate;
        $project->project_manager = Session::get('loguser');
        $project->status = 0;
        $result = $project->save();
           if($result)
            return redirect('monitering');
    }   

    function addquestion(Request $req){
        $query = new Community;
        $query->user_id = Session::get('loguser');
        $query->problem_name = $req->problem;
        $query->problem = $req->details;
        $result = $query->save();
        if($result)
            return redirect('community');
    }

    function addsolution(Request $req){
        $solution = new Solution;
        $solution->user_id = Session::get('loguser');
        $solution->problem_id = Session::get('tempid');
        $solution->solution = $req->solution;
        $solution->message = $req->message;
        $solution->save();
        return redirect('problem-show');
    }

    function chat1(Request $req){
        $chat = new Chat;
        $chat->user_id = Session::get('loguser');
        $chat->team_id = Session::get('logteam');
        $chat->message = $req->chat;
        $chat->save();
        return redirect('app-chat');
    }
}
