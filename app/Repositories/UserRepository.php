<?php
/**
 * Created by PhpStorm.
 * User: Sunlong
 * Date: 2017/7/29
 * Time: 15:28
 */

namespace App\Repositories;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\Models\User';
    }


}