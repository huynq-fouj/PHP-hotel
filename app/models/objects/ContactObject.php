<?php
class ContactObject {
    private $contact_id;
    private $contact_user_name;
    private $contact_user_email;
    private $contact_subject;
    private $contact_note;
    private $contact_confirm;
    private $contact_created_date;

    function setContact_id(int $contact_id) {
        $this->contact_id = $contact_id;
    }

    function setContact_user_name(string $contact_user_name) {
        $this->contact_user_name = $contact_user_name;
    }

    function setContact_user_email(string $contact_user_email) {
        $this->contact_user_email = $contact_user_email;
    }

    function setContact_subject(string $contact_subject) {
        $this->contact_subject = $contact_subject;
    }

    function setContact_note(string $contact_note) {
        $this->contact_note = $contact_note;
    }

    function setContact_confirm(bool $contact_confirm) {
        $this->contact_confirm = $contact_confirm;
    }

    function setContact_created_date(string $contact_created_date) {
        $this->contact_created_date = $contact_created_date;
    }

    function getContact_id() : int {
        return $this->contact_id;
    }

    function getContact_user_name() : string | null {
        return $this->contact_user_name;
    }

    function getContact_user_email() : string | null {
        return $this->contact_user_email;
    }

    function getContact_subject() : string | null {
        return $this->contact_subject;
    }

    function getContact_note() : string | null {
        return $this->contact_note;
    }

    function isContact_confirm() : bool {
        return $this->contact_confirm;
    }

    function getContact_created_date() : string | null {
        return $this->contact_created_date;
    }
}
?>