<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use App\Traits\Admin\ActionButtonTrait;
class Permission extends EntrustPermission
{
    use ActionButtonTrait;

    protected $fillable = ['display_name', 'pid', 'name', 'description', 'icon', 'is_menu', 'sort'];

    protected $appends = ['sub_permission'];

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

    public function getSubPermissionAttribute()
    {
        return ($this->attributes['pid'] == 0) ? $this->where('pid',$this->attributes['id'])->orderBy('sort', 'asc')->get() : null;
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'permission_role');
    }


}