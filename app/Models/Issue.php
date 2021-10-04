<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';
    public $timestamps = false;

    public function getId(): int {
        return $this->attributes['id'];
    }

    public function getDescription(): string {
        return $this->attributes['description'];
    }
    public function setDescription(string $description) {
        $this->attributes['description'] = $description;
    }

    public function getStageId(): int {
        return $this->attributes['stage_id'];
    }
    public function setStageId(int $stage_id) {
        $this->attributes['stage_id'] = $stage_id;
    }

    public function getOwner() {
        return $this->attributes['owner'];
    }
    public function setOwner(string $owner) {
        $this->attributes['owner'] = $owner;
    }

    public function getStatus(): bool {
        return $this->attributes['status'];
    }
    public function setStatus(bool $status) {
        $this->attributes['status'] = $status;
    }

    public function getNotes() {
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
