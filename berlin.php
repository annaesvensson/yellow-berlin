<?php
// Berlin extension, https://github.com/annaesvensson/yellow-berlin

class YellowBerlin {
    const VERSION = "0.9.6";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "berlin"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="berlin") {
            $this->yellow->system->save($fileName, array("theme" => $this->yellow->system->getDifferent("theme")));
        }
    }
}
