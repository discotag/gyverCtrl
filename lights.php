#!/usr/bin/php
<?php
/* Простенький скрипт для управления гирляндой Гайвера из командной строки
	© liilliil, 2023-24
*/

//    Текст можно передать через пайп
$ofPipe= (posix_isatty(STDIN)) ? false : file_get_contents('php://stdin');

$server_ip   = ''; // вставьте ip-адрес гирлянды
$server_port = 2390;
$fx= array('clock'=>0,
	'fill_color'=>1,
	'snow'=>2,
	'ball'=>3,
	'rainbow'=>4,
	'paintball'=>5,
	'fire'=>6,
	'matrix'=>7,
	'balls'=>8,
	'starfall'=>9,
	'sparkles'=>10,
	'madness'=>11,
	'cloud'=>12,
	'lava'=>13,
	'plasma'=>14,
	'rainbow'=>15,
	'rainbow2'=>16,
	'zebra'=>17,
	'forest'=>18,
	'ocean'=>19,
	'colors'=>20,
	'lighters'=>21,
	'swirl'=>22,
	'cyclon'=>23,
	'flicker'=>24,
	'pacifica'=>25,
	'shadows'=>26,
	'maze'=>27,
	'snake'=>28,
	'tetris'=>29,
	'arkanoid'=>30,
	'palette'=>31,
	'analyzer'=>32,
	'prizmata'=>33,
	'munch'=>34,
	'rain'=>35,
	'fire2'=>36,
	'arrows'=>37,
	'weather'=>38,
	'life'=>39);

if(count($argv)<2) {
	echo "Попробуйте: lights list\n";
	exit;
}
$s=strtolower($argv[1]);
if($s=='list') {
	echo <<<e1
Команды:
lights on
lights off
lights text <текст>
lights mode <имя режима>
	режимы:
e1;
	echo implode(', ', array_keys($fx))."\n";
	exit;	
}
if('off'==$s) {	send('$1 0;');	exit;}
if('on'==$s) {	send('$1 1;');	exit;}
if('mode'==$s) {
	$m=strtolower($argv[2]);
	if(isset($fx[$m])) {
		send('$8 0 '.$fx[$m].';');
	} else {
		echo "Хм… пока не поддерживается!\n";
	}
	exit;	
}
if('text'==$s) {
	if(!$ofPipe)    send('$6 14|'.$argv[2]);
	else            send('$6 14|'.$ofPipe);
	exit;
}

function send($m) {
	if ($s= socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) {
	    socket_sendto($s, $m, strlen($m), 0, $GLOBALS['server_ip'], $GLOBALS['server_port']);
	} else {
		print("Ошибка! Не могу создать сокет!\n");
	}
}
?>
