<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>

 
  <h3 class="col-md-8 center-x pt-5">Campanhas Publicadas</h3>
  <div class="container table-active">
  <div class="row" >  
  <?php foreach ($campanhas as $campanha) : ?>
  <div class="col-md-4 center-text padding-left-10">
    <h5>Usuário</h5>
    <h5>Nome da campanha</h5>
    <label><?php echo $campanha['titulo'];?></label>
    <h5>Investimento</h5>
    <label><?php echo $campanha['investimento'];?></label>
    <h5>Categoria</h5>
    <label><?php echo $campanha['categoria'];?></label>
  </div>
  <?php endforeach; ?>
  </div>    
  </div>  
