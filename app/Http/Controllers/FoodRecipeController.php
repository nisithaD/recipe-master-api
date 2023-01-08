<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\FoodRecipe;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class FoodRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $foodRecipes = QueryBuilder::for(FoodRecipe::class)
            ->get();

        return DataResource::collection($foodRecipes);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return DataResource
     */
    public function show($id)
    {
        $recipe = QueryBuilder::for(FoodRecipe::class)
            ->where('id', $id)
            ->firstOrFail();

        return new DataResource($recipe);
    }

}
