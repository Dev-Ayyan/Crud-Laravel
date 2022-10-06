<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\JoshController;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use Redirect;
use Sentinel;
use View;
use Str;

class RolesController extends JoshController
{
    /**
     * Show a list of all the roles.
     *
     * @return View
     */
    public function index()
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        // Grab all the roles
        $roles = Sentinel::getRoleRepository()->all();

        // Show the page
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Role create.
     *
     * @return View
     */
    public function create()
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $all_permissions = Permission::all();
        $selected = [];
        // Show the page
        return view('admin.roles.create',compact('all_permissions','selected'));
    }

    /**
     * Role create form processing.
     *
     * @param RoleRequest $request
     * @return void
     */
    public function store(RoleRequest $request)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $permissions_to_save=[];
        if($request->has('permissions'))
        {
            foreach($request->permissions as $permission)
            {
                $permissions_to_save[$permission]=true;
            }    
        }
        if ($role = Sentinel::getRoleRepository()->createModel()->create(
            [
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'permissions' => $permissions_to_save,
            ]
        )
        ) {
            // Redirect to the new role page
            return Redirect::route('admin.roles.index')->with('success', trans('roles/message.success.create'));
        }

        // Redirect to the role create page
        return Redirect::route('admin.roles.create')->withInput()->with('error', trans('roles/message.error.create'));
    }


    /**
     * Role update.
     *
     * @param int $role
     * @return View
     */
    public function edit($role)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        try {
            // Get the role information
            $role = Sentinel::findRoleById($role);
        } catch (RoleNotFoundException $e) {
            // Redirect to the roles management page
            return Redirect::route('admin.roles')->with('error', trans('roles/message.role_not_found', compact('id')));
        }

        $all_permissions = Permission::all();
        $selected = [];

        $selected=$role->permissions;

        // Show the page
        return view('admin.roles.edit', compact('role','all_permissions','selected'));
    }

    /**
     * Role update form processing page.
     *
     * @param int
     * @param RoleRequest $request
     * @return Redirect
     */
    public function update($role, RoleRequest $request)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $role = Sentinel::findRoleById($role);

        // Update the role data
        $role->name = $request->get('name');
        //save permissions for role
        $permissions_to_save=[];
        if($request->has('permissions'))
        {
            foreach($request->permissions as $permission)
            {
                $permissions_to_save[$permission]=true;
            }
        }
        $role->permissions=$permissions_to_save;

        // Was the role updated?
        if ($role->save()) {
            // Redirect to the role page
            return Redirect::route('admin.roles.index')->with('success', trans('roles/message.success.update'));
        } else {
            // Redirect to the role page
            return Redirect::route('admin.roles.edit', $role)->with('error', trans('roles/message.error.update'));
        }
    }

    /**
     * Delete confirmation for the given role.
     *
     * @param int $id
     * @return View
     */
    public function getModalDelete($id = null)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }

        $model = 'roles';
        $confirm_route = $error = null;
        try {
            // Get role information
            $role = Sentinel::findRoleById($id);
            $confirm_route = route('admin.roles.delete', ['id' => $role->id]);
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (RoleNotFoundException $e) {
            $error = trans('admin/roles/message.role_not_found', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    /**
     * Delete the given role.
     *
     * @param int $id
     * @return Redirect
     */
    public function destroy($id)
    {
         //check if user has permission
       if (!Sentinel::inRole('admin') && !Sentinel::getUser()->hasAccess(['roles']))
       {
           return redirect()->route('admin.dashboard')->with('error','Do not Have access');
       }
       
        try {
            // Get role information
            $role = Sentinel::findRoleById($id);

            // Delete the role
            $role->delete();

            // Redirect to the role management page
            return Redirect::route('admin.roles.index')->with('success', trans('roles/message.success.delete'));
        } catch (RoleNotFoundException $e) {
            // Redirect to the role management page
            return Redirect::route('admin.roles.index')->with('error', trans('roles/message.role_not_found', compact('id')));
        }
    }
}
