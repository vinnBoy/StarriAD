<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
 
<div class="row ml-5  pt-5" >
   <a href='criar_campanha'> <button class="btn btn-primary">Criar Campanha</button> </a>
  
</div>

  <!-- Exibição de videos -->

<div class="container table-active mt-5">
<h3 class="text-center center-x ">Listagem de Campanhas</h3>
  <div class="row pt-5" >  

    <?php foreach($campanhas as $campanha) : ?>
      <?php $ext = explode('.',$campanha['nome_arquivo']); ?>
      <div class="col-md-4 padding-left-10" >
        <h5><?php echo $campanha['titulo']; ?></h5>
        <label ><?php echo $campanha['descricao']; ?></label> 
            <?php if ($ext['1'] == 'MP4'  ) : ?>
                <video width="auto" height="240" controls>
                    <source src="<?php echo base_url() .'uploads/'.$campanha['nome_arquivo']; ?>" type="video/MP4">
                </video><br><br>
            <?php else : ?>
                <img width="auto" height="240" src="<?php echo base_url() .'uploads/'.$campanha['nome_arquivo']; ?>"><br><br>
            <?php endif;?>
            <label ><?php echo "Categorias: ".$campanha['categoria']."|".$campanha['sub_categoria']; ?></label><br>
            <label ><?php echo "Filiais: ".$campanha['filiais']; ?></label> <br>
            <label ><?php echo "Investimento: R$ ".$campanha['investimento']; ?></label> <br>
        
        <?php echo form_open('pages/delete/'.$campanha['id']); ?>
          <input type="submit" value="remover campanha" class="btn btn-danger btn-sm">
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



