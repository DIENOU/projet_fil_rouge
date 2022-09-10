<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UpdateTableUsersAddPermissions extends Migration
{
    private $roles = [
        'super-admin', 'admin', 'magasinier'
    ];

    private $permissions = [
        'afficher produits', 'ajouter produits', 'modifier produits', 'supprimer produits'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            DB::beginTransaction();
            // Ajouter les roles
            $superAdmin = Role::findOrCreate('super-admin');
            $admin = Role::findOrCreate('admin');
            $magasinier = Role::findOrCreate('magasinier');

            // Ajouter les permissions
            foreach ($this->permissions as $_perm) {
                Permission::findOrCreate($_perm);
            }

            // Affecter les permissions aux roles
            $superAdmin->syncPermissions($this->permissions);
            $admin->syncPermissions($this->permissions);
            $magasinier->syncPermissions([
                'afficher produits', 'ajouter produits', 'modifier produits'
            ]);

            $user = User::whereEmail('admin@admin.com')->first();
            if (isset($user)) {
                $user->syncRoles(['super-admin']);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
