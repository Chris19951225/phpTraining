<?php
    function addAllLoop($Array) {
        $total = 0;
        $size = count($Array);
        for($i = 0; $i < $size; $i++)
        {
            $currentTotal = 0;
            for($j = 0; $j < count($Array); $j++)
            {
                $currentTotal += $Array[$j];
            }

            array_shift($Array);
            $total += $currentTotal;
        }

        return $total;
    }

    function addAllRecursive($Array) {

        if(count($Array) == 0)
        {
            return 0;
        }

        $total = 0;
        for($i = 0; $i < count($Array); $i++)
        {
            $total += $Array[$i];
        }
        array_shift($Array);
        $total += addAllRecursive($Array);

        return $total;
    }

    $Array = [1,1,1,1,1]; //5+4+3+2+1=15
    echo addAllLoop($Array);
    echo "</br>";
    echo addAllRecursive($Array);