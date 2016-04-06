<?php

namespace Retailms\Models;

use Retailms\Models\Vendor;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripiton',
        'barcode',
        'itemInStock',
        'quantityPerUnit',
        'unitPrice',
        'unitShelfPrice',
        'itemPrice',
        'itemShelfPrice', 
        'created_by',
        'created_at',  
        'updated_by',
        'updated_at',
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

    public function getName()
    {
        /*if ($this->company) {
                return $this->company;
        }

        return null;*/
    }

    public function vendors()
    {
        //return $this->hasMany('Retailms\Models\Vendor', 'Id');
    }

    /**
     * Random Products Functions
     */

    public function itemInStock($old='', $new='')
    {
        return $old + $new;
    }

}
