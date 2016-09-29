<?php

use App\Counselor;
use App\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;


class SavesTest extends TestCase
{

  use DatabaseTransactions;

  /** @test if */
  public function a_counselor_can_be_saved()
  {
    $counselor = factory(Counselor::class)->create();
    $user = factory(User::class)->create();
    $this->actingAs($user);
    $user->saveToUser($counselor);
    $this->seeInDatabase('saves', [
      'user_id' => $user->id,
      'counselor_id' => $counselor->id,
    ]);
  }

  /** @test if */
  public function a_counselor_can_be_unsaved()
  {
    // setup for counselor, user, and saving counselor to user
    $counselor = factory(Counselor::class)->create();
    $user = factory(User::class)->create();
    $this->actingAs($user);
    // saving the user
    $user->saveToUser($counselor);
    // unsaving the user (it's a toggle)
    $user->saveToUser($counselor);

    $this->assertEquals(false, $user->hasSaved($counselor));
  }

  /** @test if */
  public function saved_counselors_are_displayed_correctly()
  {
    $user = factory(User::class)->create();
    $this->actingAs($user);
    $counselor = factory(Counselor::class)->create();
    $user->saveToUser($counselor);

    // working on this!
    // $this->visit('/saved')->see();

  }
}
