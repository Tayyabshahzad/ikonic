<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
           $auth_id = Auth::user()->id;
            
        //  return $suggested_users = User::where('id','!=',$auth_id)->whereDoesntHave('connection', function (Builder $query) {
        //     $auth_id = Auth::user()->id;
        //     $query->where('connection_with','!=',$auth_id);
        //   })->get();

          $suggested_users = User::whereDoesntHave('reciveRequests',function($query){
                $auth_id = Auth::user()->id;
                $query->where('requested_from',$auth_id);
          })->whereDoesntHave('sendRequests',function($query){
                $auth_id = Auth::user()->id;
                $query->where('requested_to',$auth_id);
          })->where('id','!=',$auth_id)->get();


        //   $aleardyConnectedIDs =auth()->user()->sendRequests->pluck('requeated_to');
        //   $suggested_users = User::whereNotIn('id', $aleardyConnectedIDs)->whereNot('id', auth()->user()->id)->get();



          $sent_requests = Connection::where('status','pending')->with('requestToUser')->where('requested_from',$auth_id)->get(); 
          $recieve_requests = Connection::where('status','pending')->with('requestFromUser')->where('requested_to',$auth_id)->get(); 
          $accepted_requests = Connection::where('status','approve')->with(['requestToUser','requestFromUser'])->where('requested_from',$auth_id)->orWhere('requested_to',$auth_id)->get(); 
          
          return view('home',compact('suggested_users','sent_requests','recieve_requests','accepted_requests'));
    }

    public function mark_suggestions(Request $request)
    {
        $request->validate([
            'id' => 'required', 
        ]);
        try{
            $auth_id = Auth::user()->id;
            $connection = new Connection;
            $connection->requested_from = $auth_id;
            $connection->requested_to = $request->id;
            $connection->save();
            return response([
                'status'=> true,
                'message'=>'Connection request has been sent',
            ]);
        }catch(Exception $error){
            return response([
                'status'=> false,
                'message'=>'Error while creating connection',
            ]);
        }
    }
    public function withdraw_request(Request $request)
    {
        $request->validate([
            'id' => 'required', 
        ]);

        try{
            $auth_id = Auth::user()->id;
             $connection =  Connection::find($request->id);
            $connection->delete();
            return response([
                'status'=> true,
                'message'=>'Request has been withdraw',
            ]);
        }catch(Exception $error){
            return response([
                'status'=> false,
                'message'=>'Error while withdraw request',
            ]);
        }
    }
    public function accept_request(Request $request)
    {
        $request->validate([
            'id' => 'required', 
        ]);
      
        try{
            $auth_id = Auth::user()->id;
             $connection =  Connection::find($request->id);
            $connection->status = 'approve';
            $connection->save();
            return response([
                'status'=> true,
                'message'=>'Request has been accepted',
            ]);
        }catch(Exception $error){
            return response([
                'status'=> false,
                'message'=>'Error while accepting request',
            ]);
        }
    }
    public function connection_remove(Request $request)
    {
        $request->validate([
            'id' => 'required', 
        ]);
      
        try{
             
            $connection =  Connection::find($request->id); 
            $connection->delete();
            return response([
                'status'=> true,
                'message'=>'Connection has been removed',
            ]);
        }catch(Exception $error){
            return response([
                'status'=> false,
                'message'=>'Error while removing connection',
            ]);
        }
    }

    public function common_connection(Request $request)
    {
        $request->validate([
            'auth_id' => 'required',
            'common_id' => 'required', 
        ]);
        $authUserConnections = Connection::select('id')->where('status','approve')->where('requested_from',$request->auth_id)->get();
        $otherUserConnections = Connection::select('id')->where('status','approve')->where('requested_to',$request->common_id)->get();
        $arrayAuthUser = array();
        $arrayOtherUser = array();
        foreach($authUserConnections as $authUserConnection){
            array_push($arrayAuthUser,$authUserConnection->id);
        }
        foreach($otherUserConnections as $otherUserConnection){
            array_push($arrayOtherUser,$otherUserConnection->id);
        }
        $result = array_intersect($arrayAuthUser, $arrayOtherUser);
        $data = '';
        dd($result[1]);
         
        
        return response([
            'status'=> true,
            'data'=>$data,
        ]);
    }
    
    


    
}
