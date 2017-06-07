<h2><?=$title ?></h2>
  <?php echo validation_errors(); ?>
 	  <?php echo form_open('posts/create'); ?>

  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" name="title">
     </div>
       <div class="form-group">
        <label for="exampleInputPassword1">Corpo</label>
         <textarea class="form-control" name="body" ></textarea> 
           </div>
     		<button type="submit" class="btn btn-default">Submeter</button>
	</form>