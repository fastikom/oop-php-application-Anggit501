<?php
$koneksi = mysql_connect("localhost","root","");
if(!$koneksi) echo "koneksi gagal";
$db = mysql_select_db("BMI",$koneksi);
if(!$db) echo "database tidak bisa dibuka";