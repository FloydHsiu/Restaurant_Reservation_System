<html>
	<head>
		<title>訂單查詢</title>
	</head>
	<body>
		<div class="showorder">
			<button class="myButton" onclick="window.location.replace('/CI/index.php/reservation');">回到大廳</button>
			<?php 
				for($i=0; $i<sizeof($reservation); $i++){
					echo "<div>日期：".$date_time[$i]["date_"]."</div>";
					if($date_time[$i]["time_"]==0){
						echo "時段：11:00~13:00";
					}
					else if($date_time[$i]["time_"]==1){
						echo "時段：13:00~15:00";
					}
					else if($date_time[$i]["time_"]==2){
						echo "時段：17:00~19:00";
					}
					else{
						echo "時段：19:00~21:00";
					}
					echo "<div>訂位人姓名：".$reservation[$i]["name"]."</div>";
					echo "<div>訂位人電話：".$reservation[$i]["phonenum"]."</div>";
					echo "<div>用餐人數：".$reservation[$i]["seatnum"]."</div>";
					echo "<div>".$reservation[$i]["food"]."<hr style=\"border:1px dotted #036\" /></div>";
				}
			?>
		</div>
		 
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
.showorder {
	background-color: #DDDDDD;
	width: 500px;
	margin-top: 150px;
	margin:0px auto;
	border-radius: 10px;
	box-shadow: 10px 10px 5px #111111;
	text-align:center;
	line-height:40px;
}
.myButton {
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