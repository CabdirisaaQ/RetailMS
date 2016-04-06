<?php

namespace Retailms\Models;

use Retailms\Models\Vendor;
use Retailms\Models\Product;
use Illuminate\Database\Eloquent\Model;


class Purchase extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchasesNo',
        'vendorId',
        'productId',
        'unitsInOrder',
        'unitPrice',
        'total',
        'cash',
        'credit',  
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

    public function getVendorName($id)
    {
        // search for the vendor ie
        $record = Vendor::find($id);

         return $record['company'];
        //return 'cali';
    }

    public function searchVendor($purchasesNo)
    {
        $record = Purchase::where('purchasesNo',$purchasesNo)->first();
        dd($record);
    }

    public function getProductName($id)
    {
        //search the product
        $record = Product::find($id);
        return $record['descripiton'];
    }

    public function vendors()
    {
        //return $this->hasMany('Retailms\Models\Vendor', 'Id');
    }

    /**
     * Random Products Functions
     */

    public function unitsInStock($old='', $new='')
    {
       // return $old + $new;
    }

}
