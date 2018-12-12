<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
 <!-- Upload de videos -->
 <?php echo form_open_multipart('pages/upload') ?>
<div class="row center-x pt-5" >

  <div class="col-md-6 center-text">
 <br>
      
  <h3>Crie sua nova campanha</h3><br>
      <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Título" required autofocus>
      </div>
      <div class="form-group">
          <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"  autofocus></textarea>
      </div>
      <h6 class="text-center ">Selecione um vídeo para publicar</h6>
      <div class="form-group center-x">
        <input class="btn btn-outline-primary" type="file" name="file" id="file" />
      </div>
      <input class="btn btn-primary btn-block " type="submit" name="submit" value="Enviar"/>
  </div>    
</div>
</form><br>

  <!-- Exibição de videos -->
<h3 class="text-center center-x pt-5">Vídeos enviados</h3>

<div class="container table-active">
  <div class="row" >  

    <?php foreach($videos as $video) : ?>

      <div class="col-md-4 padding-left-10" >
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



