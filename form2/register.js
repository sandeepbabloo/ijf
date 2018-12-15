
function displayCollege(){
	// console.log("wow");
	if($("#college").val() == 'other'){
		$("#input_college").show();
	}
}
function city_change(){
	var state = $('#state').val();
	console.log("wow");
	if($('#state').val() == 'Chhattisgarh'){
		console.log("wow");
		$(".chatti").hide();
		$(".silverscope").show();
	}
	else{
		console.log("wow2");
		$(".chatti").show();
		$(".silverscope").hide();
	}
	$("#contingent_city_load").css("visibility","");
	$("#city").css("display","none");
	$.ajax({
		type: 'POST',
		url: 'city.php',
		data: 'state='+$('#state').val(),
		success: function(data){
//			alert(data);
			$('#city').html('');
			$('#city').html(data);
			$("#contingent_city_load").css("visibility","hidden");
			$("#city").css("display","block");
		}
	});
}
function city_change2(){
	// $("#contingent_city_load").css("visibility","");
	$("#city2").css("display","none");
	$.ajax({
		type: 'POST',
		url: 'city.php',
		data: 'state='+$('#state2').val(),
		success: function(data){
//			alert(data);
			$('#city2').html('');
			$('#city2').html(data);
			// $("#contingent_city_load").css("visibility","hidden");
			$("#city2").css("display","block");
		}
	});
}
function select_college(){
	// $("#contingent_college_load").css("visibility","");
	// $("#college").css("display","none");
	$.ajax({
		type: 'POST',
		url: 'college.php',
		data: 'city='+$('#city').val(),
		success: function(data){
//			alert(data);
			$('#college').html('');
			$('#college').html(data);
			// $("#contingent_college_load").css("visibility","hidden");
			// $("#college").css("display","block");
		}
	});
}
function college_select(){
	if($("#college").val() == 'other') {
		$("#contingent_other_college").css("display","block");
	}
	else {
		$("#contingent_other_college").css("display","none");
	}
	// var stud  = $('input[name=stud]:checked', '#myform').val();
	var college	=	$("#college").val();
	if (college == "other"){
		college = $("#addcollege").val();
	}
	// if (stud == 'contingent'){
	// 	$.ajax({
	// 		type: 'POST',
	// 		url : 'contingent.php',
	// 		data: "&college="+college,
	// 		success: function(x){
	// 			if (x != 0){
	// 				$('#texta').html("Your college already has "+x+" members in the contingent. Complete the registration process to view the details of the other members.");
	// 			}
	// 			else{
	// 				$("#texta").html("No one has registered as contingent from your college.")
	// 			}
	// 		}
	// 	});
	
	// }
}
