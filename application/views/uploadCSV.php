<html>
<div class="row">   <h4><img src="../../assets/img/i-admin.png" width="35" height="35" alt="Contacts" />Upload SCV</h4> <form method="POST" action="<?= base_url()?>CSV/do_upload_csv" enctype='multipart/form-data'>
    <div class="span4">
    <input type="file" name="csv_file"></input><br>
    <input type="submit" value="submit" class="btnGreen"></input>
    </div>
	</form>
</div>
</html>