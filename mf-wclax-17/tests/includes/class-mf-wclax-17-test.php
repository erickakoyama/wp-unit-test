<?php
/**
 *
 * Test class
 *
 */
use PHPUnit\Framework\TestCase;

class Main_Class_Test extends TestCase {

  /**
   * @var instance of class to be tested
   */
  protected $instance;


  /**
   * Setup
   */
  public function setUp() {
    \WP_Mock::setUp();
  }

  /**
   * Destroy
   */
  public function tearDown() {
    \WP_Mock::tearDown();
  }

}
