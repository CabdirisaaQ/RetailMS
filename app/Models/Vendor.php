<?php

namespace Retailms\Models;

use Retailms\Models\Product;
use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vendors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',     
        'location',     
        'tel',   
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

    // public function getName(id)
    // {
    //     // search for the vendor ie
    //     $record = Vendor::find($id);

    //     return $record['company'];
    // }

    public function products()
    {
        //return $this->hasMany('Retailms\Models\Product', 'id');
    }


}
