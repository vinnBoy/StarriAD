<div class="col-md-12 center-x">
    <h2> <?= $title; ?> </h2>
</div>

<div class="row center-x pt-5">   
    <div class="col-md-8 ">
        <h3>Dados principais</h3>
        <?php echo form_open('users/cadastros'); ?>
            <div class="form-group " >
                <label></label>
                <input type="text" class="form-control input-style" name="nome"  name="nome" placeholder="Nome">
            </div>

            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="nome_empresa" placeholder="Empresa">
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
                <input type="text" class="form-control input-style" name="razao_social" placeholder="Razão Social">
            </div>
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control input-style" name="cnpj" placeholder="CNPJ">
            </div>

            <h3 class="pt-5">Dados Bancários</h3>
                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="banco" placeholder="Banco">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="agencia" placeholder="Agência">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="conta" placeholder="Conta">
                </div>

             <h3 class="pt-5">Endereço</h3>
                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="cep" id="cep" placeholder="CEP">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="rua" id="rua" placeholder="Rua">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="numero" placeholder="Número">
                </div>

                <div class="form-group " >
                    <label></label>
                    <input type="text" class="form-control input-style" name="complemento" placeholder="Complemento">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="bairro" id="bairro" placeholder="Bairro">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="cidade" id="cidade" placeholder="Cidade">
                </div>

                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control input-style" name="estado" id="estado" placeholder="Estado">
                </div>


           
                      

        <?php echo validation_errors(); ?>


            <button type="submit" class="btn btn-primary btn-block">Atualizar Cadastro</button>
        <?php echo form_close(); ?>
    </div>
</div>