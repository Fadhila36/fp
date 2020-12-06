<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@admin.com";
        $administrator->password = \Hash::make("administrator");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
