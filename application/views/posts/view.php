  <h3><?php echo $post['title']; ?></h3>
    <small class="post-date">Publicado em: <?php echo $post['created_at']; ?></small><br>
      <div class="post-body">
        <?php echo $post['body']; ?>
          </div>


 <hr>
<!-- form para apagar post-->
<?php echo form_open('/posts/delete/'.$post['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">


 </form>
