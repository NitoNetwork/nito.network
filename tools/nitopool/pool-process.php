<?php
header('Content-Type: text/html');


$poolactie = "install";

//----------------------------------------------------------------------
//----------------------------------------------------------------------

//0 = mainnet - 1 = testnet
$network_x = $_POST['network'] ?? '';
if($network_x == 0 or $network_x == 1){$network = $network_x;}
if($network == 1){$networkname = "t-";}

//0 = disabled - 1 = enabled SSH + Nito - 2 = Nito - 3 = SSH
$firewall_x = $_POST['firewall'] ?? '';
if($firewall_x == 0 or $firewall_x == 1){$firewall = $firewall_x;}



//node 0 tm 9
$node_x = $_POST['node'] ?? '';
if (is_numeric(value: $node_x) && $node_x >= 0 && $node_x <= 9) {
    $node = $node_x;
}

//iphost
$iphost_x = $_POST['iphost'] ?? '';
if (filter_var(value: $iphost_x, filter: FILTER_VALIDATE_IP)) {
    $iphost = $iphost_x;
} elseif (preg_match(pattern: '/^([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/', subject: $iphost_x)) {
    $iphost = $iphost_x;
}

//stratumport
$stratumport_x = $_POST['stratumport'] ?? '';
if (is_numeric(value: $stratumport_x) && $stratumport_x >= 1 && $stratumport_x <= 65000) {
    $stratumport = $stratumport_x;
}

//mindiff
$mindiff_x = $_POST['mindiff'] ?? '';
if (is_numeric(value: $mindiff_x) && $mindiff_x >= 0 && $mindiff_x <= 9999999999999999) {
    $mindiff = $mindiff_x;
}

//startdiff
$startdiff_x = $_POST['startdiff'] ?? '';
if (is_numeric(value: $startdiff_x) && $startdiff_x >= 0 && $startdiff_x <= 9999999999999999) {
    $startdiff = $startdiff_x;
}

//maxdiff
$maxdiff_x = $_POST['maxdiff'] ?? '';
if (is_numeric(value: $maxdiff_x) && $maxdiff_x >= 0 && $maxdiff_x <= 9999999999999999) {
    $maxdiff = $maxdiff_x;
}


//1 = user - 0 = root
$run_as_x = $_POST['run_as'] ?? '';
if($run_as_x == 0 or $run_as_x == 1){$run_as = $run_as_x;}


//username linux
$username_x = $_POST['username'] ?? '';
if (preg_match('/^[a-z]{1,12}$/', $username_x)) {
    $username = $username_x;
}
if($run_as == 0){$username = "root";}


//rpc user
$rpcusername_x = $_POST['rpcusername'] ?? '';
if (preg_match('/^[a-z0-9]{1,30}$/', $rpcusername_x)) {
    $rpcuser = $rpcusername_x;
}else{
    $rpcuser = "user";
}


//rpc pass
$rpcpassword_x = $_POST['rpcpassword'] ?? '';
if (preg_match('/^[a-z0-9]{1,30}$/', $rpcpassword_x)) {
    $rpcpass = $rpcpassword_x;
}else{
    $rpcpass = "pass";
}

//Nito address
$nitoaddress_x = $_POST['nitoaddress'] ?? '';
if (preg_match(pattern: '/^[a-z0-9]{1,65}$/', subject: $nitoaddress_x)) {
    $nitoaddress = $nitoaddress_x;
}else{
    $nitoaddress = "";
}


//text
$home_folder_x = $_POST['home_folder'] ?? '';
if (preg_match('/^[a-z0-9\/-]{1,50}$/', $home_folder_x)) {
    $home_folder = $home_folder_x;
}

//node_name
$node_name = "stratum-$networkname$node";
$SERVICE_NAME= $node_name;

if($network == 0){
    //mainnet
    //geen ruimte voor meer mainnet nodes op port 8840. Dus vanaf node 1 start port bij 18820
    if($node == 0){$port_x = 8820;}else{$port_x = 18820 + $node;}
    $rpcport = 8825 + $node;
    $zmqpubhashblock = 28825 + $node;
}else{
    //testnet
    //geen ruimte voor meer testnet nodes op port 8841. Dus vanaf node 1 start port bij 18840
    if($node == 0){$port_x = 8840;}else{$port_x = 18840 + $node;}
    $rpcport = 8845 + $node;
    $zmqpubhashblock = 28925 + $node;
}





//----------------------------------------------------------------------
//----------------------------------------------------------------------

//OS
$os = $_POST['os'] ?? '';
if($os == '0'){
    //debian Raspberry bookworm
    include 'pool-raspberrybookworm.php';
}else if ($os == '1'){
    // AlmaLinux 9
    //include 'pool-almalinux9.php';
}else if ($os == '2'){
    // Fedora40
    include 'pool-fedora40.php';
}else if ($os == '3'){
    // Debian 11
    include 'pool-debian11.php'; 
}else if ($os == '4'){
    // Debian 12
    include 'pool-debian12.php'; 
}else if ($os == '5'){
    // Ubuntu 22
    include 'pool-ubuntu22.php';
}else if ($os == '6'){
    // Ubuntu 24
    include 'pool-ubuntu24.php';
}



//----------------------------------------------------------------------
//----------------------------------------------------------------------



$response = "<div id=\"xxa\" class=\"form-text\">Copy and paste these commands into the Linux terminal.</div>";
// update system
$response .= $extra_row1;
$response .= $extra_row2;
$response .= $extra_row3;

// root

$response .= $row_root;


// install apps
$response .= $install_apps;


//cd home directory and make empty script and open with nano
    $response .= $cd_userdir;

// show script

    $response .= "<div id=\"xxa\" class=\"form-text\">Copy and paste this script into nano</div>";
    $response .= "<div id=\"xxb\" class=\"form-text\">Close Nano: [CTRL + X] > [Y] > [ENTER]</div>";
    $response .= $sh_script;
    

// uitvoeren script
    $response .= "<div id=\"xxa\" class=\"form-text\">Copy and paste this command into the Linux terminal.</div>";
    $response .= $run_script;

// check service

    $response .= "<div id=\"xxc\" class=\"form-text\">Use this command to verify the service status.</div>";
    $response .= $check_service_running;


    $response .= "<div id=\"xxc\" class=\"form-text\">Node: $node_name</div>";
    $response .= "<ol class=\"list-group list-group-numbered\">";
    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">DIRECTORY</div>";
    $response .= "$home_folder/stratum";
    $response .= "</div>";
    $response .= "</li>";

    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">PORT</div>";
    $response .= $stratumport;
    $response .= "</div>";
    $response .= "</li>";



$response .= "</ol>";


// Output the HTML response
echo $response;
?>
