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
          <textarea type="text" name="descricao" class="form-control" placeholder="Descrição" autofocus maxlength="150"></textarea>
      </div>
      <div class="form-group">
          <input type="text" name="data_inicio" class="form-control" placeholder="Data de início (DD/MM/AAAA)" required autofocus>
      </div>
      <div class="form-group">
          <input type="text" name="data_encerramento" class="form-control" placeholder="Data de encerramento (DD/MM/AAAA)"  autofocus>
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
      <select class="col-md-12  form-control" name="categoria" id="">
          <option type="text" name="categoria"  autofocus>Categoria</option>
          <?php foreach ($categorias as $categoria) : ?>
            <option type="text" name="categoria" value="<?php echo $categoria['categoria']; ?>" autofocus><?php echo $categoria['categoria']; ?></option>
          <?php endforeach; ?>
      </select>
      </div>
      <div class="form-group">
      <select class="col-md-12 form-control" name="subcategoria" id="">
          <option type="text" name="subcategoria"   autofocus>Subcategoria</option>
          <?php foreach ($categorias as $categoria) : ?>
            <option type="text" name="subcategoria" value="<?php echo $categoria['subcategoria']; ?>" autofocus><?php echo $categoria['subcategoria']; ?></option>
          <?php endforeach; ?>
      </select>
      </div>
      <div class="form-group">
          <input type="text" name="palavras_chave" class="form-control" placeholder="Palavras chave"  autofocus>
      </div>
      <br>
      <div class="form-group">
          <input type="text" name="pergunta" class="form-control" placeholder="Pergunta chave"  autofocus>
      </div>
      <div class="form-group center-x">
      <input type="radio" name="resposta_correta" id="resposta1" value="resposta1">
          <input type="text" name="resposta1" class="form-control" placeholder="Resposta 1"  autofocus>
      </div>
      <div class="form-group center-x">
      <input type="radio" name="resposta_correta" id="resposta2" value="resposta2">
          <input type="text" name="resposta2" class="form-control" placeholder="Resposta 2"  autofocus>
      </div>
      <div class="form-group center-x">
      <input type="radio" name="resposta_correta" id="resposta3" value="resposta3">
          <input type="text" name="resposta3" class="form-control" placeholder="Resposta 3"  autofocus>
      </div>
      <div class="form-group center-x ">
      <input type="radio" name="resposta_correta" id="resposta4" value="resposta4">
          <input type="text" name="resposta4" class="form-control" placeholder="Resposta 4"  autofocus>
      </div>
      
      <h6 class="text-center ">Selecione um arquivo para publicar</h6>
      <div class="form-group center-x">
        <input class="btn btn-outline-primary" type="file" name="file" id="file" />
      </div>
      <div ><br>
        <h5>Filiais participantes</h5><br>
        <?php foreach ($filiais as $filial) : ?>
            <input type="checkbox" name="filial[]" id="<?php echo $filial['id']; ?>" value="<?php echo $filial['nome']; ?>">
            <label for="<?php echo $filial['id']; ?>"><?php echo $filial['nome']." "; ?> </label>
        <?php endforeach;?>
      </div>
      
      <input class="btn btn-primary btn-block mt-5 " type="submit" name="submit" value="Publicar campanha"/>
  </div>    
</div>
</form><br>
</div>
</div>