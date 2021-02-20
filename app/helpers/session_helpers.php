<?php
session_start();
/**
 * Check if user has login or not
 * @return true|false
 */
function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
/**
 * Check if the user is admin or not
 * @return true|false
 */
function isAdmin()
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 1) {
            return true;
        }
    } else {
        return false;
    }
}
/**
 * Check if the user is author or not
 * @return true|false
 */
function isAuthor()
{
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 0) {
            return true;
        }
    } else {
        return false;
    }
}
 function isMyPost($data){

}
/**
 * Check if this is the session user to modify 
 */
function isTrueUser($data)
{
    if (  $_SESSION['role'] == $data['user']->role && $_SESSION['user_id'] = $data['user']->id) {
        return true;
    } else {
        return false;
    }
}
