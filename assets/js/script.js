$(function(){
	
	var notif = new Audio('assets/notif.mp3');
	var lastId = 0;
	var check;


	function checkChat(){
		$.getJSON('php/Process/ChatProcess.php?do=countChat',function(result){
			if (result) {
				check = result;
			}else{
				check = false;
			}
		});		
		return check;
	}

	function readChat(a){
		$.ajax({
			method   : "POST",
			url    	 : "php/Process/ChatProcess.php?do=readMessage",
			dataType : "json",
			data     : { current : a}
		}).done(function(result){
			var data = result['data'];
			var html = "";
			$.each(data,function(a,b){
				html+="<div class='chat-container' data-action="+a+"><div class='body-chat'><p class='author'>"+b.username+"</p><div class='time' data-action="+a+">"+b.waktu+"</div><p class='content'>"+b.text+"</p></div></div>";				
			});
			$('<div></div>').html(html).appendTo('.text');
			html = "";
			$('#text-container').animate({scrollTop:$('#text-container').height()*10}, 'slow');
			if (data[data.length-1]['author']!=user) {
				notif.play();
			}
		});

	}

	function refreshChat(){
		checkChat();
		if (lastId < check) {
			readChat(lastId);
			lastId = check;
		}
		/*console.log('lastId = '+lastId+'check = '+check);		*/
	}
	
	$(window).on('load',function(){
		refreshChat();
	});

	$("#Chatbtn").on('click',function(){
		var isi = $('#Chatext').val();
		$.ajax({
			method   : "POST",
			url      : "php/Process/ChatProcess.php?do=sendMessage",
			data     : { isi : isi},
			dataType : "json",
			success  : function(result){
				if (result['data']=="success") {
					refreshChat();
				}
			}
		});
	});

	setInterval(function(){
		refreshChat();
	},1500);

});