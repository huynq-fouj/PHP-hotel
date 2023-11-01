<?php
class UserObject {
    private $user_id = 0;
    private $user_name;
    private $user_password;
    private $user_fullname;
    private $user_email;
    private $user_phone;
    private $user_permission = 0;

    function setUser_id(int $user_id = 0){
        $this->user_id = $user_id;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setUser_name(string $user_name){
        $this->user_name = $user_name;
    }

    function getUser_name() : string | null {
        return $this->user_name;
    }

    function setUser_password(string $user_password){
        $this->user_password = $user_password;
    }

    function getUser_password() : string | null {
        return $this->user_password;
    }

    function setUser_fullname(string $user_fullname){
        $this->user_fullname = $user_fullname;
    }

    function getUser_fullname() : string | null {
        return $this->user_fullname;
    }

    function setUser_email(string $user_email){
        $this->user_email = $user_email;
    }

    function getUser_email() : string | null {
        return $this->user_email;
    }

    function setUser_phone(string $user_phone){
        $this->user_phone = $user_phone;
    }

    function getUser_phone() : string | null {
        return $this->user_phone;
    }

    function setUser_permission(int $user_permission = 0) {
        $this->user_permission = $user_permission;
    }

    function getUser_permission() {
        return $this->user_permission;
    }
}
?>