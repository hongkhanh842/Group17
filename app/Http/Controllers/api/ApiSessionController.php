<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiSessionController extends Controller
{
    use ResponseTrait;

    public function all()
    {
        try {
            $i=1;
            foreach(Session::get('cart') as $each)
            {
                $arr[$i]= $each;
                $i++;
            }
            $arr['count']=$i-1;
            return $this->successResponse($arr);
        } catch (\Throwable $e){
            return $this->errorResponse($e->getMessage());
        }

    }
    public function count()
    {
        try {
            $i=1;
            foreach(Session::get('cart') as $each)
            {
                $arr[$i]= $each;
                $i++;
            }
            $arr['count']=$i-1;
            return $this->successResponse($arr);
        } catch (\Throwable $e){
            return $this->errorResponse($e->getMessage());
        }

    }
}
