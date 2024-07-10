<?php

class CheckinObject
{
    private $checkin_id;
    private $first_indentity_card;
    private $second_indentity_card;
    private $checkin_code;
    private $checkin_date;
    private $create_at;
    private $bill_id;
    private $checkin_user;
    private $status;
    private $description;
    


    /**
     * Get the value of checkin_id
     */
    public function getCheckinId() {
        return $this->checkin_id;
    }

    /**
     * Set the value of checkin_id
     */
    public function setCheckinId($checkin_id): self {
        $this->checkin_id = $checkin_id;
        return $this;
    }

    /**
     * Get the value of first_indentity_card
     */
    public function getFirstIndentityCard() {
        return $this->first_indentity_card;
    }

    /**
     * Set the value of first_indentity_card
     */
    public function setFirstIndentityCard($first_indentity_card): self {
        $this->first_indentity_card = $first_indentity_card;
        return $this;
    }

    /**
     * Get the value of second_indentity_card
     */
    public function getSecondIndentityCard() {
        return $this->second_indentity_card;
    }

    /**
     * Set the value of second_indentity_card
     */
    public function setSecondIndentityCard($second_indentity_card): self {
        $this->second_indentity_card = $second_indentity_card;
        return $this;
    }

    /**
     * Get the value of checkin_code
     */
    public function getCheckinCode() {
        return $this->checkin_code;
    }

    /**
     * Set the value of checkin_code
     */
    public function setCheckinCode($checkin_code): self {
        $this->checkin_code = $checkin_code;
        return $this;
    }

    /**
     * Get the value of checkin_date
     */
    public function getCheckinDate() {
        return $this->checkin_date;
    }

    /**
     * Set the value of checkin_date
     */
    public function setCheckinDate($checkin_date): self {
        $this->checkin_date = $checkin_date;
        return $this;
    }

    /**
     * Get the value of create_at
     */
    public function getCreateAt() {
        return $this->create_at;
    }

    /**
     * Set the value of create_at
     */
    public function setCreateAt($create_at): self {
        $this->create_at = $create_at;
        return $this;
    }

    /**
     * Get the value of checkin_user
     */
    public function getCheckinUser() {
        return $this->checkin_user;
    }

    /**
     * Set the value of checkin_user
     */
    public function setCheckinUser($checkin_user): self {
        $this->checkin_user = $checkin_user;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of bill_id
     */
    public function getBillId() {
        return $this->bill_id;
    }

    /**
     * Set the value of bill_id
     */
    public function setBillId($bill_id): self {
        $this->bill_id = $bill_id;
        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self {
        $this->status = $status;
        return $this;
    }
}

?>