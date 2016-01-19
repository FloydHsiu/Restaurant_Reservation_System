<html>
	<title>代客訂位訂餐</title>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body>
		<div><form>
			姓名 : <input type="text" id="name"> <br>
			電話：<input type="text" id="phonenum"> <br>
			日期：<select name="date_" id="date_"> 
				<?php for($i=0; $i<7; $i++){
					$temp = $dates[$i];
					echo  "<option value=\"".$temp."\">".$temp."</option>";
				} ?>
			</select> <br>
			時段：<select name="time_" id="time_">
				<option value="0">11:00~13:00</option>
				<option value="1">13:00~15:00</option>
				<option value="2">17:00~19:00</option>
				<option value="3">19:00~21:00</option>
			</select> <br>
			人數：<select name="quantity" id="quantity">
				<?php for($i=1; $i<11; $i++){
					echo "<option value=\"".$i."\">".$i."</option>";
					} ?>
			</select> <br>
			<button class="myButton" id="submit">確認</button>
			<button class="myButton" type="button" onclick="window.location.replace('/CI/index.php/reservation');">回到大廳</button> <br>
		</form></div>
		<script>
		$(document).ready(function(){
			$("#submit").click(function() {
				var order_confirm = confirm("是否訂菜?");
				$.ajax({
					url : "upload_seat_reservation_by_manager",
					type : "POST",
					dataType : "text",
					data : {"date_" : $('#date_').val(), "time_" : $('#time_').val(), "quantity" : $('#quantity').val(), "name" : $('#name').val(), "phonenum" : $('#phonenum').val()},
					success : function(response){
						var check = response;
						if(check == "c"){	
							if(!order_confirm){
								window.location.replace("/CI/index.php/reservation/create_reservation");
							}else{
								window.location.replace("/CI/index.php/reservation/menu");
							}
						}
						else if(check == "n"){
							alert("no enough seat");
						}
						else{
							alert("invalid value");
						}
					}
				});

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
div {
	background-color: #DDDDDD;
	width: 350px;
	height: 280px;
	margin-top: 150px;
	margin:0px auto;
	border-radius: 10px;
	box-shadow: 10px 10px 5px #111111;
	text-align:center;
	line-height:40px;
}
input {

    border: 1px solid #BBBBBB; //改變外框
    background: #fff; // 背景色
    /* 邊角圓弧化，不同瀏器覧設定不同　*/
    -moz-border-radius:3px; // Firefox
    -webkit-border-radius: 3px; // Safari 和 Chrome
    border-radius: 3px; // Opera 10.5+
}
a{
	text-decoration:none;
	color: #666666;
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