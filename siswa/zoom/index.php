<?php
require_once 'config.php';
 
$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
?>
  
<a href="<?php echo $url; ?>">Login with Zoom</a>


<form method="post" enctype="multipart/form-data" action="create-meeting.php">

	<div>
		<label>topik</label>
		<input type="text" name="topik">
	</div>
	<br><br>

	<div>
		<label>Tanggal Mulai</label>
		<input type="datetime-local" name="tanggal_mulai" step="1">
	</div>
	<br><br>

	<div>
		<label>Durasi</label>
		<input type="number" name="durasi">
	</div>
	<br><br>

	<div>
		<label>Password</label>
		<input type="text" name="password">
	</div>
	<br><br>
	
	<button type="submit">buat</button>
</form>
