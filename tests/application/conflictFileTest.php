<?php
/**
 * Application conflict file test
 * 
 * @author        Eddie Jaoude
 * @package     Application
 * 
 */
class ConflictFileTest extends BaseTestCase
{
    /**
     * Relative path
     * 
     * @author 	Eddie Jaoude
     * @param 	object $config
     * 
     */
    protected $directory = '/..';
    
    /**
     * Full path
     *
     * @author 	Eddie Jaoude
     * @param 	null
     * @return 	null
     *
     */
    public function setup() {
        parent::setUp();
        
        $this->directory = APPLICATION_PATH . $this->directory;
    }

   /**
     * Test application directory
     *
     * @author 	Eddie Jaoude
     * @param 	null
     * @return 	null
     *
     */
   public function testApplicationDirectory() {
        $list = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->directory));
        foreach ($list as $k=> $v) {
                try {
                    $this->assertEquals(false, stristr($v, '.LOCAL.'));
                    $this->assertEquals(false, stristr($v, '.REMOTE.'));
                    $this->assertEquals(false, stristr($v, '.BASE.'));
                } catch (Exception $e) {
                    $this->fail('Conflicting file found: ' . $v);
                }
                
        }
        
    }
    
    /**
     * Finaliase (post-tests)
     *
     * @author 	Eddie Jaoude
     * @param 	null
     * @return 	null
     *
     */
    public function tearDown() {
        parent::tearDown();
    }

}