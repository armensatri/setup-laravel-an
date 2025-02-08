<?php

namespace App\Helpers;

class RandomUrl
{
  public static function GenerateUrl($length = 5)
  {
    $characters = 'abcdefghijklmnopqrstuvwxyz';

    $slug = '';

    for ($i = 0; $i < $length; $i++) {
      $slug .= $characters[rand(0, strlen($characters) - 1)];
    }

    return '=' . strtolower($slug) . '=';
  }
}
