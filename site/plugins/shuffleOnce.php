<?php 

// shuffle pages by a session based seed or supply a seed
pages::$methods['shuffleOnce'] = function($pages, $seed = null) {
  if(is_null($seed)) {
    $seed = s::get('seed');

    if(is_null($seed)) {
      $seed = time();
      s::set('seed', $seed);
    }
  }

  mt_srand($seed);

  $keys = array_keys($pages->data);
  $size = count($keys);

  for($i = 0; $i < $size; ++$i) {
    list($chunk) = array_splice($keys, mt_rand(0, $size - 1), 1);
    array_push($keys, $chunk);
  }

  $collection = clone $pages;
  $collection->data = array();
  foreach($keys as $key) {
    $collection->data[$key] = $pages->data[$key];
  }

  return $collection;
};