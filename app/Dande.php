<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dande extends Model
{
    protected $table = "dande";

    public function getById($id) {
        $dande = Dande::find($id);

        return $dande;
    }
}
