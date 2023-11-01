<?php
session_start();
unset($_SESSION["customer"]);
header("location: booking_hotel/views/");