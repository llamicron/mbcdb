<?php

use App\Counselor;
use App\District;
use App\Badge;
use App\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CounselorTest extends TestCase
{
  use DatabaseTransactions;

  /** @test if */
  public function it_has_a_name()
  {
    $counselor = new Counselor([
      'name' => 'Luke Sweeney'
    ]);

    $this->assertEquals('Luke Sweeney', $counselor->name);
  }

  /** @test if */
  public function it_has_an_address()
  {
    $counselor = new Counselor([
      'address' => '24888 Old Hwy. 6',
      'city'    => 'Navasota',
      'state'   => 'Texas',
      'zip'     => '77868'
    ]);

    $this->assertEquals('24888 Old Hwy. 6', $counselor->address);
    $this->assertEquals('Navasota', $counselor->city);
    $this->assertEquals('Texas', $counselor->state);
    $this->assertEquals('77868', $counselor->zip);
  }

  /** @test if */
  public function it_has_a_district()
  {
    $district = factory(District::class)->create();
    $counselor = factory(Counselor::class)->create();

    $district->counselors()->save($counselor);

    $this->assertEquals($district->id, $counselor->district_id);
  }

  /** @test if */
  public function it_can_add_merit_badges()
  {
    $counselor = factory(Counselor::class)->create();
    $badge = factory(Badge::class)->create();

    $counselor->badges()->save($badge);

    $x = $counselor->badges()->first();
    $this->assertEquals($badge->id, $x->id);
  }
}
