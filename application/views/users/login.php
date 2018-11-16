<?php echo form_open('users/login'); ?>
    <div class="row">
        <div class="col-md-4 offset-4">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <div class="form-group">
                <input type="text" name="telefone" class="form-control" placeholder="Número de Telefone" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
    </div>
<?php echo form_close(); ?>