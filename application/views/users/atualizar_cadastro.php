<div class="col-md-12 center-x">
    <h2> <?= $title; ?> </h2>
</div>

<div class="row center-x pt-5">   
    <div class="col-md-8 ">
    <?php echo validation_errors(); ?>
        <h3>Dados principais</h3>
        <?php echo form_open('users/atualizar_cadastro'); ?>
            <div class="form-group " >
                <label></label>
                <input type="text" class="form-control input-style" name="nome" value="<?php echo $users[0]['nome'];?>" placeholder="Nome">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="nome_empresa" value="<?php echo $users[0]['nome_empresa'];?>" placeholder="Empresa">
            </div>

            <div class="form-group">
                <label></label>
                <input type="email" readonly class="form-control input-style" name="email" value="<?php echo $users[0]['email'];?>" placeholder="E-mail">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="telefone" value="<?php echo $users[0]['telefone'];?>" placeholder="Telefone">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="razao_social" value="<?php echo $users[0]['razao_social'];?>" placeholder="Razão Social">
            </div>
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="cnpj" value="<?php echo $users[0]['cnpj'];?>" placeholder="CNPJ">
            </div>

            <h3 class="pt-5">Dados Bancários</h3>
                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="banco" value="<?php echo $users[0]['banco'];?>" placeholder="Banco">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="agencia" value="<?php echo $users[0]['agencia'];?>" placeholder="Agência">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="conta" value="<?php echo $users[0]['conta'];?>" placeholder="Conta">
                </div>

             <h3 class="pt-5">Endereço</h3>
                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="cep" id="cep" value="<?php echo $users[0]['cep'];?>" placeholder="CEP">
                </div>
                <div class="row">
                    <div class="col">
                        <label></label>
                        <input type="text" class="form-control input-style" name="rua" id="rua" value="<?php echo $users[0]['rua'];?>" placeholder="Rua">
                    </div>

                    <div class="col">
                        <label></label>
                        <input type="text" class="form-control input-style" name="numero" value="<?php echo $users[0]['numero'];?>" placeholder="Número">
                    </div>
                    </div><br>
                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="complemento" value="<?php echo $users[0]['complemento'];?>" placeholder="Complemento">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="bairro" id="bairro" value="<?php echo $users[0]['bairro'];?>" placeholder="Bairro">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="cidade" id="cidade" value="<?php echo $users[0]['cidade'];?>" placeholder="Cidade">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="estado" id="estado" value="<?php echo $users[0]['estado'];?>" placeholder="Estado">
                </div>


            <button type="submit" class="btn btn-primary btn-block">Atualizar Cadastro</button>
        <?php echo form_close(); ?>
    </div>
</div>