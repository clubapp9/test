<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;

class WorkingGroupModel extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'working_groups';

    protected $primaryKey = 'working_group_id';



    public function user()
    {
        return $this->hasOne( 'App\Models\UsersModel', 'id' );
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['working_group_id', 'moderator_id', 'name', 'about'];

    function getWorkingGroupfromForum( $forum_id ) {

    }

    function userHasAccessToGroup( $user_id, $working_group_id ) {
        $group_found = $this->query('SELECT * FROM assn_working_groups_users
                                    WHERE working_group_id=:working_group_id AND user_id=:user_id',
            [ 'working_group_id' => $working_group_id, 'user_id' => $user_id ] );

        if($group_found)
        {
            return $group_found->count();
        }

        return false;
    }

    public function currentUserHasAccessToGroup( $working_group_id ) {
        $query = DB::Select( "SELECT * FROM assn_working_groups_users
                                    WHERE working_group_id=:working_group_id AND user_id=:user_id", [ 'working_group_id' => $working_group_id, 'user_id' => Auth::id() ] );

        if($query)
        {
            return count($query);
        }

        return false;
    }

    public function currentUserIsModeratorOfGroup( $working_group_id ) {
        $query = DB::Select( "SELECT * FROM working_groups
                                    WHERE working_group_id=:working_group_id AND moderator_id=:moderator_id", [ 'working_group_id' => $working_group_id, 'moderator_id' => Auth::id() ] );

        if($query)
        {
            return count($query);
        }

        return false;
    }

    public static function getGroupsUserModerates( $user_id ) {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $query = DB::Select( "SELECT working_group_id FROM working_groups
                                    WHERE moderator_id=:moderator_id", [ 'moderator_id' => $user_id ] );
        DB::setFetchMode(\PDO::FETCH_CLASS);
        if($query)
        {
            return $query;
        }
        return false;
    }

}
