<?php

function Rp($value) {
  $format = "Rp " . number_format((float)$value,0,',','.');
  return $format;
}

function string_decode($str){
    $decode = html_entity_decode($str, ENT_QUOTES | ENT_IGNORE, "UTF-8");
    return $decode;
}