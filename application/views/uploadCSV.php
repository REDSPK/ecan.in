<html>
    <form method="POST" action="<?= base_url()?>CSV/do_upload_csv" enctype='multipart/form-data'>
    <div class="span4">
    <input type="file" name="csv_file"></input>
    <input type="submit" value="submit" class="btn btn-inverse"></input>
    </div>
	</form>
</html>