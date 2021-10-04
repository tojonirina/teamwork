<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public $timestamp = false;

    public function getId(): int {
        return $this->attributes['id'];
    }

    public function getTitle(): string {
        return $this->attributes['title'];
    }
    public function setTitle(string $title) {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): string {
        return $this->attributes['description'];
    }
    public function setDescription(string $description) {
        $this->attributes['description'] = $description;
    }

    public function getCreatedBy(): string {
        return $this->attributes['created_by'];
    }
    public function setCreatedBy(string $createdBy) {
        $this->attributes['created_by'] = $createdBy;
    }

    public function getOwner(): string {
        return $this->attributes['owner'];
    }
    public function setOwner(string $owner) {
        $this->attributes['owner'] = $owner;
    }

    public function getStatus(): string {
        return $this->attributes['status'];
    }
    public function setStatus(string $status) {
        $this->attributes['status'] = $status;
    }

    public function getNotes(): string {
        return $this->attributes['notes'];
    }
    public function setNotes(string $notes) {
        $this->attributes['notes'] = $notes;
    }

    public function getCreatedAt(): string {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedAt(): string {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updated_at) {
        $this->attributes['updated_at'] = $updated_at;
    }
    
}
