<script type="text/javascript">
	$(document).ready(function(){
		$.each($('.trs'), function(i, e){
			
			$(e).click(function(){
				var number = this.id;
				$('#emb').html('<iframe src="http://player.vimeo.com/video/'+number+'" width="750" height="422" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');

				$('#show-trailer').css('display', 'block');
				$('#grey').css('display', 'block');
				
				$('#grey').animate({
						opacity: 0.7
					}, 500, function(){
				});
				
				$('#show-trailer').animate({
						opacity: 1
					}, 500, function(){
				});
					
			});
		});

		$('#close').click(function(){
			$('#show-trailer').animate({
				opacity: 0
			}, 300, function(){
				$('#show-trailer').css('display', 'none');
			});

			$('#grey').animate({
				opacity: 0
			}, 300, function(){
				
				$('#grey').css('display', 'none');
			});
		});	
	})
	
</script>

<div id="show-trailer">
	<div id="close"><img id="cl-button" src="imgs/close.png"></div>
	<div id="emb">
		
	</div>
</div>
<div class="content">
	<div class="sub-content">
		<div id="tr">
			<div id="trailer-top">
				<img id="58498770" class="trs" src="imgs/video1.jpg" alt="">
				<img id="57879298" class="trs" src="imgs/video2.jpg" alt="">
			</div>
			<div id="trailer-bottom">
				<img id="57970228" class="trs" src="imgs/video3.jpg" alt="">
				<img id="58259433" class="trs" src="imgs/video4.jpg" alt="">
			</div>
		</div>
	</div>
</div>

