<?php

namespace App\Models;

use App\Models\Traits\Listable;
use App\Service\CurrentSemester;
use Carbon\Carbon;

/**
 * Class Meeting
 * @method static applyFilter($data)
 * @package App\Models
 */
class Meeting extends BaseModel
{
    use Listable, CurrentSemester;

    protected static $allowSearchFields = ['title', 'detail', 'start_time'];
    protected static $allowSortFields = ['id'];
    protected $fillable = ['id', 'title', 'detail', 'address', 'start_time', 'late_id', 'users'];

    const BASE_COURSE = 50;
    const ALL_USER = 'all';

    public function scopeApplyFilter($query, $data)
    {
        $data = $data->only('user', 'start_time');
        $query->withSimpleSearch()
            ->withSort();
        if (isset($data['user'])) {
            $query->byUser($data['user']);
        }
        if (\Auth::user()->isCollege()) {
            $userIds = User::byCollege(auth()->user()->college->id)->get()->pluck('id');
            foreach ($userIds as $userId) {
                $query->byUser($userId);
            }
        }
        if (isset($data['start_time'])) {
            $query->whereBetween('start_time', [$data['start_time'], Carbon::now()]);
        } else {
            $query->currentSemester('start_time');
        }
        return $query->recent();
    }

    public function scopebyUser($query, $user)
    {
        return $query->orWhere('users', 'like', '%' . ",$user," . '%')
            ->orWhere('users', 'like', "$user," . '%')
            ->orWhere('users', 'like', '%' . ",$user")
            ->orWhere('users', 'like', static::ALL_USER);
    }

    public function scopeByKey($query, $key, $value)
    {
        return $query->where($key, $value);
    }

}
