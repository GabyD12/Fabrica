<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['Marca','Modelo'];
    protected $allowIncluded = ['persona','accidentes','multas'];

    public function multas(){
        return $this->hasMany(Multa::class);
    }

    public function accidentes(){
        return $this->belongsToMany(Accidente::class);
    }
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
   

    public function scopeIncluded(Builder $query)
    {

        if(empty($this->allowIncluded)||empty(request('included'))){
            return;
        }

        
        $relations = explode(',', request('included')); 

       // return $relations;

        $allowIncluded = collect($this->allowIncluded); 

        foreach ($relations as $key => $relationship) { 

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }
        $query->with($relations); 

      


    }
}
