<?php

use Counselor;

class CounselorTest extends TestCase
{

  /** @test if */
  public function it_sorts_counselors_alphabetically()
  {
    factory(Counselor::class, 10)->create();

    $counselors = Counselor::alphabetize();
  }

}
