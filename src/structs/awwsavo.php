<?php


namespace AWWSAVO\Client\structs;


class awwsavo
{
    /**
     * @var AWWSAVOInput
     */
    public $inputData;

    public function __construct(AWWSAVOInput $inputData)
    {
        $this->inputData = $inputData;
    }
}