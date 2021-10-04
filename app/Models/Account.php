<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
    
    protected $table = 'accounts';
    public $timestamp = false;
    protected $hidden = ['password'];

    public function getId(): int {
        return $this->attributes['id'];
    }

    public function getFullname(): string {
        return $this->attributes['fullname'];
    }
    public function setFullname(string $_fullname): void {
        $this->attributes['fullname'] = ucwords($_fullname);
    }

    public function getEmail(): string {
        return $this->attributes['email'];
    }
    public function setEmail(string $_email): void {
        $this->attributes['email'] = strtolower($_email);
    }

    public function getPassword(): string {
        return $this->attributes['password'];
    }
    public function setPassword(string $_password): void {
        $this->attributes['password'] = sha1($_password);
    }

    public function getIdHashed(): string {
        return $this->attributes['id_hashed'];
    }
    public function setIdHashed(string $_id_hashed): void {
        $this->attributes['id_hashed'] = $_id_hashed;
    }

    public function getAccountType(): string {
        return $this->attributes['account_type'];
    }
    public function setAccountType(string $_account_type): void {
        $this->attributes['account_type'] = $_account_type;
    }

    public function getEmailVerifiedAt(): string {
        return $this->attributes['email_verified_at'];
    }
    public function setEmailVerifiedAt(string $_verified_at): void {
        $this->attributes['email_verified_at'] = $_verified_at;
    }

    public function getCreatedAt(): string {
        return date('d/m/Y', $this->attributes['created_at']);
    }

    public function getUpdatedAt(): string {
        return date('d/m/Y', $this->attributes['updated_at']);
    }
    public function setUpdatedAt($_updated_at): void {
        $this->attributes['updated_at'] = $_updated_at;
    }

    // Customized parameters
    public function getRouteKeyName()
    {
        return 'id_hashed';
    }
}
