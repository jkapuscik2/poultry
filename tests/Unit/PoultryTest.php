<?php

class PoultryTest extends TestCase
{
    public function testPhotoUrl()
    {
        $testPhoto = "photourl.jpg";
        $testPhotoUrl = "http://test.test/photourl.jpg";
        $mockDisk = $this->getMockBuilder("S3")->setMethods(["url"])->getMock();
        $mockDisk->expects($this->once())->method("url")->with($testPhoto)->willReturn($testPhotoUrl);
        \Illuminate\Support\Facades\Storage::shouldReceive("disk")->withArgs(["s3"])->once()->andReturn($mockDisk);

        $model = new \App\Poultry();
        $model->photo = $testPhoto;
        $this->assertEquals($model->photoUrl(), $testPhotoUrl);
    }
}
