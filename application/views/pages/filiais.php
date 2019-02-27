<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<div class="row center-x pt-5">   
    <div class="col-md-8 ">
    <?php echo validation_errors(); ?>
        <h3>Cadastrar Filiais</h3>
        <?php echo form_open('pages/criar_filial'); ?>
    <div class="form-group">
        <input type="text" name="nome" class="form-control" placeholder="Nome"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="cep" class="form-control" placeholder="CEP"  id="cep" autofocus></input>
    </div>
    <div class="row">
        <div class="col">
            <label></label>
            <input type="text" class="form-control input-style" name="rua" id="rua"  placeholder="Rua">
        </div>

        <div class="col">
            <label></label>
            <input type="text" class="form-control input-style" name="numero" placeholder="Número">
        </div>
    </div><br>
    <div class="form-group">
        <input type="text" name="complemento" class="form-control" placeholder="Complemento"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="bairro" class="form-control" placeholder="Bairro" id="bairro" autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="cidade" class="form-control" placeholder="Cidade" id="cidade" autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="estado" class="form-control" placeholder="Estado"  id="estado" autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="centro_comercial" class="form-control" placeholder="Centro Comercial"  autofocus></input>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Cadastrar Filial</button>
</div>
