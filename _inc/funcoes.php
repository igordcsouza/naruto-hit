<?php
function fpersonagem($p){
	switch($p){
		case 'naruto': echo 'Uzumaki Naruto'; break;
		case 'sasuke': echo 'Uchiha Sasuke'; break;
		case 'sakura': echo 'Haruno Sakura'; break;
		case 'kakashi': echo 'Hatake Kakashi'; break;
		case 'itachi': echo 'Uchiha Itachi'; break;
		case 'kisame': echo 'Hoshigaki Kisame'; break;
		case 'konohamaru': echo 'Sarutobi Konohamaru'; break;
		case 'neji': echo 'Hyuuga Neji'; break;
		case 'kiba': echo 'Inuzuka Kiba'; break;
		case 'ino': echo 'Yamanaka Ino'; break;
		case 'tenten': echo 'Tenten'; break;
		case 'lee': echo 'Rock Lee'; break;
		case 'hinata': echo 'Hyuuga Hinata'; break;
		case 'temari': echo 'Temari'; break;
		case 'shino': echo 'Aburame Shino'; break;
		case 'kankurou': echo 'Kankurou'; break;
		case 'tayuya': echo 'Tayuya'; break;
		case 'gaara': echo 'Sabaku no Gaara'; break;
		case 'shikamaru': echo 'Nara Shikamaru'; break;
		case 'chouji': echo 'Akimichi Chouji'; break;
		case 'haku': echo 'Koori Haku'; break;
		case 'kabuto': echo 'Yakushi Kabuto'; break;
		case 'kidoumaru': echo 'Kidoumaru'; break;
		case 'iruka': echo 'Iruka'; break;
		case 'sai': echo 'Sai'; break;
		case 'zabuza': echo 'Momochi Zabuza'; break;
		case 'jiroubo': echo 'Jiroubo'; break;
		case 'sakon': echo 'Sakon/Ukon'; break;
		case 'kimimaro': echo 'Kimimaro'; break;
		case 'gai': echo 'Maito Gai'; break;
		case 'kurenai': echo 'Yuuhi Kurenai'; break;
		case 'asuma': echo 'Sarutobi Asuma'; break;
		case 'hagane': echo 'Hagane Kotetsu'; break;
		case 'hayate': echo 'Gekkou Hayate'; break;
		case 'izumo': echo 'Kamizuki Izumo'; break;
		
	}
}
function rankNinja($nivel){
	if($nivel>60) $rk='ANBU';
	if($nivel<60) $rk='Sannin';
	if($nivel<40) $rk='Jounnin';
	if($nivel<20) $rk='Chuunin';
	if($nivel<5) $rk='Gennin';
	return $rk;
}
function dano($taijutsu1,$taijutsu2){
	if(($taijutsu2+10)<=$taijutsu1) $bonus=rand(1,5); else $bonus=rand(1,10);
	if($taijutsu1<($taijutsu2-25)) return 0; else
	return round(($taijutsu1*((($taijutsu1*5)/$taijutsu2)/4))/4)+$bonus;
}
function danojutsu($ninjutsu1,$ninjutsu2,$forca){
	if($ninjutsu1<($ninjutsu2-25)) return 0; else
	return round(($ninjutsu1*((($ninjutsu1*5)/$ninjutsu2)/4))/4)+$forca+rand(1,10);
}
?>