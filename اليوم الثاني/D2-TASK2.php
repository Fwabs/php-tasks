<?php

/*
Write a PHP function to print the next character of a specific character.
input : 'a'
Output : 'b'
input : 'z'
Output : 'a'
*/

// function letters($char){
//      foreach (range('a', 'z') as $alphas) {
//           $x = var_dump(explode(' ',$alphas));
//           while ($alphas == $char) {
//                echo next($char);
//           }
//      }
// }

// function letters($char){
//      foreach (range('a', 'z') as $alphas){
//           $x = str_split($alphas);
//           while ($char == $x) {
//                print_r(next($x));
//           }
//      }
// }

// letters("a")




function letters($alphas){
     $next_chara = ++$alphas;
     if (strlen($next_chara > 1)){
          echo $next_chara[0];
     }
}

letters("z")

?>