<!DOCTYPE html>
<html>
<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<title>order your mother's dish</title>
</head>
<body>

<div class="showmenu">
<?php
		for($i=0; $i < sizeof($menu); $i++){
			/*echo("<div>".$menu[$i]["id"]."</div>");*/
			echo("<div><div class=\"picture\"><img src=\"".$menu[$i]["menu_img"]."\" style=\"width:300px;\"></img></div>");
			echo("<div class=\"text\">".$menu[$i]["menuname"]."<div>"."價格：NT$".$menu[$i]["price"]."</div>
				<li class=\"price\" id = \"".$menu[$i]["menuname"]."\" value=\"".$menu[$i]["price"]."\">數量：
				<select class=\"quantity\" name=\"quantity\" id=\"quantity".$menu[$i]["id"]."\">
				<option value=\"0\">0</option>
				<option value=\"1\">1</option>
				<option value=\"2\">2</option>
				<option value=\"3\">3</option>
				<option value=\"4\">4</option>
				<option value=\"5\">5</option>
				<option value=\"6\">6</option>
				<option value=\"7\">7</option>
				<option value=\"7\">8</option>
				</select></li>\n</div></div>");
		}
		echo "<button class=\"myButton\" type=\"button\" id=\"submit\">提交訂單</button>";
		?>
</div>
<script>
		var order = [];
		var cost = [];
		var order_name = [];
		var order_result = "";
		var total = 0;
		$(document).ready(function(){
			$("li").each(function(){
				$(this).css("list-style-type","none");
			});
			$("#submit").click(function() {
				var i = 0;
				$(".quantity").each(function(){
					order[i] = $(this).val();
					i++;
				});
				i = 0;
				order_name = [];
				order_result = "";
				total = 0;
				$(".price").each(function(){
					cost[i] = $(this).val() * $(this).children(".quantity").val();
					total+=cost[i];
					if($(this).children(".quantity").val()>0){
						order_name.push($(this).attr("id"));
						order_result = order_result.concat($(this).attr("id"), $(this).children(".quantity").val().toString(), "\n");
					}
					i++;
				});
				if(confirm("你點了：\n" + order_name.join("\n")+("\n總價格：NT$" + total + "\n"))){
					$.ajax({
					url : "create_food_reservation",
					async: true,
					type : "POST",
					dataType : "text",
					data : {orderResult : order_result},
					success : function(response){
						window.location.replace("/CI/index.php/reservation/order");
					}
					});
				}
				else{

				}
			});
		});
		</script>
		
</body>
</html>

<style> 
body {
    background: url("http://127.0.0.1/CI/image/index_back.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    font-style: oblique;
    font-size: 18px;
    font-weight: bold;
}
.picture{
	float:left;
}
.text{
	text-align:center;
	float:right;
	width: 600px;
	height: 230px;
}
.showmenu {
	background-color: #DDDDDD;
	width: 900px;
	height: 2400px;
	margin-top: 150px;
	margin-left: 30px;
	border-radius: 10px;
	box-shadow: 10px 10px 5px #111111;
	margin:0px auto;
	line-height:50px;
	text-align:center;

}
div{
	text-align:center;
}
a{
	text-decoration:none;
	color: black;
	font-style: oblique;
	font-size: 18px;
	font-weight: bold;
}
.myButton {
	margin-left: 300px;
	margin-top: 15px;
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f9f9f9), color-stop(1, #e9e9e9));
	background:-moz-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-webkit-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-o-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:-ms-linear-gradient(top, #f9f9f9 5%, #e9e9e9 100%);
	background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f9f9f9', endColorstr='#e9e9e9',GradientType=0);
	background-color:#f9f9f9;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #807480;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:11px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e9e9e9), color-stop(1, #f9f9f9));
	background:-moz-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-webkit-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-o-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:-ms-linear-gradient(top, #e9e9e9 5%, #f9f9f9 100%);
	background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e9e9e9', endColorstr='#f9f9f9',GradientType=0);
	background-color:#e9e9e9;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>