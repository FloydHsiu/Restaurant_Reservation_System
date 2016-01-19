#Restaurant_reservation_system
***
use PHP CodeIgniter Web Framework
此專案由張修齊、鄭皓宇、蔡至朔共同開發

###Application/config
***
Before using this you need to change some options here.

  * database.php
  * routes.php
  
###DB Structure
***
####Account:
  * id int auto_increment not null
  * email varchar(40) not null
  * passwd varchar(40) not null
  * name varchar(20)
  * phonenum varchar(15)
  * permission int not null
<br />

####Menu:
  * id int auto_increment not null
  * menuname varchar(50) not null
  * price int not null
  * menu_img text not null
<br />

####Reservation:
  * id int auto_increment not null
  * uid int not null
  * name varchar(20)
  * phonenum varchar(15)
  * seatnum int not null
  * timeid int not null
  * food varchar(300)
<br />

####Seat:
  * id int auto_increment not null
  * date_ date
  * time_ int
  * empty int
