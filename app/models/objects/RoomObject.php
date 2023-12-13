<?php
require_once("RoomtypeObject.php");
class RoomObject extends RoomtypeObject {
    
    private $room_id;//int
    private $room_number_people;//int
    private $room_number_bed;//int
    private $room_quality;//float
    private $room_bed_type;//string
    private $room_price;//float
    private $room_detail;//string
    private $room_area;//float
    private $room_static;//int
    private $room_image;//string
    private $room_address;//string
    private $room_hotel_name;//string
    private $room_type_id;//int


    function getRoom_id(){
        return $this->room_id;
    }

    function getRoom_number_people() {
        return $this->room_number_people;
    }

    function getRoom_number_bed() {
        return $this->room_number_bed;
    }

    function getRoom_quality() {
        return $this->room_quality;
    }

    function getRoom_type_id() {
        return $this->room_type_id;
    }

    function getRoom_bed_type() {
        return $this->room_bed_type;
    }

    function getRoom_price() {
        return $this->room_price;
    }

    function getRoom_detail() {
        return $this->room_detail;
    }

    function getRoom_area() {
        return $this->room_area;
    }

    function getRoom_static() {
        return $this->room_static;
    }

    function getRoom_image() {
        return $this->room_image;
    }

    function getRoom_address() {
        return $this->room_address;
    }

    function getRoom_hotel_name() {
        return $this->room_hotel_name;
    }

    function setRoom_id($room_id) {
        $this->room_id = $room_id;
    }

    function setRoom_number_people($room_number_people) {
        $this->room_number_people = $room_number_people;
    }

    function setRoom_number_bed($room_number_bed) {
        $this->room_number_bed = $room_number_bed;
    }

    function setRoom_quality($room_quality) {
        $this->room_quality = $room_quality;
    }

    function setRoom_type_id($room_type_id) {
        $this->room_type_id = $room_type_id;
    }

    function setRoom_bed_type($room_bed_type) {
        $this->room_bed_type = $room_bed_type;
    }

    function setRoom_price($room_price) {
        $this->room_price = $room_price;
    }

    function setRoom_detail($room_detail) {
        $this->room_detail = $room_detail;
    }

    function setRoom_area($room_area) {
        $this->room_area = $room_area;
    }

    function setRoom_static($room_static) {
        $this->room_static = $room_static;
    }

    function setRoom_image($room_image) {
        $this->room_image = $room_image;
    }

    function setRoom_address($room_address) {
        $this->room_address = $room_address;
    }

    function setRoom_hotel_name($room_hotel_name) {
        $this->room_hotel_name = $room_hotel_name;
    }

}
?>