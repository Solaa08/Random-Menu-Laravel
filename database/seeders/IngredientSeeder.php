<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
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
        $faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
        $data = array();

        $type_primaire = ["Principal","Accompagnement","Assaisonnement"];
        $type_secondaire = ["Viande","Poisson","Féculent","Légumes","Fruits","Sauce","Epice"];

        for ($i = 0; $i < 100; $i++){
            $data[] = array(
                "nom"=>$faker->vegetableName(),
                "type_primaire"=>$faker->randomElement($type_primaire),
                "type_secondaire"=>$faker->randomElement($type_secondaire),
                "user_id"=>1,
                "created_at"=>$now,
                "updated_at"=>$now
            );
        }

        Ingredient::insert($data);
    }
}
