<?php

class Helper
{
    private $connector;
    private $jsonFile;

    /**
     * Helper constructor.
     * @throws Exception
     */
    function __construct()
    {
        //$this->connector = new Connector();
        $this->jsonFile = fopen('links.txt', 'w+');
        if (!$this->jsonFile) {
            throw new Exception('Failed to create json file');
        }
    }

    /**
     * @param string $url
     * @throws Exception if cannot write to json file
     */
    public function addVisitedUrl($url)
    {
        $this->appendLinkToJsonFile($url);
    }

    public function checkIfUrlIsVisited($url)
    {
        return false;
        //return $this->connector->checkIfUrlExists($url);
    }

    /**
     * @param string $url
     * @throws Exception
     */
    public function appendLinkToJsonFile($url)
    {
        if (!fwrite($this->jsonFile, $url."\n")) {
            throw new Exception('Cannot write to json file');
        }
    }

    /**
     * @throws Exception
     */
    public function closeJsonFile()
    {
        if (!fclose($this->jsonFile)) {
            throw new Exception('Cannot close json file');
        }
        unlink('links.json');
    }
}
