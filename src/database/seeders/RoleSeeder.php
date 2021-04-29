<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Создаем роли для сайта
        $admin = Role::updateOrCreate(["name" => "admin"]);
        $moderator = Role::updateOrCreate(["name" => "moderator"]);
        $worker = Role::updateOrCreate(["name" => "worker"]);
        $customer = Role::updateOrCreate(["name" => "customer"]);

        //Создаем права для сайта
        $create_vacancy = Permission::updateOrCreate(["name" => "create_vacancy"]);
        $delete_vacancy = Permission::updateOrCreate(["name" => "delete_vacancy"]);
        $change_vacancy = Permission::updateOrCreate(["name" => "change_vacancy"]);
        $contact_with_worker = Permission::updateOrCreate(["name" => "contact_with_worker"]);
        $apply_to_vacancy = Permission::updateOrCreate(["name" => "apply_to_vacancy"]);
        $edit_profile = Permission::updateOrCreate(["name" => "edit_profile"]);
        $give_permission = Permission::updateOrCreate(["name" => "give_permission"]);
        $show_portfolio = Permission::updateOrCreate(["name" => "show_portfolio"]);
        $chat_with = Permission::updateOrCreate(["name" => "chat_with"]);
        $open_admin_panel = Permission::updateOrCreate(["name" => "open_admin_panel"]);

        //Присваиваем права для соответствующих ролей
        $admin->givePermissionTo($create_vacancy, $delete_vacancy, $change_vacancy, $contact_with_worker, $apply_to_vacancy, $edit_profile, $give_permission, $show_portfolio, $chat_with, $open_admin_panel);
        $moderator->givePermissionTo($create_vacancy, $delete_vacancy, $change_vacancy, $contact_with_worker, $edit_profile, $show_portfolio, $chat_with);
        $worker->givePermissionTo($apply_to_vacancy, $edit_profile, $show_portfolio, $chat_with);
        $customer->givePermissionTo($create_vacancy, $delete_vacancy, $change_vacancy, $contact_with_worker, $edit_profile, $show_portfolio, $chat_with);
    }
}
