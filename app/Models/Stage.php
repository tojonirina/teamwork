<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';
    public $timestamps = false;

    public function getId(): int {
        return $this->attributes['id'];
    }
    
    public function getTitle(): string {
        return $this->attributes['title'];
    }
    public function setTitle(string $title) {
        $this->attributes['title'] = $title;
    }

    public function getProjectId(): int {
        return $this->attributes['project_id'];
    }
    public function setProjectId(int $id) {
        $this->attributes['project_id'] = $id;
    }
}
