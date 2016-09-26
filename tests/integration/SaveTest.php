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
    // given i have a counselor
    $counselor = factory(Counselor::class)->create();
    // and an authed user
    $user = factory(User::class)->create();
    $this->actingAs($user);
    // when they save a counselor
    $counselor->saveToUser();
    // We should see evidence in the database
    // and the counselor should be saved for that user
    $this->seeInDatabase('saves', [
      'user_id' => $user->id,
      'counselor_id' => $counselor->id,
    ]);
  }

}
