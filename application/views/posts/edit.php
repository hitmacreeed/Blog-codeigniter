<br>
<?php echo validation_errors(); ?>
<div class="container">
<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">

<div class="form-group">
  <label for="exampleInputEmail1">Titulo</label>
  <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
</div>

<div class="form-group">
  <label for="exampleInputPassword1">Corpo</label>
  <textarea class="form-control" name="body" id="editor1"> <?php echo $post['body']; ?></textarea> 
</div>

<div class="form-group">
  <label>Selecionar Categorias</label>
  <select name="category_id" class="form-control">
    <!-- Procorrer os tipos de categorias na base de dados e mostrar num dropdown  -->
    <?php foreach ($categories as $category) : ?>
      <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
    <?php endforeach;?>
  </select>
</div>


<div class="form-group">
  <label for="exampleInputPassword1">Carregar Foto para o post</label>
  <input type="file" class="form-control" name="userfile" size="10">
</div>

<button type="submit" class="btn btn-info">Submeter</button>
</form>
</div>