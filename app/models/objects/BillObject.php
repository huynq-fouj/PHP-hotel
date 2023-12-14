<?php
require_once("BillstaticObject.php");
class BillObject extends BillstaticObject {

    private $bill_id;//int
    private $bill_room_id;//int
    private $bill_customer_id;//int
    private $bill_created_at;//date
    private $bill_fullname;//string
    private $bill_email;//string
    private $bill_phone;//string
    private $bill_start_date;//date
    private $bill_end_date;//date
    private $bill_number_adult;//int
    private $bill_number_children;//int
    private $bill_number_room;//int
    private $bill_notes;//string
    private $bill_static;//int
    private $bill_is_paid;//int;
    private $bill_cancel;//int
    private $bill_staff_name;//string

    function getBill_id () {
        return $this->bill_id;
    }

    function getBill_room_id () {
        return $this->bill_room_id;
    }

    function getBill_customer_id () {
        return $this->bill_customer_id;
    }

    function getBill_created_at () {
        return $this->bill_created_at;
    }

    function getBill_fullname () {
        return $this->bill_fullname;
    }

    function getBill_email () {
        return $this->bill_email;
    }

    function getBill_phone () {
        return $this->bill_phone;
    }

    function getBill_start_date () {
        return $this->bill_start_date;
    }

    function getBill_end_date () {
        return $this->bill_end_date;
    }

    function getBill_number_adult () {
        return $this->bill_number_adult;
    }

    function getBill_number_children () {
        return $this->bill_number_children;
    }

    function getBill_number_room () {
        return $this->bill_number_room;
    }

    function getBill_notes () {
        return $this->bill_notes;
    }

    function getBill_static () {
        return $this->bill_static;
    }

    function getBill_is_paid() {
        return $this->bill_is_paid;
    }

    function getBill_cancel() {
        return $this->bill_cancel;
    }

    function getBill_staff_name() {
        return $this->bill_staff_name;
    }

    function setBill_id ($bill_id) {
        $this->bill_id = $bill_id;
    }

    function setBill_room_id ($bill_room_id) {
        $this->bill_room_id = $bill_room_id;
    }

    function setBill_customer_id ($bill_customer_id) {
        $this->bill_customer_id = $bill_customer_id;
    }

    function setBill_created_at ($bill_created_at) {
        $this->bill_created_at = $bill_created_at;
    }

    function setBill_fullname ($bill_fullname) {
        $this->bill_fullname = $bill_fullname;
    }

    function setBill_email ($bill_email) {
        $this->bill_email = $bill_email;
    }

    function setBill_phone ($bill_phone) {
        $this->bill_phone = $bill_phone;
    }

    function setBill_start_date ($bill_start_date) {
        $this->bill_start_date = $bill_start_date;
    }

    function setBill_end_date ($bill_end_date) {
        $this->bill_end_date = $bill_end_date;
    }

    function setBill_number_adult ($bill_number_adult) {
        $this->bill_number_adult = $bill_number_adult;
    }

    function setBill_number_children ($bill_number_children) {
        $this->bill_number_children = $bill_number_children;
    }

    function setBill_number_room ($bill_number_room) {
        $this->bill_number_room = $bill_number_room;
    }

    function setBill_notes ($bill_notes) {
        $this->bill_notes = $bill_notes;
    }

    function setBill_static ($bill_static) {
        $this->bill_static = $bill_static;
    }

    function setBill_is_paid ($bill_is_paid) {
        $this->bill_is_paid = $bill_is_paid;
    }

    function setBill_cancel($bill_cancel) {
        $this-> bill_cancel = $bill_cancel;
    }

    function setBill_staff_name($bill_staff_name) {
        $this->bill_staff_name = $bill_staff_name;
    }

}
?>