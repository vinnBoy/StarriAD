
 <!-- Upload de videos -->
<?php echo form_open_multipart('pages/upload ') ?>
<div class="row">
  <div class="col-md-4 offset-4 center-text">
  <h2 ><?php echo $title ?></h2><br>
      <h6 class="text-center">Selecione um arquivo para enviar</h6>
      <div class="form-group">
        <input class="btn btn-outline-primary" type="file" name="file" id="file" />
      </div>
      <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Título" required autofocus>
      </div>
      <div class="form-group">
          <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"  autofocus></textarea>
      </div>
      <input class="btn btn-primary btn-block " type="submit" name="submit" value="Enviar"/>
  </div>    
</div>
</form><br>

  <!-- Exibição de videos -->
<h3 class="text-center padding-top-5">Vídeos enviados</h3>

<div class="container table-active">
  <div class="row" style="padding-left:7%">  

    <?php foreach($videos as $video) : ?>
      <div class="col-md-4" >
        <h4><?php echo $video['titulo']; ?></h4>
        <label ><?php echo $video['descricao']; ?></label>    
        <video width="auto" height="240" controls>
          <source src="<?php echo base_url() .'uploads/'.$video['nome_arquivo']; ?>" type="video/MP4">
        </video><br><br>
        <?php echo form_open('pages/delete/'.$video['id']); ?>
          <input type="submit" value="remover" class="btn btn-danger btn-sm">
          <input type="hidden" name="nome_arquivo" value="<?php echo $video['nome_arquivo']; ?>">
        </form> <br><br> 
      </div>
    <?php endforeach; ?>

    </div>    
  </div>  

  </div>
      <!-- /.content-wrapper -->
</div>
    <!-- /#wrapper -->



