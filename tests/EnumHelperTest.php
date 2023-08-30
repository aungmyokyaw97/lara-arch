<?php
namespace Amk\LaraArch\Tests;

enum EnumStatus : int {
    case Pending = 0;
    case Approved = 1;
    case Delivered = 2;
}

class EnumHelperTest extends TestCase
{
    /**
     * testEnumFromKey
     *
     * @return void
     */
    public function testEnumFromKey()
    {
        $value = enum_from_key(EnumStatus::cases(),'Delivered');
        $this->assertEquals(2, $value);
    }
    
    /**
     * testEnumFromValue
     *
     * @return void
     */
    public function testEnumFromValue()
    {
        $value = enum_from_value(EnumStatus::cases(),1);
        $this->assertEquals('Approved', $value);
    }

}