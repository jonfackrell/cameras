<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->index();
            $table->string('name');
            $table->longText('content')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });

        $systemPermissions = [
            'view-pages' => 'View Pages', 'create-pages' => 'Create Pages', 'edit-pages' => 'Edit Pages', 'delete-pages' => 'Delete Pages',
        ];

        foreach($systemPermissions as $key => $systemPermission){
            $permission = \App\Models\Permission::create([
                'name' => $key,
                'label' => $systemPermission
            ]);
        }

        $supervisor = \App\Models\Role::whereName('administrator')->first();
        $supervisor->permissions()->syncWithoutDetaching(
            \App\Models\Permission::where('name', 'LIKE', '%pages%')
                ->get()
        );

        $supervisor = \App\Models\Role::whereName('supervisor')->first();
        $supervisor->permissions()->syncWithoutDetaching(
            \App\Models\Permission::where('name', 'LIKE', '%pages%')
                ->get()
        );

        $page = new \App\Models\Page();
        $page->slug = '3d-printing-home';
        $page->name = '3D Printing';
        $page->content = '';
        $page->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
