<?php 

require_once('config.php');

function pageNotFound() {
    throw new Exception("ERROR ! REQUESTED PAGES IS NOT FOUND ON OUR LOCAL SERVER");
}