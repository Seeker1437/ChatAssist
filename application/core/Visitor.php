<?php

/**
 * Created by PhpStorm.
 * User: Train
 * Date: 7/24/2016
 * Time: 2:32 PM
 */
class Visitor
{
    public $FirstName;
    public $LastName;
    public $ZipCode;
    public $EmailAddress;
    public $IpAddress;
    public $UserAgent;
    public $Source;

    public function getDetectedDevice()
    {
        $dd = new \DeviceDetector\DeviceDetector($this->UserAgent);

        $dd->parse();

        $os = $dd->getOs();
        $client = $dd->getClient();

        return "[".$os['name']."; ".$os['version']."; ".$os['platform'].";]
         ".$client['name']." ".$client['version'];
    }

    public function __toString()
    {
        return "".$this->FirstName.", ".$this->LastName.", ".$this->ZipCode.", ".$this->EmailAddress.", ".$this->IpAddress.", ".$this->Source.", ".$this->UserAgent.", ".$this->DateTime;
    }
}