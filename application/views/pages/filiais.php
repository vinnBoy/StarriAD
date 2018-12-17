<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<div class="row center-x pt-5">   
    <div class="col-md-8 ">
    <?php echo validation_errors(); ?>
        <h3>Lojas participantes</h3>
        <?php echo form_open('pages/criar_filiais'); ?>
    <div class="form-group">
        <input type="text" name="loja_nome" class="form-control" placeholder="Nome"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="loja_cep" class="form-control" placeholder="CEP"  autofocus></input>
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
        <input type="text" name="loja_complemento" class="form-control" placeholder="Complemento"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="loja_bairro" class="form-control" placeholder="Bairro"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="loja_cidade" class="form-control" placeholder="Cidade"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="loja_estado" class="form-control" placeholder="Estado"  autofocus></input>
    </div>
    <div class="form-group">
        <input type="text" name="loja_centro" class="form-control" placeholder="Centro Comercial"  autofocus></input>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Cadastrar Filiais</button>
</div>
