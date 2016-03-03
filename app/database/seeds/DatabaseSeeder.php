<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
                
                $this->call('UserTableSeeder');
                
                $this->call('UserGroupTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
//        DB::table('users')->delete();

        User::create(array(
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'usergroup_id' => 1,
            'profile_icon' => 'no-user.jpg'
            )
        );
        
    }

}   
class UserGroupTableSeeder extends Seeder {
    
    public function run()
    {
//        DB::table('usergroups')->delete();
        
        Usergroup::create(array(
            'name' => 'superadmin',
            )
        );
        
        Usergroup::create(array(
            'name' => 'admin',
            )
        );
        
        Usergroup::create(array(
            'name' => 'customer',
            )
        );
        
        
    }

} 