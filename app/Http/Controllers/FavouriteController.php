<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Favourite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function userFavourites(): AnonymousResourceCollection
    {
        $favourites = QueryBuilder::for(Favourite::class)
            ->where('user_id', Auth::id())
            ->with('foodRecipe')
            ->get();

        return DataResource::collection($favourites);
    }

    public function addToFavorite($recipe_id): JsonResponse
    {
        Favourite::class::create([
            'user_id' => Auth::id(),
            'food_recipe_id' => $recipe_id,
        ]);

        return response()->json([
            'status' => 200,
        ], 200);
    }

    public function removeFromFavorite($recipe_id): JsonResponse
    {
        Favourite::class::where('user_id', Auth::id())
            ->where('food_recipe_id', $recipe_id)
            ->delete();

        return response()->json([
            'status' => 200,
        ], 200);
    }
}
