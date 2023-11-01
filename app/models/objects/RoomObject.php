<?php
class RoomObject {
    
    private $room_id;
    private $room_number_people;
    private $room_number_bed;
    private $room_quality;
    private $room_quantity;
    private $room_type;
    private $room_services;
    private $room_price;
    private $room_detail;
    private $room_title;
    private $room_width;
    private $room_length;
    private $room_address;


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

    function getRoom_quantity() {
        return $this->room_quantity;
    }

    function getRoom_type() {
        return $this->room_type;
    }

    function getRoom_services() {
        return $this->room_services;
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

    function getRoom_address() {
        return $this->room_address;
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

    function setRoom_quantity($room_quantity) {
        $this->room_quantity = $room_quantity;
    }

    function setRoom_type($room_type) {
        $this->room_type = $room_type;
    }

    function setRoom_services($room_services) {
        $this->room_services = $room_services;
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

    function setRoom_address($room_address) {
        $this->room_address = $room_address;
    }

}
?>