$(function(){
	
	var notif = new Audio('assets/notif.mp3');
	var lastId = 0;
	var check;
	var lastOn = 0;

	var chat = {

		checkChat : function(){
			$.getJSON('php/Process/ChatProcess.php?do=countChat',function(result){
				if (result) {
					check = result;
				}else{
					check = false;
				}
			});		
			return check;
		},
		
		readChat : function(a){
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

		},
		
		refreshChat : function(){
			this.checkChat();
			if (lastId < check) {
				this.readChat(lastId);
				lastId = check;
			}
		},

		sendChat : function(isi){
			$.ajax({
				method   : "POST",
				url      : "php/Process/ChatProcess.php?do=sendMessage",
				data     : { isi : isi},
				dataType : "json",
				success  : function(result){
					if (result['data']=="success") {
						chat.refreshChat();
					}
				}
			});			
		},
		
		showOn : function(){
			$.getJSON('php/Process/ChatProcess.php?do=showOn',function(res){
				console.log(res['data']);
			});
		},

		checkOn : function(){
			$.getJSON('php/Process/ChatProcess.php?do=countOnline',function(result){
				if ( lastOn != result) {
					chat.showOn();
					lastOn = result ;
				}
				console.log(lastOn);
			});	
		}
	}	
	
	$(window).on('load',function(){
		chat.refreshChat();
		chat.checkOn();
	});

	setInterval(function(){
		chat.refreshChat();
	},1500);

	setInterval(function(){
		chat.checkOn();
	},9000);

	$("#Chatbtn").on('click',function(){
		var isi = $('#Chatext').val();
		chat.sendChat(isi);
	});

});