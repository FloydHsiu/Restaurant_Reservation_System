<html>
<head>
	<title>註冊</title>
</head>
	<body>
		<div>
			<form action="/CI/index.php/store/create" method="post">
				姓名 : <input type="text" name="name"> <br>
				信箱 : <input type="email" name="email"> <br>
				密碼 : <input type="password" name="passwd"> <br>
				電話 : <input type="text" name="phonenum"  id="input_phonenum"> <br>
				<button class="myButton" type="submit">Submit</button>
				<button class="myButton"> <a href="/CI/index.php/store/">Cancel</a></button>
			</form>
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
div {
	background-color: #DDDDDD;
	width: 350px;
	height: 250px;
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