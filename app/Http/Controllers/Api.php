<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Controllers\General;
use App\Http\Controllers\Database;

class Api extends Controller
{

	public function __construct(Request $request)
    {
    	$this->general = New General();
    	$this->db = New Database();
    	$this->request = $request;
    }

    public function Userlist()
   	{
   		## Get User lists
   		$userlist = $this->db->userlist();
		return response()->json($this->general->responseFormat(($userlist['description'] == "success")?200:400, $userlist['description'], $userlist['data']));
   	}

   	public function Adduser()
   	{
		## Check JSON format
   		if(!$this->request->isJson()) return response()->json($this->general->responseFormat(400, "INVALID JSON FORMAT"));
   		## Check Velidate field
   		$fieldveridate = $this->general->fieldveridate($this->request);
   		if($fieldveridate['description'] == "fail") return response()->json($this->general->responseFormat(400, $fieldveridate['description'],$fieldveridate['data']));
   		## Add User
   		$resp = $this->db->addnewuser($this->request);
		return response()->json($this->general->responseFormat(($resp == "success")?200:400, $resp));
   	}

   	public function Deluser()
   	{
		## Check JSON format		
   		if(!$this->request->isJson()) return response()->json($this->general->responseFormat(400, "INVALID JSON FORMAT"));
   		## Del User
   		$resp = $this->db->deluser($this->request);
		return response()->json($this->general->responseFormat(($resp == "success")?200:400, $resp));
   	}

   	public function Updateuser()
   	{
 		## Check JSON format  		
   		if(!$this->request->isJson()) return response()->json($this->general->responseFormat(400, "INVALID JSON FORMAT"));
   		## Update user
   		$resp = $this->db->updateuser($this->request);
		return response()->json($this->general->responseFormat(($resp)?200:400, $resp));
   	}
}
