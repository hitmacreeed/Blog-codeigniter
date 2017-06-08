<br>

<?php foreach ($posts as $post) : ?>
	
	<div class="container">
		<h3><?php echo $post['title']; ?></h3>




		<div class="row">
			<div class="col-md-3">
				<img class="img-responsive image"  src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
			</div>

			<div class="col-md-9">

				<small class="post-date">Publicado em: <?php echo $post['created_at'];?></small>
				<strong >Categoria: <?php echo $post['name']; ?></strong>
				<!-- funcao word_limiter chamada no helper para limitar o texto que aparece... -->
				<?php echo word_limiter($post['body'],50); ?>
				<br><br>
				<p><a class="btn btn-info" href="<?php echo base_url('/posts/'.$post['slug']); ?>">Ver Mais</a></p>

			</div>
		</div>
	</div>
	
<?php endforeach; ?>
