<?php

namespace Retailms\Models;

//use Retailms\Models\Status;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',     
        'lname',     
        'username',  
        'employment',
        'permission',
        'password',
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
        'password', 
        //'remember_token',
    ];

    public function getName()
    {
        if ($this->fname && $this->lname) {
               return "{$this->fname} {$this->lname}";
           }   

        if ($this->fname) {
                return $this->fname;
        }

        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername()
    {
        return $this->fname ?: $this->username;
    }

    public function isAdmin() 
    {
        if ($this->permission == "admin" || $this->permission == "sa") {
            return true;
        }else{
            return false;
        }
    }

}
