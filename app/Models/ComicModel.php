<?php

namespace App\Models;

//! creazione campo per le date con carbon
use Carbon\Carbon;
//! --------------------------------------

use Illuminate\Database\Eloquent\Model;

class ComicModel extends Model
{
    // nel caso in cui laravel non capisce quale tabella è
    protected $table= 'comics';


    // se usi fill in store scrivi questo qui sotto
    protected $fillable= ['title', 'description', 'img', 'price'];

    //! creazione campo per le date con carbon   
    public function getFormattedDate($column, $format='d-m-Y H:m'){
        return  Carbon::create($this->$column)->format($format);
    }    
    //! --------------------------------------


}
