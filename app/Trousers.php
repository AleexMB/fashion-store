<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Trousers extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'trousers';

    protected $fillable = [
        'name', 'ref_id', 'description', 'size_s', 'size_m', 'size_l', 'size_xl', 'img', 'img_url',
    ];
}