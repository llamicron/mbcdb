<?php

use App\Counselor;
use App\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;


class AuthTest extends TestCase
{
  use DatabaseTransactions;

  /** @test if */
  public function the_login_displays_correctly()
  {
    $this->visit('/')->seePageIs('/login');
  }

  /** @test if */
  public function the_about_page_displays_without_user_being_authed()
  {
    $this->visit('/about')->seePageIs('/about');
  }

  /** @test if */
  public function a_user_cannot_access_a_counselor_page_without_being_authed()
  {
    $this->visit('/counselors/1/show')->seePageIs('/login');
  }

  /** @test if */
  public function the_factory_creates_regular_users()
  {
    $users = factory(User::class, 20)->create();
    foreach ($users as $user) {
      $this->assertEquals(0, $user->isAdmin);
    }
  }

  /** @test if */
  public function a_normal_user_cannot_access_the_admin_panel()
  {
    // Note: This is a regular user, not an admin
    $user = factory(User::class)->create();
    $this->actingAs($user);
    $this->visit('/admin');
  }

  /** @test if */
  public function an_admin_can_access_the_admin_panel()
  {
    $user = factory(User::class)->create(['isAdmin' => 1]);
    $this->actingAs($user);

    $this->visit('/admin')->seePageIs('/admin');
  }

  /** @test if */
  public function an_admin_can_edit_all_counselors()
  {
    $user = factory(User::class)->create(['isAdmin' => 1]);
    $counselor = factory(Counselor::class)->create();
    $this->actingAs($user);

    // $this->setExpectedException(403);

    $this->visit("/counselors/$counselor->id/edit");
  }
}
