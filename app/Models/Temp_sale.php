<?php

namespace Retailms\Models;

//use Retailms\Models\Vendor;
use Retailms\Models\Product;
use Illuminate\Database\Eloquent\Model;


class Temp_sale extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'temp_sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barcode',
        'item',
        'uom',
        'qty',
        'unitPrice',
        'total',
        'created_at',
        'created_by',
    ];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 
        //'remember_token',
    ];

}
