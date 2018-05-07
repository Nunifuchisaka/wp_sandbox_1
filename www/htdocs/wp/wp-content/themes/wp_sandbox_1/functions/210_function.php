<?php

/*
# テーマ内で使用する関数
*/



/*
## print_rの出力をpreタグで囲う
*/

function print_r_($val){
  echo '<pre>';
  print_r( $val );
  echo '</pre>';
}
