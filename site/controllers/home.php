<?php

return function($page) {

  // population 
  $population = 40;

  // fetch the basic set of pages
  $pics = $pics = page('pics')->children()->listed();

  // add the tag filter
  if($country = param('country')) {
    $pics = $pics->filterBy('country', $country, ',');
  }

  // add the tag filter
  if($tag = param('tag')) {
    $pics = $pics->filterBy('tags', $tag, ',');
  }

  // add the tag filter
  if($year = param('year')) {
    $pics = $pics->filterBy('year', $year, ',');
  }

  // apply pagination
  $pagination = $pics->paginate($population);

  return compact('pics', 'tags', 'tag', 'pagination', 'population');

};
