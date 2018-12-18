<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
 <!-- Upload de videos -->
 <?php echo form_open_multipart('pages/upload') ?>
<div class="row center-x pt-5" >

  <div class="col-md-8 center-text">
 <br>
      
  <h3>Crie sua nova campanha</h3><br>
      <div class="form-group">
          <input type="text" name="titulo" class="form-control" placeholder="Nome da campanha" required autofocus>
      </div>
      <div class="form-group">
          <textarea type="text" name="descricao" class="form-control" placeholder="Descrição"  autofocus maxlength="150"></textarea>
      </div>
      <div class="form-group">
          <input type="text" name="data_inicio" class="form-control" placeholder="Data de início" required autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="data_encerramento" class="form-control" placeholder="Data de encerramento"  autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="investimento" class="form-control" placeholder="Investimento (R$)" required autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="valor_desconto" class="form-control" placeholder="Valor do desconto (R$)"  autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="num_cupons" class="form-control" placeholder="Número de cupons" required autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="categoria" class="form-control" placeholder="Categoria"  autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="sub_categoria" class="form-control" placeholder="Sub-categoria"  autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="palavras_chave" class="form-control" placeholder="Palavras chave"  autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="pergunta" class="form-control" placeholder="Pergunta chave"  autofocus>
      </div>
      
      <h6 class="text-center ">Selecione um arquivo para publicar</h6>
      <div class="form-group center-x">
        <input class="btn btn-outline-primary" type="file" name="file" id="file" />
      </div>

      <h6>Filiais participantes</h6><br>
      <?php foreach ($filial as $filiais) : ?>
        <input type="checkbox" name="<?php $name; ?>" id="<?php $id; ?>">
      <?php endforeach;?>
      
      
      <input class="btn btn-primary btn-block " type="submit" name="submit" value="Publicar campanha"/>
  </div>    
</div>
</form><br>

  <!-- Exibição de videos -->
<h3 class="text-center center-x pt-5">Campanhas enviadas</h3>

<div class="container table-active">
  <div class="row" >  

    <?php foreach($campanhas as $campanha) : ?>

      <div class="col-md-4 padding-left-10" >
        <h4><?php echo $campanha['titulo']; ?></h4>
        <label ><?php echo $campanha['descricao']; ?></label>    
        <video width="auto" height="240" controls>
          <source src="<?php echo base_url() .'uploads/'.$campanha['nome_arquivo']; ?>" type="video/MP4">
        </video><br><br>
        
        <?php echo form_open('pages/delete/'.$campanha['id']); ?>
          <input type="submit" value="remover" class="btn btn-danger btn-sm">
          <input type="hidden" name="nome_arquivo" value="<?php echo $campanha['nome_arquivo']; ?>">
        </form> <br><br> 
      </div>

    <?php endforeach; ?>

    </div>    
  </div>  

  </div>
      <!-- /.content-wrapper -->
</div>
    <!-- /#wrapper -->



