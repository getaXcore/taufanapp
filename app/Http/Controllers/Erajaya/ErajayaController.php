<?php


namespace App\Http\Controllers\Erajaya;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErajayaController extends Controller
{
    public function __construct()
    {
        $this->OK = array("code"=>1,"description"=>"success");
        $this->notOK = array("code"=>0,"description"=>"no data");
		$this->exist = array("code"=>2,"description"=>"session true");
		$this->notExist = array("code"=>3,"description"=>"session false");
		
    }
    public function index(){
        return view("flogin");
    }
	
	public function dashboard(Request $request){
		$sid = trim($request->sid);
		
		$sess = DB::table('master_session')
			->select('*')
			->where('userid',$sid)
			->first();
		
		if(!empty($sess)){
			
			$user = DB::table('master_user')
				->select('level','userid')
				->where('userid',$sid)
				->first();
			$sLevel = $user->level;
			$sid = $user->userid;
			
			return view("dashboard",array("sLevel"=>$sLevel,"sid"=>$sid));
		}else{
			return view("flogin");
		}
	}
	
	public function changePass(Request $request){
		$sid = trim($request->sid);
		
		$sess = DB::table('master_session')
			->select('*')
			->where('userid',$sid)
			->first();
		
		if(!empty($sess)){
			$user = DB::table('master_user')
				->select('level','userid')
				->where('userid',$sid)
				->first();
			$sLevel = $user->level;
			$sid = $user->userid;
			
			return view("changepass",array("sLevel"=>$sLevel,"sid"=>$sid));
		}else{
			return view("flogin");
		}
	}
	
	public function masterUser(Request $request){
		$sid = trim($request->sid);
		
		$sess = DB::table('master_session')
			->select('*')
			->where('userid',$sid)
			->first();
		
		if(!empty($sess)){
			$user = DB::table('master_user')
				->select('level','userid')
				->where('userid',$sid)
				->first();
			$sLevel = $user->level;
			$sid = $user->userid;
			
			return view("masteruser",array("sLevel"=>$sLevel,"sid"=>$sid));
		}else{
			return view("flogin");
		}
	}
	
	public function cekLogin(Request $request){
		$param = json_decode($request->getContent(),true);
        $userid = trim($param["userid"]);
		$password = trim($param["pwd"]);
		
		$user = DB::table('master_user')
			->select('userid','password')
			->where('userid',$userid)
			->where('password',md5($password))
			->first();
			
		if(!empty($user)){
			$directUrl = url("/dashboard");
			return response(array_merge($this->OK,array("directUrl"=>$directUrl)),200);
		}else{
			return response($this->notOK,200);
		}
		
	}
	
	public function saveLogin(Request $request){
		$param = json_decode($request->getContent(),true);
        $userid = trim($param["userid"]);
		$now = date("Y-m-d H:i:s");
		
		
		DB::table("master_session")->insert(
			[
				"userid" => $userid,
				"lastlogin" => $now
			]
		);
			
		return response($this->OK,200);
		
		
		
	}
	
	public function changePassword(Request $request){
		$param = json_decode($request->getContent(),true);
        $userid = trim($param["userid"]);
		$oldpass = trim($param["oldpass"]);
		$newpass = trim($param["newpass"]);
		
		$user = DB::table('master_user')
			->select('userid','password')
			->where('userid',$userid)
			->where('password',md5($oldpass))
			->first();
		
		if(!empty($user)){
			DB::table("master_user")
				->where('userid',$userid)
				->update(array("password"=>md5($newpass)));
				
			return response($this->OK,200);
		}else{
			return response($this->notOK,200);
		}
		
	}
	
	public function addUser(Request $request){
		$param = json_decode($request->getContent(),true);
        $userid = trim($param["userid"]);
		$pass = trim($param["pass"]);
		$level = trim($param["level"]);
		
		if(!empty($param)){
			DB::table("master_user")->insert([
				"userid" => $userid,
				"password" => md5($pass),
				"level" => $level
			]);
			
			return response($this->OK,200);
		}else{
			return response($this->notOK,200);
		}
	}
	
	public function getAllUSer(){
		
		$user = DB::table('master_user')
			->select('userid','password','level')
			->get();
			
		if(!empty($user)){
			$data = array();
			
			$i = 0;
			foreach($user as $sval){
				$i++;
				
				$data["data"][$i] = $sval;
			}
			
			return response(array_merge($this->OK,$data),200);
		}else{
			return response($this->notOK,200);
		}
	}
	
	public function delSess(Request $request){
		$param = json_decode($request->getContent(),true);
        $userid = trim($param["userid"]);
		
		if(!empty($param)){
			DB::table('master_session')->where('userid', $userid)->delete();
			$directUrl = url("/signin");
			return response(array_merge($this->OK,array("directUrl"=>$directUrl)),200);
			return response($this->OK,200);
		}else{
			return response($this->notOK,200);
		}
	}
	
}