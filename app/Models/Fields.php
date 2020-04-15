<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 8/23/2019
 * Time: 5:11 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fields extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fields';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'short_name', 'customized_name' , 'group_id', 'frequency_id', 'data_type_id', 'group_id', 'user_id' ];



}
