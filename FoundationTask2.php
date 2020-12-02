<?php
    function fibonacciLoop($max)
    {
        $curr = 0;
        $next = 1;

        $counter = 0;
        while ($counter <= $max){
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

    /*echo "Loop:"."</br>";
    fibonacciLoop(63);
    echo "</br>";
    echo "Recursive:"."</br>";
    for($i = 0; $i < 10; $i++)
    {
        echo fibonacciRecur($i)."</br>";
    }*/

    if(isset($_POST['fibonum']))
    {
        $fibonum = $_POST['fibonum'];
        fibonacciLoop($fibonum);
    }
