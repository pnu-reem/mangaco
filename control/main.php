<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

include 'manga.class.php';


$oresama = new Manga('Oresama Teacher', 'Tsubaki Izumi', "Kurosaki Mafuyu was a juvenile delinquent and head of her gang before her subsequent arrest got her expelled from high school. Now that she's transferred to a new high school, she\'s determined to become an &quot;ultra-shiny, super feminine high school student.&quot; But with a new friend like Hayasaka-kun and a homeroom teacher like Saeki Takaomi (who may be more than he seems), will Mafuyu really be able to live a girly-girl high school life!?", 1998);
$gekkan = new Manga('Gekkan shoujo', 'Tsubaki Izumi', "Kurosaki Mafuyu was a juvenile delinquent and head of her gang before her subsequent arrest got her expelled from high school. Now that she's transferred to a new high school, she\'s determined to become an &quot;ultra-shiny, super feminine high school student.&quot; But with a new friend like Hayasaka-kun and a homeroom teacher like Saeki Takaomi (who may be more than he seems), will Mafuyu really be able to live a girly-girl high school life!?", 1998);
$flat = new Manga('Flat', 'Someone Somewhere', "Kurosaki Mafuyu was a juvenile delinquent and head of her gang before her subsequent arrest got her expelled from high school. Now that she's transferred to a new high school, she\'s determined to become an &quot;ultra-shiny, super feminine high school student.&quot; But with a new friend like Hayasaka-kun and a homeroom teacher like Saeki Takaomi (who may be more than he seems), will Mafuyu really be able to live a girly-girl high school life!?", 1998);


$mangalist = array($oresama, $gekkan, $flat);

?>
