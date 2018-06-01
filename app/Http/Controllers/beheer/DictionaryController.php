<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Dictionary;

class DictionaryController extends Controller
{
    public function index()
    {
        $dictionaryArray = [];
        $tests = Product::select('name', 'description')
        ->where('active', 1)
        ->get()->toArray();

        foreach ($tests as $item) {

                //check if description or name containt's  spaces
            $name =  $item['name'];
            $description = $item['description'];

            $spaceCheckName =  preg_match('/\s/', $name);
            $spaceCheckDescription =  preg_match('/\s/', $description);

            if ($spaceCheckName === 0) {
                // no spaces found, add to dictionaryArray.
                array_push($dictionaryArray, $item['name']);
            } else {
                // one or more spaces found. let's explode them
                $dennis = explode(" ", $item['name']);
                for ($i =0; $i < count($dennis); $i++) {
                    array_push($dictionaryArray, $item['name'][$i]);
                }
            }
        }
        //return array_unique($dictionaryArray);
        $result2 = array_filter($dictionaryArray, function ($v) {
            return strlen($v) < 3;
        });

        $finalWordList[] = array_diff($dictionaryArray, $result2);
        //return array_unique($result2);
        //dd($finalWordList);
        foreach ($finalWordList as $word) {
            $count = count($word);

            for ($i=0; $i<$count; $i++) {
                if ($word[$i]) {
                    Dictionary::create([
                        'language' => 'Dutch',
                        'word' => $word[$i],
                    ]);
                }
                //echo $i;
            }
        }
    }
}
