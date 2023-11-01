<?php
class HotelObject {

    private $hotel_id;
    private $hotel_name;
    private $hotel_detail;
    private $hotel_address;
    private $hotel_quality;
    private $hotel_image;
    private $hotel_number_room;
    private $hotel_number_floor;
    private $hotel_number_bar;
    private $hotel_number_restaurant;
    private $hotel_built_at;
    private $hotel_upgraded_at;

    function getHotel_id() {
        return $this->hotel_id;
    }

    function getHotel_name() {
        return $this->hotel_name;
    }

    function getHotel_detail() {
        return $this->hotel_detail;
    }

    function getHotel_address() {
        return $this->hotel_address;
    }

    function getHotel_quality() {
        return $this->hotel_quality;
    }

    function getHotel_image() {
        return $this->hotel_image;
    }

    function getHotel_number_room() {
        return $this->hotel_number_room;
    }

    function getHotel_number_floor() {
        return $this->hotel_number_floor;
    }

    function getHotel_number_bar() {
        return $this->hotel_number_bar;
    }

    function getHotel_number_restaurant() {
        return $this->hotel_number_restaurant;
    }

    function getHotel_built_at() {
        return $this->hotel_built_at;
    }

    function getHotel_upgraded_at() {
        return $this->hotel_upgraded_at;
    }

    function setHotel_id($hotel_id) {
        $this->hotel_id = $hotel_id;
    }

    function setHotel_name($hotel_name) {
        $this->hotel_name = $hotel_name;
    }

    function setHotel_detail($hotel_detail) {
        $this->hotel_detail = $hotel_detail;
    }

    function setHotel_address($hotel_address) {
        $this->hotel_address = $hotel_address;
    }

    function setHotel_quality($hotel_quality) {
        $this->hotel_quality = $hotel_quality;
    }

    function setHotel_image($hotel_image) {
        $this->hotel_image = $hotel_image;
    }

    function setHotel_number_room($hotel_number_room) {
        $this->hotel_number_room = $hotel_number_room;
    }

    function setHotel_number_floor($hotel_number_floor) {
        $this->hotel_number_floor = $hotel_number_floor;
    }

    function setHotel_number_bar($hotel_number_bar) {
        $this->hotel_number_bar = $hotel_number_bar;
    }

    function setHotel_number_restaurant($hotel_number_restaurant) {
        $this->hotel_number_restaurant = $hotel_number_restaurant;
    }

    function setHotel_built_at($hotel_built_at) {
        $this->hotel_built_at = $hotel_built_at;
    }

    function setHotel_upgraded_at($hotel_upgraded_at) {
        $this->hotel_upgraded_at = $hotel_upgraded_at;
    }

}
?>