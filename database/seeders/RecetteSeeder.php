<?php

namespace Database\Seeders;

use App\Models\Recette;
use Carbon\Carbon;
use Faker;
use FakerRestaurant\Provider\fr_FR\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('utc')->toDateTimeString();
        $faker = Faker\Factory::create();
        $faker->addProvider(new Restaurant($faker));

        $data_recette = array();
        $data_recette_contenu = array();

        for ($i = 0; $i < 50; $i++){
            $faker_url = $faker->url;
            $url = "<a href='".$faker_url."'>".$faker_url."</a>";
            $data_recette[] = array(
                "nom"=>$faker->sentence,
                "url"=>$url,
                "type"=>$faker->randomElement(Recette::$type_recette),
                "user_id"=>1,
                "created_at"=>$now,
                "updated_at"=>$now
            );

            for ($j = 0; $j < random_int(2,5); $j++){
                $data_recette_contenu[] = array(
                    "ingredient_id" => random_int(1,100),
                    "recette_id"    => $i+1
                );
            }
        }
        Recette::insert($data_recette);
        DB::table("recette_contenu")->insert($data_recette_contenu);
    }
}
