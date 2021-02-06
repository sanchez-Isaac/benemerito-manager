<?php
function get_db()
{
    $host = "ec2-54-235-167-210.compute-1.amazonaws.com";
    $user = "bgioyeuxgspzay";
    $pass = "2bde081d61adcb0a3e6eb77f86b4832fa740494bb0fcfa470ab271c5f5dd80fa";
    $db = "dedc617q6k4b6s";
    $port = "5432";

    $con = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass")

    or die ("Could not connect to server\n");

    return $con;
}