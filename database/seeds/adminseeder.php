<?php

use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $admin = new \App\User;
        // $admin->username ="admin";
        // $admin->name ="situs admin name";
        // $admin->email ="admin@gmail.com";
        // $admin->roles = json_encode(["ADMIN"]);
        // $admin->password =\Hash::make("pass1234");
        // $admin->avatar ="belumadaFoto.png";
        // $admin->address ="Lowokwaru, malang";
        // $adm
        // $admin->save();
        // $this->command->info('user admin berhasil ditambahkan');

        $admin = new \App\User;
        $admin->username ="admin2";
        $admin->name ="admin name";
        $admin->email ="admin2@gmail.com";
        $admin->roles = json_encode(["ADMIN"]);
        $admin->password =\Hash::make("pass1234");
        $admin->avatar ="belumadaFoto2.png";
        $admin->address ="GOMBEK, malang";
        $admin->phone="081556680173";
        $admin->save();
        $this->command->info('user admin berhasil ditambahkan');
    }
}
