<?php
class ContactObject {
    private $contact_id;
    private $contact_fullname;
    private $contact_email;
    private $contact_subject;
    private $contact_notes;
    private $contact_seen;
    private $contact_created_at;

    function setContact_id($contact_id) {
        $this->contact_id = $contact_id;
    }

    function setContact_fullname($contact_fullname) {
        $this->contact_fullname = $contact_fullname;
    }

    function setContact_email($contact_email) {
        $this->contact_email = $contact_email;
    }

    function setContact_subject($contact_subject) {
        $this->contact_subject = $contact_subject;
    }

    function setContact_notes($contact_notes) {
        $this->contact_notes = $contact_notes;
    }

    function setContact_seen($contact_seen) {
        $this->contact_seen = $contact_seen;
    }

    function setContact_created_at($contact_created_at) {
        $this->contact_created_at = $contact_created_at;
    }

    function getContact_id() {
        return $this->contact_id;
    }

    function getContact_fullname() {
        return $this->contact_fullname;
    }

    function getContact_email() {
        return $this->contact_email;
    }

    function getContact_subject() {
        return $this->contact_subject;
    }

    function getContact_notes() {
        return $this->contact_notes;
    }

    function getContact_seen() {
        return $this->contact_seen;
    }

    function getContact_created_at() {
        return $this->contact_created_at;
    }
}
?>