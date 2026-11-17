<?php
namespace App\Services;

use App\Models\Drink;

class CreateDrinkService{

    public function __construct(protected PackageService $packageService,
                                protected TypeService $typeService){}

    public function createNewModel(array $validated){

        $drink = new Drink();
        $drink->name = $validated["name"];
        $drink->amount = $validated["amount"];
        $drink->price = $validated["price"];
        $drink->type_id = $this->typeService->getId($validated["type"]);
        $drink->package_id = $this->packageService->getId($validated["package"]);
        $drink->save();
        
        return $drink;
    }

    public function drinkAutomaticCreate(array $validated){
    return Drink::create($validated);
    }
}