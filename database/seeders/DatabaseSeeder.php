<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodRecipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $recipes = [
            [
                'name' => 'Pizza',
                'description' => 'A delicious Italian dish made with a wheat flour dough crust, tomato sauce, and various toppings such as cheese, vegetables, and meats.',
                'image' => 'https://images.unsplash.com/photo-1590947132387-155cc02f3212?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Nnx8fGVufDB8fHx8&w=1000&q=80',
                'ingredients' => 'flour, water, yeast, salt, tomato sauce, cheese, toppings',
                'calorie_count' => '500',
            ],
            [
                'name' => 'Hamburger',
                'description' => 'A sandwich consisting of a cooked patty of ground meat, typically beef, placed between two buns and often served with lettuce, tomato, and other condiments.',
                'image' => 'https://www.aspicyperspective.com/wp-content/uploads/2020/07/best-hamburger-patties-1.jpg',
                'ingredients' => 'bun, beef patty, lettuce, tomato, condiments',
                'calorie_count' => '300',
            ],
            [
                'name' => 'Chicken Alfredo',
                'description' => 'A pasta dish made with fettuccine noodles, chicken, and a creamy Alfredo sauce.',
                'image' => 'https://www.budgetbytes.com/wp-content/uploads/2022/07/Chicken-Alfredo-bowl.jpg',
                'ingredients' => 'fettuccine, chicken, cream, parmesan cheese',
                'calorie_count' => '700',
            ],
            [
                'name' => 'Salad',
                'description' => 'A dish of raw or cooked vegetables, usually served cold or at room temperature, and often accompanied by a dressing.',
                'image' => 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F44%2F2021%2F08%2F16%2Fchopped-power-salad-with-chicken.jpg&q=60',
                'ingredients' => 'lettuce, tomato, cucumber, dressing',
                'calorie_count' => '200',
            ],
            [
                'name' => 'Sushi',
                'description' => 'A Japanese dish consisting of small balls or rolls of vinegared rice served with a garnish of raw fish, vegetables, or egg.',
                'image' => 'https://cdn.media.amplience.net/i/japancentre/guide-page-sushi-79-maki-sushi/Maki-sushi-rolls?$poi$&w=700&h=410&sm=c&fmt=auto',
                'ingredients' => 'vinegared rice, raw fish, vegetables, egg',
                'calorie_count' => '400',
            ],
        ];

        foreach ($recipes as $recipe) {
            FoodRecipe::create($recipe);
        }


    }
}
