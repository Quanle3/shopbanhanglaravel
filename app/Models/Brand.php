<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;
    protected $fillable = [
            'brand_name', 'brand_id', 'brand_desc', 'brand_status', 'meta_keywords'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';


    }

