<?php
session_start();

// Getting to message page -> Method 2 : Using php to get to the instant message page
if (session_status() === PHP_SESSION_ACTIVE) {
    // echo "Session is active.";
    // Disconnect from intant message web app -> Method 1 :
    // Submit the page with a event post data key 
    if (isset($_POST['event'])) {
        $value = $_POST['event'];
        if ($value == "Sign-out") {
            // Do anything else with it after
            $_SESSION = array();
            session_destroy();
        }
    }

    elseif (isset($_GET['event'])) {
        $value = $_GET['event'];
        if ($value == "update") {
            include "pages/updateInformation.php";
        }
    }
    elseif (isset($_SESSION["login"])) {
        if ($_SESSION["login"]) {
            include 'pages/instantMes.php';
        }
    } elseif (isset($_GET["phase"])) {
        $phase = $_GET["phase"];

        if ($phase == "register") {
            include 'pages/register.php';
        }
    } else {
        include 'pages/login.php';
    }
} else {
    echo "Session is not active.";
}
// With Method 1 Authentication javascript file
// // if (isset($_SESSION['login'])) {
// //     if ($_SESSION['login']) {
// //         // User is logged in, display the messages page
// //         include 'pages/instantMes.php';
// //     }
// // }
// // elseif (isset($_GET["phase"])) {
// //     $phase = $_GET["phase"];
// 
// //     if ($phase == "login") {
// //         $_SESSION["sessionPhase"] = "login";
// //         include 'pages/login.php';
// //     } elseif ($phase == "messages") {
// //         $_SESSION["sessionPhase"] = "messages";
// //         include 'pages/instantMes.php';
// //     } else if ($phase == "register") {
// //         include 'pages/register.php';
// //     }
// // }
// // // If no phase is set, default to the login page
// // else {
// 
// //     include 'pages/login.php';
// // }