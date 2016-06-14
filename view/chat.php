<?php 

	session_start();
	if (!isset($_SESSION['id_logchat'])) {
		header("location:./?p=login");
	}
?>

	<div id="ChatBox-Container">
		<div id="text-container">
			<div class="text"></div>
		</div>
		<div id="input-container">
			<input type="text" id="Chatext">
			<input type="button" id="Chatbtn">
		</div>
	</div>

	<script type="text/javascript">
		var user = <?php echo $_SESSION['id_user'] ?> ;
	</script>