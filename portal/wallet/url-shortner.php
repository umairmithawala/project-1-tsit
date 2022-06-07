<?php

final class UrlShortener {

    private static $charfeed = Array(
    'a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m',
    'M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y',
    'z','Z','0','1','2','3','4','5','6','7','8','9');

    public static function intToShort($number) {
        $need = count(self::$charfeed);
        $s = '';

        do {
            $s .= self::$charfeed[$number%$need];
            $number = floor($number/$need);
        } while($number > 0);

        return $s;
    }

    public static function shortToInt($string) {
        $num = 0;
        $need = count(self::$charfeed);
        $length = strlen($string);

        for($x = 0; $x < $length; $x++) {
            $key = array_search($string[$x], self::$charfeed);
            $value = $key * pow($need, $x);
            $num += $value;
        }

        return $num;
    }
}

// $abc1 = UrlShortener::intToShort(131569877435989900);
// $abc2 = UrlShortener::shortToInt("zNycMOUswE"); 


$global_radom_adder_five_digit = 85252;



?>

