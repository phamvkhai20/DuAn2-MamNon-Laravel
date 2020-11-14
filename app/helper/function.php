<?php


function ShowErrors($errors,$name){
if($errors->has($name)){
return
 "<span style='color: red'>". $errors->first($name)."</span>";
}
}