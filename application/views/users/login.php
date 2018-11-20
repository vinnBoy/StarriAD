<?php echo form_open('users/login'); ?>
    <div class="row center-x pt-5">
        <div class="col-md-4">
            <h1 class="text-center"><?php echo $title; ?></h1>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </div>
    </div>
<?php echo form_close(); ?>