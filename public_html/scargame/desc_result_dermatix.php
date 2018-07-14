<link href="assets/css/global.css" rel="stylesheet">
<script src="assets/js/index.js"></script>
<div class="bg_desc_result">
	<ul class="list_desc_result list_desc_result2">
		
	</ul>
  <div class="bgresbtm"></div>
</div>
<script>
	$( document ).ready(function() {
		content=desc_content.replace("undefined","");
		$(".list_desc_result").html(content);
		//console.log($(".list_desc_result").length);
	});
</script>