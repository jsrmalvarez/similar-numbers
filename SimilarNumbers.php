<?php

namespace jsrmalvarez;

class SimilarNumbers
{
    private static function int_array_to_integer($array){
        return array_reduce($array, function($carry, $item){return ($carry*10 + $item);});
    }

    private static function integer_to_int_array(int $integer){
        return array_map('intval', str_split($integer));
    }

    static function get_similar_digits($digit){

        // jsrmalvarez: Heurístico de dígitos que 
        // se pueden confundir unos con otros.
        // Con un poco de imaginación.

        $similars = array();

        switch($digit){
            case 0:
                array_push($similars, 8, 9, 6);
                break;
            case 1:
                array_push($similars, 7, 4);
                break;
            case 2:
                array_push($similars, 5, 3, 7);
                break;
            case 3:
                array_push($similars, 8, 9, 2);
                break;
            case 4:
                array_push($similars, 7, 1);
                break;
            case 5:
                array_push($similars, 2, 3, 7, 6);
                break;
            case 6:
                array_push($similars, 8, 9, 0, 5);
                break;
            case 7:
                array_push($similars, 5, 3, 2, 1, 4);
                break;
            case 8:
                array_push($similars, 0, 9, 6, 3, 2);
                break;
            case 9:
                array_push($similars, 8, 0, 6, 3, 2);
                break;

        }

        return $similars;
    }

    static function get_similar_numbers(int $integer) {


        $digits = self::integer_to_int_array($integer);

        $similars = array();

        for($n = 0; $n < count($digits); $n++){
            $digit = $digits[$n];

            $similar_digits = self::get_similar_digits($digit);

            foreach($similar_digits as $similar_digit){
                $similar_integer_array = $digits;
                $similar_integer_array[$n] = $similar_digit;
                $similar_integer = self::int_array_to_integer($similar_integer_array);
                array_push($similars, $similar_integer);
            }
        }

        return $similars;
    }
}