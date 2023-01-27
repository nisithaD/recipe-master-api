<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Favourite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
            ->where('user_id', auth('sanctum')->user()->id)
            ->with('foodRecipe')
            ->get();

        return DataResource::collection($favourites);
    }

    public function addToFavorite($recipe_id): JsonResponse
    {
        $favourite = Favourite::where('user_id', auth('sanctum')->user()->id)
            ->where('food_recipe_id', $recipe_id)
            ->first();
        if ($favourite) {
            $favourite = Favourite::where('user_id', auth('sanctum')->user()->id)
                ->where('food_recipe_id', $recipe_id)
                ->delete();
            return response()->json([
                'message' => 'Successfully removed from favourite',
            ], 200);
        }
        else {
            Favourite::class::create([
                'user_id' => auth('sanctum')->user()->id,
                'food_recipe_id' => $recipe_id,
            ]);

            return response()->json([
                'status' => 200,
            ], 200);
        }
    }

    public function removeFromFavorite($recipe_id): JsonResponse
    {
        Favourite::class::where('user_id', auth('sanctum')->user()->id)
            ->where('food_recipe_id', $recipe_id)
            ->delete();

        return response()->json([
            'status' => 200,
        ], 200);
    }
}
