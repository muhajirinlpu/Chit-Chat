<?php 
	session_start();
	if (!isset($_SESSION['id_user'])) {
		header("location:./?p=login");
	}
?>
	<div id="ChatBox-Container">
		<div id="text-container">
			<div class="text"></div>
		</div>
		<div id="input-container">
			<textarea id="Chatext"></textarea>
			<input type="button" id="Chatbtn">
		</div>
	</div>

	<div id="Online-Container">
		<ul id="onText"></ul>
	</div>

	<script type="text/javascript">
		var user = <?php echo $_SESSION['id_user'] ?> ;
	</script>