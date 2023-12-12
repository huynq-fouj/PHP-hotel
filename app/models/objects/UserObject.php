<?php
class UserObject {
    private $user_id;//int
    private $user_name;//string
    private $user_password;//string
    private $user_fullname;//string
    private $user_email;//string
    private $user_phone;//string
    private $user_permission;//int
    private $user_created_at;//string

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    function getUser_name() {
        return $this->user_name;
    }

    function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    function getUser_password() {
        return $this->user_password;
    }

    function setUser_fullname($user_fullname) {
        $this->user_fullname = $user_fullname;
    }

    function getUser_fullname() {
        return $this->user_fullname;
    }

    function setUser_created_at($user_created_at) {
        $this->user_created_at = $user_created_at;
    }

    function getUser_created_at() {
        return $this->user_created_at;
    }

    function setUser_email($user_email) {
        $this->user_email = $user_email;
    }

    function getUser_email() {
        return $this->user_email;
    }

    function setUser_phone($user_phone) {
        $this->user_phone = $user_phone;
    }

    function getUser_phone() {
        return $this->user_phone;
    }

    function setUser_permission($user_permission) {
        $this->user_permission = $user_permission;
    }

    function getUser_permission() {
        return $this->user_permission;
    }
}
?>