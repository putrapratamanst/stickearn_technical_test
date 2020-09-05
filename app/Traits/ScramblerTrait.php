<?php

namespace App\Traits;

use Faker\Factory as Faker;
use App\Http\Helpers\EnglishWords;
use App\Repository\PlayerRepository;
use App\Repository\ResultRepository;
/**
 * 
 */
trait ScramblerTrait
{
    public static function queryParamToArray($queryParam)
    {
       parse_str($queryParam, $output);

       return $output['guess_word'];
    }

    public static function generateWord($request)
    {
        $playerRepo = new PlayerRepository();
        $resultRepo = new ResultRepository();

        $faker = Faker::create('en_EN');
        $faker->addProvider(new EnglishWords($faker));
        $unique = $faker->unique()->word;

        $dataResult = $resultRepo->resultByPlayerId($request->session()->get('player_id'), $unique);
        if($dataResult){
            $unique = $faker->unique()->word;
        }

        $word = [
            'original_word' => $unique,
            'scramble_word' => str_shuffle($unique)
        ];

        return $word;
    }
}
