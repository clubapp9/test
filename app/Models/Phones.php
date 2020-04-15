<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phones';

    /**
     * Attributes that should be mass-assignable.
     *
     *  user_id  is the user who created the phone entry in the first place
     *
     * @var array
     */

    protected $fillable = [ 'user_id', 'account_id', 'description', 'phone', 'status' ];

    public function getPhonesByAccountId($account_id){
        $query = 'SELECT p.phone, p.description, p.status, p.created_at FROM phones p
                  LEFT JOIN users u ON ( u.id = p.user_id )
                  WHERE account_id=:account_id ORDER BY p.created_at DESC';

        $phones = DB::select( $query, [ 'account_id' => $account_id ]);

        return $phones;
    }

}
