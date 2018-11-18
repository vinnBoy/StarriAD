


<?php echo form_open_multipart('pages/upload ') ?>
<div class="row">
  <div class="col-md-4 ">
  <h2><?php echo $title ?></h2><br>
      <h6 class="text-center">Selecione o arquivo para enviar</h6>
      <div class="form-group">
        <input class="btn btn-outline-primary" type="file" name="file" id="file" />
      </div>
      <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Titulo" required autofocus>
      </div>
      <div class="form-group">
          <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"  autofocus></textarea>
      </div>
      <input class="btn btn-primary btn-block " type="submit" name="submit" value="Enviar"/>
  </div>    
</div>
</form><br>

<h4 class="text-center">Videos enviados</h4>

<video width="auto" height="240" controls>
  <source src="<?php echo base_url(); ?>uploads/Russia_in_15_seconds.mp4" type="video/MP4">
</video>