<?php
header('Content-Type: text/html');

include '../../downloads.php';

$easynodeactie = "install";

//----------------------------------------------------------------------
//----------------------------------------------------------------------

//0 = mainnet - 1 = testnet
$network_x = $_POST['network'] ?? '';
if($network_x == 0 or $network_x == 1){$network = $network_x;}
if($network == 1){$networkname = "t-";}

//0 = disabled - 1 = enabled SSH + Nito - 2 = Nito - 3 = SSH
$firewall_x = $_POST['firewall'] ?? '';
if($firewall_x == 0 or $firewall_x == 1 or $firewall_x == 2 or $firewall_x == 3){$firewall = $firewall_x;}

//prune 0 = disabled  1 tot 10 = gb
$prune_x = $_POST['prune'] ?? '';
if($prune_x == 1){$prune = 1000;}
else if($prune_x == 2){$prune = 2000;}
else if($prune_x == 3){$prune = 3000;}
else if($prune_x == 4){$prune = 4000;}
else if($prune_x == 5){$prune = 5000;}
else if($prune_x == 6){$prune = 10000;}
else if($prune_x == 7){$prune = 25000;}
else if($prune_x == 8){$prune = 50000;}
else if($prune_x == 9){$prune = 100000;}
else {$prune = 0;}

//txindex
$txindex_x = $_POST['txindex'] ?? '';
if($txindex_x == 1){$txindex = 1;}else{$txindex = 0;}

//rpc 0 = disabled - 1 = enabled
$rpc_x = $_POST['rpc'] ?? '';
if($rpc_x == 0 or $rpc_x == 1){$rpc = $rpc_x;}

//node 0 tm 9
$node_x = $_POST['node'] ?? '';
if (is_numeric($node_x) && $node_x >= 0 && $node_x <= 9) {
    $node = $node_x;
}

//tor
$tor_x = $_POST['tor'] ?? '';
if($tor_x == 1 AND $node == 0 AND $network == 0){$tor = 1;}else{$tor = 0;}

//onlynet
$onlynet_x = $_POST['onlynet'] ?? '';
if($onlynet_x == 1){$onlynet = 1;}else{$onlynet = 0;}

//1 = user - 0 = root
$run_as_x = $_POST['run_as'] ?? '';
if($run_as_x == 0 or $run_as_x == 1){$run_as = $run_as_x;}

//1 = Yes - 0 = No 
$create_user_x = $_POST['create_user'] ?? '';
if($create_user_x == 0 or $create_user_x == 1){$create_user = $create_user_x;}

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

//text
$home_folder_x = $_POST['home_folder'] ?? '';
if (preg_match('/^[a-z0-9\/]{1,50}$/', $home_folder_x)) {
    $home_folder = $home_folder_x;
}

//node_name
$node_name = "nito-$networkname$node";

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


if($network == 0)
{
    $rpc_configfile = "";
    if($rpc == 1){
        $rpc_configfile .= "rpcuser=$rpcuser\\nrpcpassword=$rpcpass\\nrpcport=$rpcport\\nrpcbind=127.0.0.1\\nrpcallowip=127.0.0.1\\nzmqpubhashblock=tcp://127.0.0.1:$zmqpubhashblock";
    }
    if($tor == 1){
        if($rpc == 1){$rpc_configfile .= "\\n";}
        $rpc_configfile .= "listen=1\\nlistenonion=1";
        //onlynet
        if($onlynet == '1'){
            $rpc_configfile .= "\\nonlynet=onion\\nlisten=0\\ndiscover=1\\nproxy=127.0.0.1:9050\\nbind=127.0.0.1\\nbind=[::1]";
        }else{
            //geen onlynet
            $rpc_configfile .= "\\nproxy=0\\nonion=127.0.0.1:9050\\nbind=0.0.0.0\\nbind=[::]";
        }
        
    }
    //mainnet
    $configfile = "maxconnections=300\\ndaemon=1\\ntxindex=$txindex\\nprune=$prune\\ndatadir=$home_folder/$node_name\\nport=$port_x\\n$rpc_configfile";
}else{
    $rpc_configfile = "";
    if($rpc == 1){
        $rpc_configfile .= "rpcuser=$rpcuser\\nrpcpassword=$rpcpass\\nrpcport=$rpcport\\nrpcbind=127.0.0.1\\nrpcallowip=127.0.0.1\\nzmqpubhashblock=tcp://127.0.0.1:$zmqpubhashblock";
    }
    //testnet
    $configfile = "maxconnections=300\\ntestnet=1\\ndaemon=1\\ntxindex=$txindex\\nlisten=1\\nprune=$prune\\ndatadir=$home_folder/$node_name\\n[test]\\nport=$port_x\\n$rpc_configfile";
}


//----------------------------------------------------------------------
//----------------------------------------------------------------------

//OS
$os = $_POST['os'] ?? '';
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



$response = "<div id=\"xxa\" class=\"form-text\">Copy and paste these commands into the Linux terminal.</div>";
// update system
$response .= $extra_row1;
$response .= $extra_row2;
$response .= $extra_row3;


// install apps
$response .= $install_apps;


// maak nieuwe user
if($run_as == 1 && $create_user == 1 && $username != ''){
    $response .= $create_new_user;
}

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
    $response .= "$home_folder/$node_name";
    $response .= "</div>";
    $response .= "</li>";

    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">PORT</div>";
    $response .= $port_x;
    $response .= "</div>";
    $response .= "</li>";

    if($rpc == 1)
    {
    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">RPC PORT</div>";
    $response .= $rpcport;
    $response .= "</div>";
    $response .= "</li>";

    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">RPC USERNAME</div>";
    $response .= $rpcuser;
    $response .= "</div>";
    $response .= "</li>";

    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">RPC PASSWORD</div>";
    $response .= $rpcpass;
    $response .= "</div>";
    $response .= "</li>";

    $response .= "<li class=\"list-group-item d-flex justify-content-between align-items-start\">";
    $response .= "<div class=\"ms-2 me-auto\">";
    $response .= "<div class=\"fw-bold\">RPC [ getblockchaininfo ]</div>";
    if($os != 0){
        $response .= "./$node_name/nito-cli -rpcport=$rpcport -rpcuser=$rpcuser -rpcpassword=$rpcpass getblockchaininfo";
    }else{
        $response .= "./nito-cli -rpcport=$rpcport -rpcuser=$rpcuser -rpcpassword=$rpcpass getblockchaininfo";
    }
    $response .= "</div>";
    $response .= "</li>";
    }

$response .= "</ol>";


/*$response .= "
<div class=\"mb-3\">
  <label for=\"exampleFormControlTextarea1\" class=\"form-label\">Example textarea</label>
  <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\"></textarea>
</div>
";*/

// Output the HTML response
echo $response;
?>
