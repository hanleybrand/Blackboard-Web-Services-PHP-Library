<?php
    /**
     * Save this file as auth_local.php after you put in your server info.
     */
    function get_bb() {
        // your bb server base url
        $server = "https://your.bbserver.tld/";
        $blackboard = new BbPhp($server);
        // this is proxy info which you can get from the
        //     System Admin > Building Blocks > Proxy Tools > Edit Proxy Tool
        // page, once the proxy tool has been created
        $results = $blackboard->Context("loginTool", array("password"=> "shared_password_from_page",
                                                           "clientVendorId"=> "listed as Vendor",
                                                           "clientProgramId"=> "listed as Program",
                                                           "loginExtraInfo"=> "",
                                                           "expectedLifeSeconds" => 5000));
        if ($results) {
            return $blackboard;
        }
        else {
            echo "<h4>Outcome of attempted Login Tool method.";
            echo "<pre>" . print_r($results, true) . "</pre>";
            return $results;
        }
    }