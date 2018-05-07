<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [ 'username' , 'email', 'password'];
    protected $is_admin = false;
}