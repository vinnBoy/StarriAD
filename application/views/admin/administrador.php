<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<div class="row center-x pt-5" >

  <div class="col-md-8 center-text">
 <br>
      
  <h3>Cadastre uma nova categoria</h3><br>
<?php echo form_open('admin/cadastrar_categorias');?>

    <div class="form-group">
        <input type="text" name="categoria" class="form-control" placeholder="Categoria"  autofocus></input>
    </div>

    <div class="form-group">
        <input type="text" name="subcategoria" class="form-control" placeholder="Subcategoria"  autofocus></input>
    </div>
    <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>  
    </div>
</form>
</div>
</div>