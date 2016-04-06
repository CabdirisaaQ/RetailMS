<?php

namespace Retailms\Models;

// use Retailms\Models\Vendor;
use Illuminate\Database\Eloquent\Model;


class Sale extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'receiptNo',
        'productId',
        'unitPrice', 
        'uom',
        'qty',
        'total',
        'created_by',
        'created_at',  
        'updated_by',
        'updated_at',
        'zReport',
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

    public function getReceiptInfo($receiptNo)
    {
        $result;
        $record = Sale::where('receiptNo',$receiptNo)->get();

        $result['receiptNo']   = $receiptNo;
        $result['total']       = $this->calculateTotal($receiptNo);
        $result['created_at']  = $record[0]['created_at'];
        $result['created_by']  = $record[0]['created_by'];

        return $result;
    }

}
