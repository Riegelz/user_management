<?php

namespace App\Http\Controllers;

class General
{

  public function responseFormat($code = 200, $description, $datas = '')
  {
    $responses = [
      'status' => $code, 
      'description' => $description, 
    ];
    if($datas) $responses['data'] = $datas;

    return $responses;
  }

  public function fieldveridate($data = null)
  {
    foreach ($data->all() as $key => $value) {
      if (empty($value)) {
        $resp['description'] = "fail";
        $resp['data'] = $key . " can not be null";
        return $resp;
      }
    }
  }

}
