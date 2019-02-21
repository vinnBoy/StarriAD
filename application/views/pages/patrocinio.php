<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<!-- Upload de videos -->
<?php echo form_open_multipart('pages/uploadPatrocinio') ?>
<div class="row center-x pt-5" >

    <div class="col-md-8 center-text">
        <br>
        <h3>Criar Patrocinio</h3><br>
        <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Nome da Patrocinio" required autofocus>
        </div>
        <div class="form-group">
            <textarea type="text" name="descricao" class="form-control" placeholder="Descrição" autofocus ></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="data_inicio" class="form-control" placeholder="Data de início (DD/MM/AAAA)" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="data_encerramento" class="form-control" placeholder="Data de encerramento (DD/MM/AAAA)"  autofocus>
        </div>

        <h6 class="text-center ">Selecione um arquivo para publicar</h6>
        <div class="form-group center-x">
            <input class="btn btn-outline-primary" type="file" name="file" id="file" />
        </div>

        <input class="btn btn-primary btn-block mt-5 " type="submit" name="submit" value="Publicar patrocinio"/>
    </div>
</div>
</form><br>
</div>
</div>