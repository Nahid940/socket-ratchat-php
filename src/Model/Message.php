<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="message";
    protected $fillable=['message'];
}