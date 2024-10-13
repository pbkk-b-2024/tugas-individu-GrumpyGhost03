<?php

// app/Models/RoleHasPermission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    protected $table = 'role_has_permissions'; // Specify the table name

    protected $fillable = [
        'role_id',
        'permission_id',
    ];

    public $timestamps = false; // No timestamps for this model

    // Define relationships
    public function role()
    {
        return $this->belongsTo(Role::class); // Belongs to Role
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class); // Belongs to Permission
    }
}
