<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2017/6/3
 * Time: 20:07
 */

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\Eloquent\PermissionRepositoryEloquent as PermissionRepository;

class AdminMenuComposer{
    protected $permission;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permission = $permissionRepository;
    }

    public function compose(View $view)
    {
        $view->with('adminMenus',$this->permission->menus());
    }
}