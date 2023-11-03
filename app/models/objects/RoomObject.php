<?php
class RoomObject {
    
    private $room_id;//int
    private $room_number_people;//int
    private $room_number_bed;//int
    private $room_quality;//float
    private $room_type;//string
    private $room_price;//float
    private $room_detail;//string
    private $room_title;//string
    private $room_width;//float
    private $room_length;//float
    private $room_static;//int
    private $room_image;//string
    private $room_hotel_id;//int


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

    function getRoom_type() {
        return $this->room_type;
    }

    function getRoom_price() {
        return $this->room_price;
    }

    function getRoom_detail() {
        return $this->room_detail;
    }

    function getRoom_title() {
        return $this->room_title;
    }

    function getRoom_width() {
        return $this->room_width;
    }

    function getRoom_length() {
        return $this->room_length;
    }

    function getRoom_static() {
        return $this->room_static;
    }

    function getRoom_image() {
        return $this->room_image;
    }

    function getRoom_hotel_id() {
        return $this->room_hotel_id;
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

    function setRoom_type($room_type) {
        $this->room_type = $room_type;
    }

    function setRoom_price($room_price) {
        $this->room_price = $room_price;
    }

    function setRoom_detail($room_detail) {
        $this->room_detail = $room_detail;
    }

    function setRoom_title($room_title) {
        $this->room_title = $room_title;
    }

    function setRoom_width($room_width) {
        $this->room_width = $room_width;
    }

    function setRoom_length($room_length) {
        $this->room_length = $room_length;
    }

    function setRoom_static($room_static) {
        $this->room_static = $room_static;
    }

    function setRoom_image($room_image) {
        $this->room_image = $room_image;
    }

    function setRoom_hotel_id($room_hotel_id) {
        $this->room_hotel_id = $room_hotel_id;
    }

}
?>