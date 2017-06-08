  <br>
  <div class="container">

  <div class="row">

    <div class="col-md-3">
      <img class="img-responsive image"  src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    </div>


    <div class="col-md-9">
      <h3><?php echo $post['title']; ?></h3>

      <small class="post-date">Publicado em: <?php echo $post['created_at']; ?></small><br>

      <div class="post-body">
       <?php echo $post['body']; ?>
     </div>

     <hr>
     <!-- editar posts -->
     <a class="btn btn-warning " href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Editar</a>

     <!-- form para apagar post-->
     <?php echo form_open('/posts/delete/'.$post['id']);?>  

     <input type="submit" value="Apagar" class="btn btn-danger" name="delete">  

   </form> 

       </div>
          </div>
            </div>

