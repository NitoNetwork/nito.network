<?php
header('Content-Type: text/html');

$easynodeactie = "remove";

include '../../downloads.php';


//----------------------------------------------------------------------
//----------------------------------------------------------------------

//0 = mainnet - 1 = testnet
$network_x = $_POST['network3'] ?? '';
if($network_x == 0 or $network_x == 1){$network = $network_x;}
if($network == 1){$networkname = "t-";}


//node 0 tm 9
$node_x = $_POST['node3'] ?? '';
if (is_numeric($node_x) && $node_x >= 0 && $node_x <= 9) {
    $node = $node_x;
}

//text
$home_folder_x = $_POST['home_folder3'] ?? '';
if (preg_match('/^[a-z0-9\/]{1,50}$/', $home_folder_x)) {
    $home_folder = $home_folder_x;
}

//node_name
$node_name = "nito-$networkname$node";
$stratum_node_name = "stratum-$networkname$node";
//----------------------------------------------------------------------
//----------------------------------------------------------------------

//OS
$os = $_POST['os3'] ?? '';
if($os == '0'){
    //debian Raspberry bookworm
    include 'raspberrybookworm.php';
}else if ($os == '1'){
    // AlmaLinux 9
    //include 'almalinux9.php';
}else if ($os == '2'){
    // Fedora40
    include 'fedora40.php';
}else if ($os == '3'){
    // Debian 11
    include 'debian11.php'; 
}else if ($os == '4'){
    // Debian 12
    include 'debian12.php'; 
}else if ($os == '5'){
    // Ubuntu 22
    include 'ubuntu22.php';
}else if ($os == '6'){
    // Ubuntu 24
    include 'ubuntu24.php';
}



//----------------------------------------------------------------------
//----------------------------------------------------------------------


//go root
$response = "<div id=\"xxa\" class=\"form-text\">Copy and paste these commands into the Linux terminal.</div>";
$response .= $row_root;


//cd home directory and make empty script and open with nano
    $response .= $cd_userdir;

// show script

    $response .= "<div id=\"xxa\" class=\"form-text\">Copy and paste this script into nano</div>";
    $response .= "<div id=\"xxb\" class=\"form-text\">Close Nano: [CTRL + X] > [Y] > [ENTER]</div>";
    $response .= $sh_script;
    

// uitvoeren script
    $response .= "<div id=\"xxa\" class=\"form-text\">Copy and paste this command into the Linux terminal.</div>";
    $response .= $run_script;



// Output the HTML response
echo $response;
?>
