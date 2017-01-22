$(document).ready(function(){
	$("#form_input").bind("submit", function(e){
		var keyword = $("input[name=keyword]").val();
		var k1 = $("input[name=k1]").val();
		var k2 = $("input[name=k2]").val();
		var k3 = $("input[name=k3]").val();
		var k4 = $("input[name=k4]").val();
		var k5 = $("input[name=k5]").val();
		
		if( keyword.length == 0 ){
			e.preventDefault();
			alert("keyword is missing");
			return;
		}
		if( k1.length == 0 ){
			e.preventDefault();
			alert("Dinas PDAM is empty");
			return;
		}
		if( k2.length == 0 ){
			e.preventDefault();
			alert("Dinas PJU is empty");
			return;
		}
		if( k3.length == 0 ){
			e.preventDefault();
			alert("Dinas Sosial is empty");
			return;
		}
		if( k4.length == 0 ){
			e.preventDefault();
			alert("Dinas Kebersihan is empty");
			return;
		}
		if( k5.length == 0 ){
			e.preventDefault();
			alert("Dinas BMP is empty");
			return;
		}
		
	});
});
