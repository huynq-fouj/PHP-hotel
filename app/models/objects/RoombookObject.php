<?php
class RoombookObject {

    private $rb_id;
    private $rb_room_id;
    private $rb_customer_id;
    private $rb_created_at;
    private $rb_fullname;
    private $rb_email;
    private $rb_phone;
    private $rb_start_date;
    private $rb_end_date;
    private $rb_number_adult;
    private $rb_number_children;
    private $rb_number_room;
    private $rb_notes;
    private $rb_static;

    function getRb_id () {
        return $this->rb_id;
    }

    function getRb_room_id () {
        return $this->rb_room_id;
    }

    function getRb_customer_id () {
        return $this->rb_customer_id;
    }

    function getRb_created_at () {
        return $this->rb_created_at;
    }

    function getRb_fullname () {
        return $this->rb_fullname;
    }

    function getRb_email () {
        return $this->rb_email;
    }

    function getRb_phone () {
        return $this->rb_phone;
    }

    function getRb_start_date () {
        return $this->rb_start_date;
    }

    function getRb_end_date () {
        return $this->rb_end_date;
    }

    function getRb_number_adult () {
        return $this->rb_number_adult;
    }

    function getRb_number_children () {
        return $this->rb_number_children;
    }

    function getRb_number_room () {
        return $this->rb_number_room;
    }

    function getRb_notes () {
        return $this->rb_notes;
    }

    function getRb_static () {
        return $this->rb_static;
    }

    function setRb_id ($rb_id) {
        $this->rb_id = $rb_id;
    }

    function setRb_room_id ($rb_room_id) {
        $this->rb_room_id = $rb_room_id;
    }

    function setRb_customer_id ($rb_customer_id) {
        $this->rb_customer_id = $rb_customer_id;
    }

    function setRb_created_at ($rb_created_at) {
        $this->rb_created_at = $rb_created_at;
    }

    function setRb_fullname ($rb_fullname) {
        $this->rb_fullname = $rb_fullname;
    }

    function setRb_email ($rb_email) {
        $this->rb_email = $rb_email;
    }

    function setRb_phone ($rb_phone) {
        $this->rb_phone = $rb_phone;
    }

    function setRb_start_date ($rb_start_date) {
        $this->rb_start_date = $rb_start_date;
    }

    function setRb_end_date ($rb_end_date) {
        $this->rb_end_date = $rb_end_date;
    }

    function setRb_number_adult ($rb_number_adult) {
        $this->rb_number_adult = $rb_number_adult;
    }

    function setRb_number_children ($rb_number_children) {
        $this->rb_number_children = $rb_number_children;
    }

    function setRb_number_room ($rb_number_room) {
        $this->rb_number_room = $rb_number_room;
    }

    function setRb_notes ($rb_notes) {
        $this->rb_notes = $rb_notes;
    }

    function setRb_static ($rb_static) {
        $this->rb_static = $rb_static;
    }

}
?>