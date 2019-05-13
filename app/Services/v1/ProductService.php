<?php

namespace App\Services\v1;

use App\Tshirt;
use App\Trousers;
use App\Coat;

class ProductService {

	public function getTshirts($request) {
        $tshirts = Tshirt::all();
        $data = $tshirts;
        return $data;
    }
    
    public function getTrousers($request) {
        $trousers = Trousers::all();
        $data = $trousers;
        return $data;
    }
    
    public function getCoats($request) {
        $coats = Coat::all();
        $data = $coats;
        return $data;
	}
	
}