<h2><?php echo $title ?></h2><br>
<h4>Selecione o arquivo para enviar</h4>
<br><br>
<?php echo form_open_multipart('pages/upload') ?>
    
    <input class="btn btn-outline-primary" type="file" name="file" id="file" />
    <br /><br />
    <input class="btn btn-primary " type="submit" name="submit" value="Enviar"/>
</form>

