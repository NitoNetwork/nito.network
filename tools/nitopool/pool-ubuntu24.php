<?php

// Install scripts
//-----------------------------------------------

if($poolactie == 'install'){

//root
$row_root = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"su\" readonly>
</div>";


//update system en install apps
$install_apps = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"sudo apt-get update && sudo apt-get install autoconf automake libtool pkg-config python3 python3-pip build-essential libssl-dev git yasm libzmq3-dev libpq-dev libgsl-dev git nano";
if($firewall == 1){$install_apps .= " ufw";}
$install_apps .= " -y\" readonly></div>";



// cd user directory make empty script and open with nano
$cd_userdir = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"cd $home_folder && > script.sh && chmod 755 script.sh && nano script.sh\" readonly>
</div>";

//$iphost
//$stratumport
//$mindiff
//$startdiff
//$maxdiff
//$nitoaddress


//sh script data
$sh_script_data = "
#!/bin/bash

cd $home_folder

git clone https://github.com/NitoNetwork/STRATUM-Pool.git stratum && cd stratum

chmod +x autogen.sh && ./autogen.sh && ./configure && make

";

//sh script data Firewall
if($firewall == '1'){
    $sh_script_data .= "ufw allow $stratumport/tcp && ufw reload
    ";
}

$sh_script_data .= "
json_file=\"nitopool.conf\"
cat <<EOF > \$json_file
{
  \"nitod\": [
    {
      \"url\": \"127.0.0.1:$rpcport\",
      \"auth\": \"$rpcuser\",
      \"pass\": \"$rpcpass\",
      \"notify\": true
    }
  ],
  \"nitosig\": \"/Team Nito/\",
  \"blockpoll\": 100,
  \"nonce1length\": 4,
  \"nonce2length\": 8,
  \"update_interval\": 30,
  \"serverurl\": [
    \"$iphost:$stratumport\"
  ],
  \"mindiff\": $mindiff,
  \"startdiff\": $startdiff,
  \"maxdiff\": $maxdiff,
  \"zmqblock\": \"tcp://127.0.0.1:$zmqpubhashblock\",
  \"logdir\": \"logs\"
}
EOF

echo \"Nitopool.conf created successfully.\"

echo '#!/bin/bash
cd \"$home_folder/stratum/\" || exit 1
./src/nitopool -B -c nitopool.conf &
n_stratum_pid_$node=$!
wait \$n_stratum_pid_$node' > $home_folder/stratum/start.sh

echo \"Start.sh created successfully.\"

chmod +x $home_folder/stratum/src/nitopool
chmod +x $home_folder/stratum/start.sh
chown -R $username:$username $home_folder
";


//ExecStart=$home_folder/stratum/src/nitopool -B -c $home_folder/stratum/nitopool.conf
$sh_script_data .= "
SERVICE_FILE=\"/etc/systemd/system/$SERVICE_NAME.service\"
echo \"[Unit]
Description=$node_name daemon service
After=network-online.target
Wants=network-online.target

[Service]
User=$username
Group=$username
ExecStart=$home_folder/stratum/start.sh
PIDFile=$home_folder/stratum/stratum_$node.pid

Restart=on-failure
TimeoutStartSec=infinity
TimeoutStopSec=600

[Install]
WantedBy=multi-user.target\" > \$SERVICE_FILE

systemctl daemon-reload
systemctl enable $SERVICE_NAME
systemctl start $SERVICE_NAME";

//sh script data
$sh_script_data .= "";

//sh script
$sh_script = "
<div data-mdb-input-init class=\"form-outline mb-4\">
    <textarea class=\"form-control\" id=\"form6\" rows=\"16\" disabled>$sh_script_data</textarea>
</div>";

$SERVICE_NAME= $node_name;

//Check if service works
$check_service_running = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"systemctl status $SERVICE_NAME\" readonly>
</div>";


// run script
$run_script = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"./script.sh\" readonly>
</div>";

}

//-----------------------------------------------
// Install scripts



//Remove
//-----------------------------------------------


if($poolactie == 'remove'){

    //root
    $row_root = "
    <div class=\"mb-3\">
        <input type=\"text\" class=\"form-control\" value=\"su\" readonly>
    </div>";
    
    
    //System Update
    $system_update = "
    <div class=\"mb-3\">
        <input type=\"text\" class=\"form-control\" value=\"apt update && apt upgrade -y\" readonly>
    </div>";
    
    
    // cd user directory make empty script and open with nano
    $cd_userdir = "
    <div class=\"mb-3\">
        <input type=\"text\" class=\"form-control\" value=\"cd $home_folder/$folder_name && > script.sh && chmod 755 script.sh && nano script.sh\" readonly>
    </div>";
    
    
    
$sh_script_data = "
#!/bin/bash
systemctl stop $node_name
systemctl disable $node_name
if [ -f /etc/systemd/system/$node_name.service ]; then
    rm /etc/systemd/system/$node_name.service
fi
if [ -f /etc/systemd/system/$node_name.service ]; then
    rm /lib/systemd/system/$node_name.service
fi
systemctl daemon-reload
cd $home_folder/$folder_name
rm -r stratum
echo \"Stratum removed successfully.\"";
    
    //sh script
    $sh_script = "
    <div data-mdb-input-init class=\"form-outline mb-4\">
        <textarea class=\"form-control\" id=\"form6\" rows=\"16\" disabled>$sh_script_data</textarea>
    </div>";
    
    
    // run script
    $run_script = "
    <div class=\"mb-3\">
        <input type=\"text\" class=\"form-control\" value=\"./script.sh\" readonly>
    </div>";
    
}
    
    //-----------------------------------------------
    //Remove



?>