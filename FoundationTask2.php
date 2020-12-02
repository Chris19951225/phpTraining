<?php
    function fibonacciLoop()
    {
        $curr = 0;
        $next = 1;

        $counter = 0;
        while ($counter <= 34){
            echo $curr."</br>";
            $temp = $next;
            $next = $curr + $next;
            $curr = $temp;

            $counter = $curr;
        }
    }

    function fibonacciRecur($curr)
    {
        if ($curr == 0 || $curr == 1) {
            return $curr;
        }
        else {
            return (fibonacciRecur($curr-1) + fibonacciRecur($curr - 2));
        }
    }

    echo "Loop:"."</br>";
    fibonacciLoop();
    echo "</br>";
    echo "Recursive:"."</br>";
    for($i = 0; $i < 10; $i++)
    {
        echo fibonacciRecur($i)."</br>";
    }
