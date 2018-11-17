<h2><?php echo $title ?></h2><br>
<h4>Selecione o arquivo para enviar</h4>
<br><br>
<?php echo form_open_multipart('pages/uploads') ?>
    <input class="btn btn-outline-primary" type="file" name="file" id="file" />
    <br /><br />
    <input class="btn btn-primary " type="submit" name="submit" value="Enviar"/>
</form><br>

<video width="auto" height="240" controls>
  <source src="<?php echo base_url(); ?>uploads/Russia_in_15_seconds.mp4" type="video/MP4">
</video>