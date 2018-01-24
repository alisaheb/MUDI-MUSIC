<?php

class Users extends \Eloquent {
	
	protected $fillable = [];

	public static function validInput()
	{
		return [
			'user_email'=>'required',
			'password'=>'required',			
		];
	}


	public static function checkUser($data){

		$valid = UserLogin::where('user_email',$data['user_email'])->get();

		if (Hash::check($data['password'], $valid[0]->user_password))
			{

				Session::put('login_data', $valid);
				//super user
				if($valid[0]->role == 1){
					$userdata = array('user_name'=>'admin');
				}

				//if it is band
				if($valid[0]->role == 2){
				$userdata = Band::where('ref_user_id',$valid[0]->user_id)->get();
					//echo "<pre>";print_r($userdata);exit();
					$menudata = self::menuSet(2);
					Session::put('menu_data', $menudata);
				}
				//if it is publisher
				if($valid[0]->role == 3){
					$userdata = Publisher::where('ref_user_id',$valid[0]->user_id)->get();
					$menudata = self::menuSet(3);
					Session::put('menu_data', $menudata);
				}
			    
				$validateuser = $valid->count();
				Session::put('user_login', $valid);
				Session::put('user', $userdata);
				Session::put('role', $valid[0]->role);
			}

		return $validateuser;
	}


	//checking dash board controller
	public static function userCheck(){
		if(Session::has('role')){
		  return true;		
		}
		else{
			return false;
		}
	}

	//checking the band manage controller 
	public static function bandFuck(){
		if(Session::has('role') && Session::get('role') == 2){
		  return true;		
		}
		else{
			return false;
		}	
	}
	public static function publisherFuck(){
		if(Session::has('role') && Session::get('role') == 3){
		  return true;		
		}
		else{
			return false;
		}	
	}

	public static function adminFuck(){
		if(Session::has('role') && Session::get('role') == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public static function dashboardCheck(){
		if(Session::has('role')){
			return true;
		}
		else{
			return false;
		}
	}

	public static function menuSet($role){


		$menuArr = array();
		$i=0;
		$sql = "select roles from user_roles where role_id = ?";
		$roles = DB::select($sql,[$role]);
		//echo "<pre>";print_r($roles);exit();
		$menuSql = "select m.link,d.title from menu m,menu_detail d where m.id = d.id;";
		$menuQuery = DB::select($menuSql);
		$rolessplits = str_split($roles[0]->roles);
		foreach($rolessplits as $key=>$rolessplit){
			$menulinkTitle = array();
			if($rolessplit == 1){
				$menulinkTitle['title'] = $menuQuery[$key]->title;
				$menulinkTitle['link'] = $menuQuery[$key]->link;

				$menuArr[$i]=$menulinkTitle;
					$i++;
			}
		}

		return $menuArr;
	}
}