<?php snippet('header') ?>

<!-- Number of images per page-->
<?php $population = 5 ?>
<?php $pics = page('pics')->children()->listed() ?>

<?php $pagination = $pics->paginate($population) ?>


<div class="container-fluid">
	<div class="grid mt-5">
		<!-- used to check if first for sizer -->
		<?php $count = 1 ?>
		
		<?php foreach ($pagination as $pic) : ?>

			<!-- check if double sized -->
			<?php if ($pic->featured() != '') : ?>
				<?php if ($pic->featured() == true) : ?>
					<?php $makebig = 'col-md-6'; ?>
				<?php endif ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 800,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php else : ?>
				<!-- small image -->
				<?php $makebig = 'col-md-3' ?>
				<?php if ($cover = $pic->cover()->toFile()) : ?>
					<?php $thumb = $cover->thumb([
						'width' => 500,
						'quality' => 80
					]) ?>
				<?php endif ?>
			<?php endif ?>

			<div class="grid-sizer col-md-3"></div>

			<div class="grid-item <?= $makebig ?>">
				<div class="grid-item-content">
					<a href="<?= $pic->url() ?>">
						<img src="<?= $thumb->url() ?>" class="img-fluid" alt="<?= $pic->title() ?>">
					</a>
				</div>
			</div><!-- end card -->
			
			<?php $count++ ?> 
		<?php endforeach ?>
	</div><!-- end grid -->

	<!-- Pagination -->
	<?php if ($pagination->pagination()->hasPages()): ?>
		<nav aria-label="...">
			<ul class="pagination justify-content-center">

				<!-- Previous page --> 
				<li class="page-item <?= e($pagination->pagination()->hasPrevPage(), '', 'disabled') ?>">
			      <a class="page-link" href="<?= $pagination->pagination()->prevPageURL() ?>" tabindex="-1" aria-disabled="true">‹ Previous</a>
			    </li>
		 
			    <!-- center pages -->
			    <?php foreach ($pagination->pagination()->range($population) as $r): ?>
			    	<li class="page-item">
			    		<a<?= $pagination->page() === $r ? ' aria-current="page"' : '' ?> class="page-link" href="<?= $pagination->pagination()->pageURL($r) ?>"><?= $r ?></a>
			    	</li>
			  	<?php endforeach ?>

			  	<!-- next page--> 
			  	<li class="page-item <?= e($pagination->pagination()->hasNextPage(), '', 'disabled') ?>">
			      <a class="page-link" href="<?= $pagination->pagination()->nextPageURL() ?>" tabindex="-1" aria-disabled="true">Next ›</a>
			    </li>

			</ul>
		</nav>
	<?php endif ?>

</div>

<?php snippet('footer') ?>
