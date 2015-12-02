<?php

class NumberToWords {

    public static $baseNumbers = [
        0 => "zero",
        1 => "nje",
        2 => "dy",
        3 => "tre",
        4 => "kater",
        5 => "pese",
        6 => "gjashte",
        7 => "shtate",
        8 => "tete",
        9 => "nente",
        10 => "dhjete",
    ];

    public function parse($number)
    {
        //convert number to string in order to iterate through it
        $number = (String)$number;
        $numberLength = strlen($number);
        $sentence = "";

        //if number is 10 return only it
        if($number == 10){
            return static::$baseNumbers[10];
        }

        //return zero if number is just 0
        if($number == 0){
            return static::$baseNumbers[0];
        }

        //iterate through each char in number which is a number
        for($index = 0; $index < $numberLength; $index++){
            $current = intval($number[$index]);
            $base = pow(10, $numberLength - 1 - $index);

            //append "e" after each number that te previous exists and it's value is not 0
            if($numberLength > 1 && isset($number[$index - 1]) && $number[$index] != 0){
                $sentence .= " e ";
            }

            //handle all base 100
            $sentence .= $this->create_100_base($base,$current);

            //handle all base 1000
            $sentence .= $this->create_1000_base($base,$current);

            //handle numbers from 11-19
            if($numberLength >= 2 && isset($number[$index+1]) && $current == 1){
                if($base == 10 || $base == 10000){
                    if($number[$index+1] == 0){
                        $sentence .= static::$baseNumbers[10];
                    }else{
                        $sentence .= static::$baseNumbers[$number[$index+1]] . "mbe" . static::$baseNumbers[10];
                    }
                    $index++;
                    $sentence .= $this->create_1000_base(pow(10, $numberLength - 1 - $index),"");
                    continue;
                }
            }

            //handle numbers from 20-29
            if(($base == 10 || $base == 10000) && $current == 2){
                $sentence .= static::$baseNumbers[1] . "zet";
            }

            //handle numbers from 30-99
            if(($base == 10 || $base == 10000) && $current > 2){
                $sentence .= static::$baseNumbers[$current] . static::$baseNumbers[10];
                continue;
            }

            //if this is the last number just pick it's value
            if($index == $numberLength - 1 && $current != 0){
                $sentence .= static::$baseNumbers[$current];
            }
        }

        return $sentence;
    }

    function create_100_base($base, $current){
        if(($base == 100 || $base == 100000) && $current != 0){
            return isset(static::$baseNumbers[$current]) ? static::$baseNumbers[$current]."qind" : "qind";
        }
    }

    function create_1000_base($base, $current){
        if($base == 1000){
            if($current == 0){
                return "mije";
            }
            return isset(static::$baseNumbers[$current]) ? static::$baseNumbers[$current]."mije" : "mije";
        }
    }

    function create_10000_base($base, $current){
        if($base == 10000){
            if($current == 0){
                return "mije";
            }
            return isset(static::$baseNumbers[$current]) ? static::$baseNumbers[$current]."mije" : "mije";
        }
    }

} 