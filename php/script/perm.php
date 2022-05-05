<?php

include 'bdd.php';
$rep = 'uploads/'.$username.' ';

    chmod("../Nanodoc",0777);
    chmod("uploads",0777); 
    chmod("uploads/admin",0777);
    chmod($rep,0777);
    