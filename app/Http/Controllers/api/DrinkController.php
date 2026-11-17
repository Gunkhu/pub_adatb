<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Traits\ResponseHandler;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\getDrink;
use App\Services\ListDrinkService;
use App\Services\CreateDrinkService;
use App\Http\Requests\DrinkRequest;


class DrinkController extends Controller
{
    use ResponseHandler;

    public function __construct(protected ListDrinkService $listDrinkService,
                                protected CreateDrinkService $createDrinkService) {}

    public function getDrinks() {
        $drinks = $this->listDrinkService->getDrinks();

        return $this->sendResponse($drinks, "Sikeres betöltés", 200);
    }

    public function getDrink(Drink $drink){
        return $this->listDrinkService->getDrink($drink);
    }

    public function createDrink( DrinkRequest $request){

        $validated = $request->validated();
        
        $drink = $this->createDrinkService->createNewModel($validated);

        return $this->sendResponse($drink->name,"Sikeres írás",200);
    }
}
