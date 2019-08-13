<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['absent_at', 'justified' , 'seance_id' , 'etudiant_id'];

/*this is added to make a relationship between seance and absence*/
    public function seance()
    {
    	return $this->belongsTo(Seance::class);
    }


}
