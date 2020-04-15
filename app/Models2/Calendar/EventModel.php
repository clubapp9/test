<?php
/**
 * Created by PhpStorm.
 * User: Chris Medina
 * Date: 1/1/16
 * Time: 5:22 PM
 */

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $table = 'calendar_events';
    protected $primaryKey = 'event_id';
    public $timestamps = false;
    protected $dates = ['start', 'end'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'start', 'end'];
    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}