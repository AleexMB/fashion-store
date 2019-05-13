<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use Validator;

use App\Services\v1\ProductService;

class ProductController extends Controller
{
	protected $requester;

    public function __construct(ProductService $service) {
		$this->requester = $service;
	}

    public function getTshirts(Request $request)
    {
        //call service
        $requester = $this->requester->getTshirts($request);
        //return data
        return response()->json($requester, 200);
    }

    public function getTrousers(Request $request)
    {
        //call service
        $requester = $this->requester->getTrousers($request);
        //return data
        return response()->json($requester, 200);
    }

    public function getCoats(Request $request)
    {
        //call service
        $requester = $this->requester->getCoats($request);
        //return data
        return response()->json($requester, 200);
    }
}