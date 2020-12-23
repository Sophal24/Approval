<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Approval\Traits\RequiresApproval;

class Post extends Model
{
    use HasFactory;
    // use RequiresApproval;

    protected $table = 'posts';


    /**
     * Function that defines the rule of when an approval process
     * should be actioned for this model.
     *
     * @param array $modifications
     *
     * @return boolean
     */
    protected function requiresApprovalWhen(array $modifications): bool
    {
        // Handle some logic that determines if this change requires approval
        //
        // Return true if the model requires approval, return false if it 
        // should update immediately without approval.
        return true;
    }
}
