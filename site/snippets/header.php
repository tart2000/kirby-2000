<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates. 
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <meta name="description" content="Collecting everything 2000">
  <meta name="keywords" content="Photography, Vintage, 2000, Fast food, International">
  <meta name="author" content="Arthur Schmitt AKA tart2000">

  <!-- Meta tags for sharing -->
  <meta property="og:title" content="<?= $site->title() ?>">
  <meta property="og:description" content="Collecting everything 2000">
  <meta property="og:image" content="<?= $site->url() ?>/assets/2000_socials.jpg">
  <meta property="og:url" content="http://2000.photos">

  <meta name="twitter:title" content="<?= $site->title() ?>">
  <meta name="twitter:description" content="Collecting everything 2000">
  <meta name="twitter:image" content="<?= $site->url() ?>/assets/2000_socials.jpg">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file. 
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->

  <link rel="apple-touch-icon" sizes="180x180" href="<?= $site->url() ?>/assets/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $site->url() ?>/assets/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $site->url() ?>/assets/favicon-16x16.png">
  <link rel="manifest" href="<?= $site->url() ?>/assets/site.webmanifest">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Passion+One&display=swap" rel="stylesheet">


  <?= css(['assets/main.css', '@auto']) ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand ml-4" href="<?= $site->url() ?>">
  	<img src="<?= $site->url() ?>/assets/globe.png">
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    	<!-- 
      <li class="nav-item <?php e($page->url() == $site->url(),'active') ?>">
        <a class="nav-link" href="<?= $site->url() ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
  -->
    </ul>
    <ul class="navbar-nav navbar-right pr-3">
    	<li class="nav-item">
	        <a class="nav-link disabled" href="#">Filter by:</a>
	    </li>
	    <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="countryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?php if ($country = param('country')) : ?>
	        		<?= html($country) ?>
	        	<?php else : ?>
	        		Country
	        	<?php endif ?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="countryDropdown">
	        	<?php $countries = $site->page('pics')->children()->listed()->pluck('country', ',', true); ?>
	        	<?php sort($countries) ?>
	        	<?php foreach ($countries as $country) : ?>
		          <a class="dropdown-item" href="<?= url('/', ['params' => ['country' => $country]]) ?>">
		          	<?= html($country) ?>
		          </a>
		        <?php endforeach ?>
	        </div>
	    </li>
	    <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <?php if ($tag = param('tag')) : ?>
	        		<?= html($tag) ?>
	        	<?php else : ?>
	        		Tags
	        	<?php endif ?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	        	<?php $tags = $site->page('pics')->children()->listed()->pluck('tags', ',', true); ?>
	        	<?php sort($tags); ?>
	        	<?php foreach ($tags as $tag) : ?>
		          <a class="dropdown-item" href="<?= url('/', ['params' => ['tag' => $tag]]) ?>">
		          	<?= html($tag) ?>
		          </a>
		        <?php endforeach ?>
	        </div>
	    </li>
	    <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="yearDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        	<?php if ($year = param('year')) : ?>
	        		<?= html($year) ?>
	        	<?php else : ?>
	        		Year
	        	<?php endif ?>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="yearDropdown">
	        	<?php $years = $site->page('pics')->children()->listed()->pluck('year', ',', true); ?>
	        	<?php sort($years); ?>
	        	<?php foreach ($years as $year) : ?>
		          <a class="dropdown-item" href="<?= url('/', ['params' => ['year' => $year]]) ?>">
		          	<?= html($year) ?>
		          </a>
		        <?php endforeach ?>
	        </div>
	    </li>
	   	<li class="nav-item">
	        <a class="ml-3 btn btn-outline-dark" href="https://airtable.com/shrXgXpVFSYcA8UVr" target="_blank">Submit</a>
	    </li>

	    <!-- 
	    <li class="nav-item">
	        <a class="nav-link" href="<?= $site->url().'/sort:atoz' ?>">A>Z</a>
	    </li>
		-->
  	</ul>
  </div>
</nav>

<img src="<?= $site->url() ?>/assets/background.png" class="img-fluid" id="bg">

