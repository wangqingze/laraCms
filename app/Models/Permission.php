<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use App\Traits\Admin\ActionButtonTrait;
class Permission extends EntrustPermission
{
    use ActionButtonTrait;

    protected $fillable = ['display_name', 'pid', 'name', 'description', 'icon', 'is_menu', 'sort'];

    public function getNameAttribute($value)
    {
        if(starts_with($value, '#')) {
            return head(explode('-', $value));
        }
        return $value;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ($value == '#') ? '#-' . time() : $value;
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'roles');
    }
}