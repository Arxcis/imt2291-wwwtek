<?php

class Pinterest {
  public static function getPins ($searchString) {
    $searchString = str_replace (" ", "%20", $searchString);
    $data = file_get_contents("https://no.pinterest.com/search/pins/?q=$searchString");
    //echo $data;
    $dom = new DOMDocument;
    @$dom->loadHTML($data);
    $xpath = new DOMXPath($dom);
    $nlist = $xpath->query("//div[@class='GrowthUnauthPinImage']/a/img");
    $tmp = [];
    foreach($nlist as $img) {
      $srcSet =  $img->getAttribute('srcset');
      $srcSet = explode(", ", $srcSet);
      foreach ($srcSet as $key => $value) {
        $srcSet[$key] = trim(substr($value, 0, strlen($value)-3));
      }
      $tmp[] = $srcSet[0];
    }
    return $tmp;
  }
}