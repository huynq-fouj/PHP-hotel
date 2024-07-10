<?php
class EmployeeObject{
    private $id;
    private $fullname;
    private $phone;
    private $personal_id;
    private $email;
    private $address;
    private $role;

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of fullname
     */
    public function getFullname() {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     */
    public function setFullname($fullname): self {
        $this->fullname = $fullname;
        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone($phone): self {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set the value of address
     */
    public function setAddress($address): self {
        $this->address = $address;
        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole($role): self {
        $this->role = $role;
        return $this;
    }

    /**
     * Get the value of personal_id
     */
    public function getPersonalId() {
        return $this->personal_id;
    }

    /**
     * Set the value of personal_id
     */
    public function setPersonalId($personal_id): self {
        $this->personal_id = $personal_id;
        return $this;
    }
}