<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"Nice to eat you ! Fabricant : Sfax, Tunisie Chez Crunchy mug, nous tenons à vous remercier d’avoir choisi notre produit innovant pour savourer votre boisson au café préférée. Conçu de manière durable, notre gobelet comestible et biodégradable en gaufrette apporte une solution dès la source. Crunchycup est un pionnier dans sa mission de bouleverser les habitudes liées aux gobelets à usage unique et d’améliorer la vie des gens ! Chacun de nos gobelets d’exception est fabriqué avec amour, une attention minutieuse aux moindres détails et un profond respect de la nature ! Nous nous efforçons d’offrir à nos clients une expérience croustillante de qualité à chaque bouchée, tout en les aidant à préserver la planète.",
            'short_des'=>"Crunchy Mug propose une expérience savoureuse, loin des chemins traditionnels, avec une approche à la fois douce et innovante. Tout est pensé pour le confort.

Crunchy Mug, c’est la douceur incarnée : un goût raffiné, un design soigné, un respect de l’environnement, et une solution pratique au quotidien.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"Sfax,Tunisie",
            'email'=>"crunchymug@gmail.com",
            'phone'=>"+216 28 212 295",
        );
        DB::table('settings')->insert($data);
    }
}
