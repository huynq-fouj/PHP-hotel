<?php
session_start();
unset($_SESSION["user"]);
header("location: booking_hotel/views/");
?>