<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Favourite;
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
            ->get();

        return DataResource::collection($favourites);
    }
}
