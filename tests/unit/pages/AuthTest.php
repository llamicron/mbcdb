<?php

use App\Counselor;
use App\User;

use Illuminate\Foundation\Testing\DatabaseTransactions;


class AuthTest extends TestCase
{
  use DatabaseTransactions;

/* ------------------------------ Admin Tests ------------------------------- */

  /** @test if */
  public function an_admin_can_edit_all_counselors()
  {
    $user = factory(User::class)->create(['isAdmin' => 1]);
    $counselor = factory(Counselor::class)->create();
    $this->actingAs($user);
    $this->visit("/counselors/$counselor->id/edit")->see("Edit $counselor->first_name $counselor->last_name");
  }

  /** @test if */
  public function an_admin_can_access_the_admin_panel()
  {
    $user = factory(User::class)->create(['isAdmin' => 1]);
    $this->actingAs($user);

    $this->visit('/admin')->seePageIs('/admin')->see('All Users');
  }

/* ------------------------------ /Admin Tests ------------------------------- */

/* ---------------------------- Authed User Tests --------------------------- */

  /** @test if */
  public function an_authed_user_can_submit_feedback()
  {
    $user = factory(User::class)->create();
    $this->actingAs($user);
  }

  /** @test if */
  public function an_authed_user_cannot_access_the_admin_panel()
  {
    // Note: This is a regular user, not an admin
    $user = factory(User::class)->create();
    $this->actingAs($user);
    $this->setExpectedException('Symfony\Component\HttpKernel\Exception\HttpException');
    $this->get('/admin');
    throw $this->response->exception;
  }

  /** @test if */
  public function the_factory_creates_regular_users()
  {
    $user = factory(User::class)->create();
    $this->assertEquals(0, $user->isAdmin);
  }

  /** @test if */
  public function an_authed_user_can_edit_their_own_counselors()
  {
    $user = factory(User::class)->create();
    $counselor = factory(Counselor::class)->create(['user_id' => $user->id]);
    $this->actingAs($user);

    $this->visit("/counselors/$counselor->id/edit")->see("Edit");
  }

  /** @test if */
  public function an_authed_user_cannot_edit_a_counselor_that_is_not_theirs()
  {
    $user = factory(User::class)->create();
    $this->actingAs($user);
    $counselor = factory(Counselor::class)->create();

    $this->visit("/counselors/$counselor->id/edit")->see("Sorry, but you're not authorized to do this");
  }

  /** @test if */
  public function a_user_can_add_a_counselor()
  {
    // TODO: Expand upon this
    $this->visit("/counselors/add")->seePageIs('/counselor/add');
  }

/* ---------------------------- /Authed User Tests --------------------------- */

/* --------------------------------- Misc Tests ----------------------------- */
/* --------------------------------- /Misc Tests ----------------------------- */

/* --------------------------- Un-Authed User Tests ------------------------- */

  /** @test if */
  public function an_un_authed_user_cannot_submit_feedback()
  {
    $this->visit('#feedback')
         ->type('This is the subject', 'subject')
         ->type('This is the message', 'message')
         ->type('email@example.com', 'from')
         ->check('type')
         ->press('send');

         $this->seePageIs('/login');
  }

  /** @test if */
  public function an_un_authed_user_cannot_see_counselor_pages()
  {
    // acting as a guest
    $counselor = factory(Counselor::class)->create();

    $this->visit('/')->seePageIs('/login');
    $this->visit("/counselors/$counselor->id/show")->seePageIs('/login');
    $this->visit("/counselors/$counselor->id/edit")->seePageIs('/login');
    $this->visit("/counselors/$counselor->id/remove")->seePageIs('/login');

    $this->visit("/")->seePageIs('/login');
    $this->visit("/home")->seePageIs('/login');
  }

  /** @test if */
  public function an_un_authed_user_can_see_the_login_page()
  {
    $this->visit('/')->seePageIs('/login');
  }

  /** @test if */
  public function an_un_authed_user_can_see_the_about_page()
  {
    $this->visit('/about')->seePageIs('/about');
  }

  /** @test if */
  public function an_un_authed_user_cannot_see_the_admin_panel()
  {
    $this->setExpectedException('Symfony\Component\HttpKernel\Exception\HttpException');
    $this->get('/admin')->see('Sorry, Admins Only');
    throw $this->response->exception;
  }

  /** @test if */
  public function an_un_authed_user_cannot_add_a_counselor()
  {
    $this->visit("/counselors/add")->seePageIs('/login');
  }

/* --------------------------- /Un-Authed User Tests ------------------------- */

}
