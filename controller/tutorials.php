<?php


if(isset($_SESSION['username']) && isset($_SESSION['login_hash'])){
    include_once("templates/members/tutorials.html");
}else{
    include_once("templates/global/tutorials.html");

}


?>