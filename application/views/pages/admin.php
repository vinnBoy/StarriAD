<h2><?php echo $title ?></h2><br>
<h4>Enviar vídeos</h4>
<br><br>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file"><span>Filename:</span></label>
<button class="btn btn-default" type="file" name="file" id="file" >Arquivo</button> 
<br /><br />
<button class="btn btn-primary" type="submit" name="submit" value="Submit">Enviar</button>
</form>

<!-- https://stackoverflow.com/questions/18217964/upload-video-files-via-php-and-save-them-in-appropriate-folder-and-have-a-databa/18219669 -->