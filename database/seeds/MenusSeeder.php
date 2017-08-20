<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' =>1,
                'name' => '任务管理',
                'parent_id' => 0,
                'icon' =>'dashboard',
                'url' =>'',
                'description' =>'任务管理',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>2,
                'name' => '任务管理',
                'parent_id' => 1,
                'icon' =>'',
                'url' =>'taskManage',
                'description' =>'任务管理',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>3,
                'name' => '添加任务',
                'parent_id' => 1,
                'icon' =>'',
                'url' =>'add_task',
                'description' =>'添加任务',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>4,
                'name' => '任务考核汇总',
                'parent_id' => 1,
                'icon' =>'',
                'url' =>'task_collect',
                'description' =>'任务考核汇总',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>5,
                'name' => '用户管理',
                'parent_id' => 0,
                'icon' =>'account_box',
                'url' =>'',
                'description' =>'用户管理',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>6,
                'name' => '用户列表',
                'parent_id' => 5,
                'icon' =>'',
                'url' =>'user_lists',
                'description' =>'用户列表',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>7,
                'name' => '添加用户',
                'parent_id' => 5,
                'icon' =>'',
                'url' =>'add_user',
                'description' =>'添加用户',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>8,
                'name' => '工作通知',
                'parent_id' => 0,
                'icon' =>'message',
                'url' =>'',
                'description' =>'工作通知',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>9,
                'name' => '通知公告',
                'parent_id' => 8,
                'icon' =>'',
                'url' =>'notify',
                'description' =>'通知公告',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>10,
                'name' => '工作讨论',
                'parent_id' => 8,
                'icon' =>'',
                'url' =>'notify',
                'description' =>'工作讨论',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>11,
                'name' => '预置数据',
                'parent_id' => 0,
                'icon' =>'multiline_chart',
                'url' =>'',
                'description' =>'预置数据',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>12,
                'name' => '学院名称设置',
                'parent_id' => 11,
                'icon' =>'',
                'url' =>'colleges',
                'description' =>'学院名称设置',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>13,
                'name' => '工作类型设置',
                'parent_id' => 11,
                'icon' =>'',
                'url' =>'work_type',
                'description' =>'工作类型设置',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>14,
                'name' => '对口科室设置',
                'parent_id' => 11,
                'icon' =>'',
                'url' =>'department',
                'description' =>'对口科室设置',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>15,
                'name' => '考核等级设置',
                'parent_id' => 11,
                'icon' =>'',
                'url' =>'access',
                'description' =>'考核等级设置',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>16,
                'name' => '任务列表',
                'parent_id' => 1,
                'icon' =>'',
                'url' =>'tasks_of_college',
                'description' =>'学院显示的任务列表',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'id' =>17,
                'name' => '任务列表',
                'parent_id' => 1,
                'icon' =>'',
                'url' =>'tasks_of_teacher',
                'description' =>'老师显示的任务列表',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
