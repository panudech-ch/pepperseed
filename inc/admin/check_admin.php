<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 1/29/2017
 * Time: 12:49 PM
 */
    function chkIsAdmin($session){
        return ($session == "admin") ? true : false;
    }
?>