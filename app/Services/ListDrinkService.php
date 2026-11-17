<?php

namespace App\Services;

use App\Http\Resources\DrinkResource;
use App\Models\Drink;

class ListDrinkService
{

public function getDrinks(){
    $drinks = Drink::with( "type","package" )->get();
    
    return DrinkResource::collection($drinks);
}

public function getDrink(Drink $drink){
   $insDrink= $drink->load("type","package");
   $oneDrink=(new DrinkResource($insDrink));
   return $oneDrink;
}

}