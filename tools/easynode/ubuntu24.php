<?php

if($easynodeactie == 'install'){
    // install scripts

    
$extra_row1 = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"su\" readonly>
</div>";

//update system en install apps
$install_apps = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"apt update -y && apt upgrade -y && apt install";

$install_apps .= " nano curl";
if($firewall != 0){$install_apps .= " ufw";}
if($tor == 1){$install_apps .= " tor torsocks";}

$install_apps .= " -y\" readonly></div>";


//create new user
$create_new_user = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"/usr/sbin/useradd -m -s /bin/bash $username\" readonly>
</div>";

$url = $linux_x86_64_5;
$OUTPUT_FILE = basename($linux_x86_64_5);
$SERVICE_NAME= $node_name;


//cd user directory make empty script and open with nano
$cd_userdir = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"cd $home_folder && > script.sh && chmod 755 script.sh && nano script.sh\" readonly>
</div>";

$run_script = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"./script.sh\" readonly>
</div>";


//sh script
$sh_script_data = "#!/bin/bash

if [ ! -d \"$home_folder/$node_name\" ]; then
  mkdir -p \"$home_folder/$node_name\"
fi

if [ ! -d \"$home_folder/$node_name/blockstorage\" ]; then
  mkdir -p \"$home_folder/$node_name/blockstorage\"
fi

#Download

cd $home_folder/$node_name

echo \"Downloading $OUTPUT_FILE...\"
curl -L -o $OUTPUT_FILE $url

if [ $? -eq 0 ]; then
    echo \"Download successful.\"
else
    echo \"Download failed!\"
    exit 1
fi

CALCULATED_SHA256=$(sha256sum $OUTPUT_FILE | awk '{ print $1 }')

if [ \"\$CALCULATED_SHA256\" == \"$linux_x86_64_5_sha\" ]; then
    echo \"Checksum verification successful.\"
else
    echo \"Checksum verification failed! Expected $linux_x86_64_5_sha, but got \$CALCULATED_SHA256.\"
    exit 1
fi

tar -xzf $OUTPUT_FILE

if [ $? -eq 0 ]; then
    echo \"Extraction successful.\"
else
    echo \"Extraction failed!\"
    exit 1
fi

EXTRACTED_DIR=$(tar -tf $OUTPUT_FILE | head -1 | cut -f1 -d\"/\")
BIN_DIR=\"\$EXTRACTED_DIR/bin\"

if [ -f \"\$BIN_DIR/nitod\" ] && [ -f \"\$BIN_DIR/nito-cli\" ]; then
    cp \"\$BIN_DIR/nitod\" .
    cp \"\$BIN_DIR/nito-cli\" .
else
    echo \"nitod / nito-cli not found in the bin directory!\"
    exit 1
fi

echo \"Cleaning up...\"
rm -rf \"\$EXTRACTED_DIR\"
rm $OUTPUT_FILE


echo -e \"$configfile\" > $home_folder/$node_name/nito.conf

chmod +x $home_folder/$node_name/nitod
chmod +x $home_folder/$node_name/nito-cli
chown -R $username:$username $home_folder/$node_name
chmod -R 755 $home_folder/$node_name


SERVICE_FILE=\"/etc/systemd/system/$SERVICE_NAME.service\"
echo \"[Unit]
Description=$node_name daemon service
After=network-online.target
Wants=network-online.target

[Service]
User=$username
Group=$username
Type=forking
ExecStart=$home_folder/$node_name/nitod -daemon -pid=$home_folder/$node_name/blockstorage/nito.pid \
-conf=$home_folder/$node_name/nito.conf \
-datadir=$home_folder/$node_name/blockstorage

Restart=on-failure
TimeoutStartSec=infinity
TimeoutStopSec=600

[Install]
WantedBy=multi-user.target\" > \$SERVICE_FILE

systemctl daemon-reload
systemctl enable $SERVICE_NAME
systemctl start $SERVICE_NAME
";

//firewall
if($firewall == '1'){
//firewall ssh + Nito
$sh_script_data .="
ufw allow 22/tcp
ufw allow $port_x/tcp
ufw reload
yes | ufw enable
";
}else if($firewall == '2'){
//firewall Nito
$sh_script_data .="
ufw allow $port_x/tcp
ufw reload
yes | ufw enable
";
}else if($firewall == '3'){
//firewall ssh
$sh_script_data .="
ufw allow 22/tcp
ufw reload
yes | ufw enable
";
}


if($tor == 1){
$sh_script_data .="

echo \"Install tor...\"

systemctl start tor
systemctl enable tor

sed -i 's/^#\\(ControlPort 9051\)/\\1/' \"/etc/tor/torrc\"
sed -i 's/^#\\(CookieAuthentication 1\\)/\\1/' \"/etc/tor/torrc\"

grep -q '^CookieAuthFileGroupReadable 1' /etc/tor/torrc || echo 'CookieAuthFileGroupReadable 1' >> /etc/tor/torrc
sed -i 's/^#CookieAuthFileGroupReadable 1/CookieAuthFileGroupReadable 1/' /etc/tor/torrc

HIDDEN_SERVICE=\"
HiddenServiceDir /var/lib/tor/nito-service/
HiddenServicePort 8821 127.0.0.1:8821
\"

if ! grep -q \"HiddenServiceDir /var/lib/tor/nito-service/\" \"/etc/tor/torrc\"; then
  echo \"\$HIDDEN_SERVICE\" | tee -a \"/etc/tor/torrc\" > /dev/null
fi

systemctl restart tor

sleep 10

echo \"---------------------\"
echo \"Please back up the TOR directory to ensure you retain your onion address!\"
echo \"/var/lib/tor/nito-service/\"
echo \"---------------------\"
echo \"Nito Onion address:\"
echo \"$(cat /var/lib/tor/nito-service/hostname):8821\"
echo \"---------------------\"

";
}

$sh_script_data .="echo \"Installation complete...\"
";



//sh script
$sh_script = "
<div data-mdb-input-init class=\"form-outline mb-4\">
    <textarea class=\"form-control\" id=\"form6Example7\" rows=\"16\" disabled>$sh_script_data</textarea>
</div>";


//Check if service works
$check_service_running = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"systemctl status $SERVICE_NAME\" readonly>
</div>";


}


//-----------------------------------------------
// Install scripts


//UPDATE
//-----------------------------------------------


if($easynodeactie == 'update'){

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
    <input type=\"text\" class=\"form-control\" value=\"cd $home_folder && > script.sh && chmod 755 script.sh && nano script.sh\" readonly>
</div>";


$url = $linux_x86_64_5;
$OUTPUT_FILE = basename($linux_x86_64_5);
$SERVICE_NAME= $node_name;

//sh script data
$sh_script_data = "
#!/bin/bash

cd $home_folder/$node_name

rm nitod
rm nito-cli

echo \"Downloading $OUTPUT_FILE...\"
curl -L -o $OUTPUT_FILE $url

if [ $? -eq 0 ]; then
    echo \"Download successful.\"
else
    echo \"Download failed!\"
    exit 1
fi

CALCULATED_SHA256=$(sha256sum $OUTPUT_FILE | awk '{ print $1 }')

if [ \"\$CALCULATED_SHA256\" == \"$linux_x86_64_5_sha\" ]; then
    echo \"Checksum verification successful.\"
else
    echo \"Checksum verification failed! Expected $linux_x86_64_5_sha, but got \$CALCULATED_SHA256.\"
    exit 1
fi

tar -xzf $OUTPUT_FILE

if [ $? -eq 0 ]; then
    echo \"Extraction successful.\"
else
    echo \"Extraction failed!\"
    exit 1
fi

EXTRACTED_DIR=$(tar -tf $OUTPUT_FILE | head -1 | cut -f1 -d\"/\")
BIN_DIR=\"\$EXTRACTED_DIR/bin\"

if [ -f \"\$BIN_DIR/nitod\" ] && [ -f \"\$BIN_DIR/nito-cli\" ]; then
    cp \"\$BIN_DIR/nitod\" .
    cp \"\$BIN_DIR/nito-cli\" .
else
    echo \"nitod / nito-cli not found in the bin directory!\"
    exit 1
fi

echo \"Cleaning up...\"
rm -rf \"\$EXTRACTED_DIR\"
rm $OUTPUT_FILE

chmod +x $home_folder/$node_name/nitod
chmod +x $home_folder/$node_name/nito-cli

systemctl restart $node_name

echo \"Update successful...\"";

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
//UPDATE



//REMOVE
//-----------------------------------------------

if($easynodeactie == 'remove'){

//root
$row_root = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"su\" readonly>
</div>";

// cd user directory make empty script and open with nano
$cd_userdir = "
<div class=\"mb-3\">
    <input type=\"text\" class=\"form-control\" value=\"cd $home_folder && > script.sh && chmod 755 script.sh && nano script.sh\" readonly>
</div>";

//sh script data
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
systemctl stop $stratum_node_name
systemctl disable $stratum_node_name
if [ -f /etc/systemd/system/$stratum_node_name.service ]; then
    rm /etc/systemd/system/$stratum_node_name.service
fi
if [ -f /etc/systemd/system/$stratum_node_name.service ]; then
    rm /lib/systemd/system/$stratum_node_name.service
fi
systemctl daemon-reload
cd $home_folder
rm -r $node_name
if [ -d \"/var/lib/tor/nito-service/\" ]; then
systemctl stop tor
rm -rf \"/var/lib/tor/nito-service/\"
sed -i '/HiddenServiceDir \/var\/lib\/tor\/nito-service\//d' \"/etc/tor/torrc\"
sed -i '/HiddenServicePort 8821 127.0.0.1:8821/d' \"/etc/tor/torrc\"
systemctl start tor
echo \"Hidden service removed successfully.\"
fi
echo \"Removed successfully.\"";

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
//REMOVE

?>