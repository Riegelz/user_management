<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Database
{

  public function addnewuser($data)
  {
    $results = DB::insert('insert into user (name, lastname, sex, birthday, email, address, telnumber) values (?,?,?,?,?,?,?)', [$data->name, $data->lastname,$data->sex,$data->birthday,$data->email,$data->address,$data->telnumber]);

	if($results) {
		return "success";
	}else{
		return "fail";
	}
  }

  public function userlist()
  {
  	$users = DB::select('select * from user');

  	if(isset($users)) {
  		$resp['description'] = "success";
  		$resp['data'] = $users;
		return $resp;
	}else{
		return $resp['description'] = "fail";
	}
  }

  public function deluser($data)
  {
    $results = DB::table('user')->where('id', '=', $data->id)->delete();

	if($results) {
		return "success";
	}else{
		return "fail";
	}
  }

  public function updateuser($data)
  {
    $results = DB::table('user')->where('id', $data->id)->update([
    	'name' => $data->name,
    	'lastname' => $data->lastname,
    	'sex' => $data->sex,
    	'birthday' => $data->birthday,
    	'email' => $data->email,
    	'address' => $data->address,
    	'telnumber' => $data->telnumber
    ]);

	return true;
	
  }

}
