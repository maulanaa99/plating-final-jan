<?php

use Illuminate\Support\Facades\Route;

function set_active($uri, $output = "active")
{
 if( is_array($uri) ) {
   foreach ($uri as $u) {
     if (Route::is($u)) {
       return $output;
     }
   }
 } else {
   if (Route::is($uri)){
     return $output;
   }
 }
}

function format_uang ($angka) {
  return number_format($angka, 0, ',', '.');
}

function tambah_nol_didepan($value, $threshold = null)
{
    return sprintf("%0". $threshold . "s", $value);
}