<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\PermissionRepositoryEloquent as PermissionRepository;
use Toastr;

class PermissionController extends Controller
{
    public $permission;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permission = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topNodes = $this->permission->findWhere(['pid'=>0]);
        return view('admin.permission.create',compact('topNodes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PermissionRequest $request)
    {
        $this->permission->createPermission($request->all());
        return redirect('admin/permission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topNodes = $this->permission->findWhere(['pid'=>0]);
        $permission = $this->permission->find($id)->toArray();
        return view('admin.permission.edit',compact('topNodes','permission'));
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permission->updatePermission($request->all(),$id);
        return redirect('admin/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->permission->delete($id);
        if($result) {
            Toastr::success('删除成功！');
        }else {
            Toastr::error('删除失败，请稍后再试！');
        }
        return redirect('admin/permission');
    }

    public function ajaxIndex(Request $request)
    {
        $result = $this->permission->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
