<div class="col-md-12 center-x">
    <h2> <?php echo $title; ?> </h2>
</div>
<!-- Upload de videos -->
<?php echo form_open_multipart('pages/setEditeCampanha') ?>
<div class="row center-x pt-5" >

    <div class="col-md-8 center-text">
        <br>
        <h3>Edite sua nova campanha</h3><br>
        <input type="text" style="display: none" name="id" required autofocus value="<?=$campanha['id']?>">
        <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Nome da campanha" required autofocus value="<?=$campanha['titulo']?>">
        </div>
        <div class="form-group">
            <textarea type="text" name="descricao" value="<?=$campanha['descricao']?>" class="form-control" placeholder="Descrição"  autofocus maxlength="150"></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="data_inicio" value="<?=$campanha['data_inicio']?>" class="form-control" placeholder="Data de início (DD/MM/AAAA)" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="data_encerramento" value="<?=$campanha['data_encerramento']?>" class="form-control" placeholder="Data de encerramento (DD/MM/AAAA)"  autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="investimento" value="<?=$campanha['investimento']?>" class="form-control" placeholder="Investimento (R$)" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="valor_desconto" value="<?=$campanha['valor_desconto']?>" class="form-control" placeholder="Valor do desconto (R$)"  autofocus>
        </div>
        <div class="form-group">
            <input type="text" name="num_cupons" value="<?=$campanha['num_cupons']?>" class="form-control" placeholder="Número de cupons" required autofocus>
        </div>
        <div class="form-group">
            <select class="col-md-12  form-control" name="categoria" id="">
                <option type="text" name="categoria"  autofocus>Categoria</option>
                <?php foreach ($categorias as $categoria) : ?>
                <?php if($campanha['categoria'] == $categoria['categoria']){ ?>
                        <option type="text" name="categoria" value="<?php echo $categoria['categoria']; ?>" selected autofocus><?php echo $categoria['categoria']; ?></option>
                <?php }else{ ?>
                        <option type="text" name="categoria" value="<?php echo $categoria['categoria']; ?>" autofocus><?php echo $categoria['categoria']; ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select class="col-md-12 form-control" name="subcategoria" id="">
                <option type="text" name="subcategoria"   autofocus>Subcategoria</option>
                <?php foreach ($categorias as $categoria) : ?>
                <?php if($campanha['subcategoria'] == $categoria['subcategoria']){ ?>
                        <option type="text" name="subcategoria" value="<?php echo $categoria['subcategoria']; ?>" selected autofocus><?php echo $categoria['subcategoria']; ?></option>
                <?php }else{ ?>
                        <option type="text" name="subcategoria" value="<?php echo $categoria['subcategoria']; ?>" autofocus><?php echo $categoria['subcategoria']; ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="palavras_chave" value="<?=$campanha['palavras_chave']?>" class="form-control" placeholder="Palavras chave"  autofocus>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="pergunta" value="<?=$campanha['pergunta']?>" class="form-control" placeholder="Pergunta chave"  autofocus>
        </div>
        <div class="form-group center-x">
            <?php if($campanha['resposta1']){ ?>
            <input type="radio" name="resposta_correta" id="resposta1" value="resposta1" checked="checked">
            <?php }else{ ?>
                <input type="radio" name="resposta_correta" id="resposta1" value="resposta1" >
            <?php } ?>
            <input type="text" name="resposta1" value="<?=$campanha['resposta1']?>" class="form-control" placeholder="Resposta 1"  autofocus>
        </div>
        <div class="form-group center-x">
            <?php if($campanha['resposta2']){ ?>
            <input type="radio" name="resposta_correta" id="resposta2" value="resposta2" checked="checked">
            <?php }else{ ?>
                <input type="radio" name="resposta_correta" id="resposta2" value="resposta2" >
            <?php } ?>
            <input type="text" name="resposta2" value="<?=$campanha['resposta2']?>" class="form-control" placeholder="Resposta 2"  autofocus>
        </div>
        <div class="form-group center-x">
            <?php if($campanha['resposta3']){ ?>
            <input type="radio" name="resposta_correta" id="resposta3" value="resposta3" checked="checked">
            <?php }else{ ?>
                <input type="radio" name="resposta_correta" id="resposta3" value="resposta3" >
            <?php } ?>
            <input type="text" name="resposta3" value="<?=$campanha['resposta3']?>" class="form-control" placeholder="Resposta 3"  autofocus>
        </div>
        <div class="form-group center-x ">
            <?php if($campanha['resposta4']){ ?>
            <input type="radio" name="resposta_correta" id="resposta4" value="resposta4" checked="checked">
            <?php }else{ ?>
                <input type="radio" name="resposta_correta" id="resposta4" value="resposta4" >
            <?php } ?>
            <input type="text" name="resposta4" value="<?=$campanha['resposta4']?>" class="form-control" placeholder="Resposta 4"  autofocus>
        </div>

<!--        <h6 class="text-center ">Selecione um arquivo para publicar</h6>-->
<!--        <div class="form-group center-x">-->
<!--            <input class="btn btn-outline-primary" type="file" name="file" id="file" />-->
<!--        </div>-->


        <input class="btn btn-primary btn-block mt-5 " type="submit" name="submit" value="Editar campanha"/>
    </div>
</div>
</form><br>
</div>
</div>