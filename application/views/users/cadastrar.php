 <div class="row">   
    <div class="col-md-4 offset-4">
        <h1 class="text-center"><?= $title ?></h1>
        <?php echo validation_errors(); ?>

        <?php echo form_open('users/cadastrar'); ?>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome">
            </div>

            <div class="form-group">
                <label>Nome da Empresa</label>
                <input type="text" class="form-control" name="nome_empresa" placeholder="Nome da Empresa">
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail">
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" class="form-control" name="telefone" placeholder="Telefone">
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Senha">
            </div>

            <div class="form-group">
                <label>Confirmar Senha</label>
                <input type="password" class="form-control" name="senha2" placeholder="Confirmar Senha">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        <?php echo form_close(); ?>
    </div>
</div>