 <div class="row center-x pt-5">   
    <div class="col-md-8 ">
        <h1 class="text-center"><?= $title ?></h1>

        <?php echo form_open('users/cadastrar'); ?>
            <div class="form-group pt-5" >
                <label></label>
                <input type="text" class="form-control input-style" name="nome" placeholder="Nome">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="nome_empresa" placeholder="Empresa">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="cnpj" placeholder="CNPJ">
            </div>

            <div class="form-group">
                <label></label>
                <input type="email" class="form-control input-style" name="email" placeholder="E-mail">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="telefone" placeholder="Telefone">
            </div>

            <div class="form-group">
                <label></label>
                <input type="password" class="form-control input-style" name="senha" placeholder="Senha">
            </div>

            <div class="form-group">
                <label></label>
                <input type="password" class="form-control input-style" name="senha2" placeholder="Confirmar Senha">
            </div>

        <?php echo validation_errors(); ?>


            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        <?php echo form_close(); ?>
    </div>
</div>