<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				$this->call(CouncilsTableSeeder::class);
			  $this->call(DistrictsTableSeeder::class);
			  $this->call(UsersTableSeeder::class);
				$this->call(CounselorsTableSeeder::class);
        $this->call(LukeSeeder::class);
    }
}

class LukeSeeder extends Seeder {
  public function run()
  {
    $user = new App\User;
    $user->name = "Luke Sweeney";
    $user->email = "luke@thesweeneys.org";
    $user->isAdmin = 1;
    $user->password = bcrypt("password");
    $user->save();

		for ($i=0; $i < 10; $i++) {
			$counselor = factory('App\Counselor')->create();
			$district = App\District::all()->random(1);
			$district->counselors()->save($counselor);
			$user->counselors()->save($counselor);
		}

    $user = new App\User;
    $user->name = "Luke's Non Admin";
    $user->email = "lukesjunk@thesweeneys.org";
    $user->isAdmin = 0;
    $user->password = bcrypt("password");
    $user->save();

		for ($i=0; $i < 10; $i++) {
			$counselor = factory('App\Counselor')->create();
			$district = App\District::all()->random(1);
			$district->counselors()->save($counselor);
			$user->counselors()->save($counselor);
		}
  }
}

class CouncilsTableSeeder extends Seeder {
	public function run()
	{
		for ($y=0; $y < 15; $y++) {
			$council = factory('App\Council')->create();
		}
	}
}

class DistrictsTableSeeder extends Seeder {
	public function run() {
		for ($r=0; $r < 25; $r++) {
			$district = factory('App\District')->create();
			$council = App\Council::all()->random(1);
			$council->districts()->save($district);
		}
	}
}

class CounselorsTableSeeder extends Seeder {

	public function run() {
		for ($c=0; $c < 50; $c++) {
			$counselor = factory('App\Counselor')->create();

			// Associate counselor with district
			$district = App\District::all()->random(1);
			$district->counselors()->save($counselor);

			// Associate counselor with user
			$user = App\User::all()->random(1);
			$user->counselors()->save($counselor);

			// Associate counselor with 7 badges
			$badges = App\Badge::all()->random(7);
			foreach($badges as $badge) {
				$counselor->badges()->save($badge);
			}

			// Associate counselor with council
			$council = App\Council::all()->random(1);
			$council->counselors()->save($counselor);
		}
	}
}

class UsersTableSeeder extends Seeder {
	public function run()
	{
		for ($i=0; $i < 35; $i++) {
			$user = factory('App\User')->create();
		}
	}
}
