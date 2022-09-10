<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\RoleDataTable;
use App\Repositories\RoleRepository;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AppBaseController;

class RoleController extends AppBaseController
{
    /** @var RoleRepository $roleRepository*/
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     *
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!auth()->user()->hasAnyRole('super-admin', 'admin'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!auth()->user()->hasAnyRole('super-admin', 'admin'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $input = $request->except('permissions');

        $role = $this->roleRepository->create($input);

        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $role->givePermissionTo($permissions);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!auth()->user()->hasAnyRole('super-admin', 'admin'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $permissions = Permission::all();

        return view('roles.edit')
            ->with('role', $role)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!auth()->user()->hasAnyRole('super-admin', 'admin'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $role = $this->roleRepository->update($request->except('permissions'), $id);

        $permissions = $request->input('permissions') ? $request->input('permissions') : [];
        $role->syncPermissions($permissions);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        // Si l'utilisateur n'a pas cette permissions, on l'interdit l'accès
        abort_if(!auth()->user()->hasAnyRole('super-admin', 'admin'), 403, "Vous n'avez pas la permission d'accéder à cette fonctionnalité");

        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
}
