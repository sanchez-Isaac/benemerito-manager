<?php
function get_db()
{
    $host = "ec2-52-205-3-3.compute-1.amazonaws.com";
    $user = "bpvauyourahyry";
    $pass = "e13f54fc213726759cec2f027188d2775ab64c82bb5695b52f094256c188c565";
    $db = "d3qu8jujp6d1nl";
    $port = "5432";

    $con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")

    or die ("Could not connect to server\n");

    return $con;
}