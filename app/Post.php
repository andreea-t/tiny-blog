<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function truncate($string, $length=200,$append="...") {
        $string = trim($string);
      
        if(strlen($string) > $length) {
          $string = wordwrap($string, $length);
          $string = explode("\n", $string, 2);
          $string = $string[0] . $append;
        }
      
        return $string;
      }
}
