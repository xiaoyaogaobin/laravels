<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Hdmodule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hd_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @returdin mixed
     */
    public function handle()
    {

        //扫描出控制器里面Controllers所有文件
        $modules = glob('app/Http/Controllers/*');
//        dd($modules);
        //循环每一个文件夹找出带有system 文件
        foreach($modules as $module){
//            dump($module);
            //判断 $module 包含system文件
            if (is_dir($module . '/System')){
//                dump($module);
                //获取模块最后面标识
                $moduleName = basename($module);
                //获取模块中文名称
                $config = include $module . '/System/config.php';
                //获取模块权限名称
                $permissions = include $module . '/System/permission.php';
                //往module 模型 加入数据
                Module::firstOrNew(['name' => $moduleName])->fill(
                    [
                        'title' => $config['app'],'permissions' => $permissions
                    ])->save();
                //往权限表里名 permissions 添加 数据
                foreach($permissions as $permission){
                    Permission::firstOrNew(['name'=>$moduleName.'-'.$permission['name']])->fill([
                        'title'=>$permission['name'],
                         'module'=>$moduleName
                    ])->save();

//                    dump($permission);
                }


             }
        }
        //给指定一个用户设置站长角色,站长角色要拥有所有权限
        // 找到站长这个用户
        $role = Role::where('name','webmaster')->first();
//        dump($role);
        //获得所有权限
        $permissions = Permission::pluck('name');
        //执行完成这句话之后 role_has_permissions表应该有数据,将多个权限同步到一个用户
        $role->syncPermissions($permissions);
        //所得设置成站长那个用户
        $user = User::find(1);
        //给用户添加角色
        $user->assignRole('webmaster');
        //清除权限缓存
        app()['cache']->forget('spatie.permission.cache');
        //命令执行成功提示信息
        $this->info('permission init successfully');

        //users 用户表
        //model_has_roles 用户 角色中间表
        //roles 角色表
        //role_has_permission 角色 权限中间表
        //permissions 权限表

    }
}
