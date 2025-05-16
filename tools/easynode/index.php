<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nito DEV">
    <meta name="author" content="Nito.Network">
    <link rel="icon" type="image/svg" href="../../assets/img/favicon.svg">
    <title>Nito DEV</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body,
        html {
            height: 100%;
            margin: 0;
        }

        main {
            display: flex;
            height: 100%;
        }

        nav {
            overflow-y: auto;
            flex-shrink: 0;
            width: 380px;
            background: #f8f9fa;
        }

        .container-wrapper {
            flex-grow: 1;
            overflow-y: auto;
            padding: 1rem;
            background: #fff;
        }

        .container {
            max-width: 100%;
        }
    </style>

    <link href="../css/sidebars.css" rel="stylesheet">
    <script src="../js/easynode.js" defer></script>
</head>


<body>

    <?php
    $menu_dirup = 'yes';
    $menu_select = 'easynode';
    include '../menu.php';
    ?>

    <div class="container-wrapper">
        <div class="container">


            <div class="accordion accordion-flush" id="accordionFlushMenu">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b>INSTALL [ NODE ]</b>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushMenu">
                        <div class="accordion-body">



                            <div class="card">
                                
                            <div class="card-header" style="display: flex; justify-content: space-between;">
                                <div class="col-md-4">
                                    <select id="pow" class="form-select" name="pow">
                                        <option value="0" selected>NITO CORE</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select id="select_type" name="select_type" class="form-select">
                                        <option value="0" selected>CUSTOM</option>
                                        <option value="1">STRATUM | NITOPOOL</option>
                                        <option value="2">BLOCK EXPLORER</option>
                                    </select>
                                </div>
                                </div>
                                

                                <div class="card-body">
                                    <form class="row g-3" id="configForm">
                                        <div class="col-md-4">
                                            <label for="os" class="form-label">Operating System</label>
                                            <select id="os" class="form-select" name="os">
                                                <option value="0" selected>Raspberry Pi [ Bookworm ] *</option>
                                                <option value="2">Fedora 40</option>
                                                <option value="3">Debian 11</option>
                                                <option value="4">Debian 12</option>
                                                <option value="5">Ubuntu 22</option>
                                                <option value="6">Ubuntu 24</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="network" class="form-label">Network</label>
                                            <select id="network" class="form-select" name="network">
                                                <option value="0" selected>Mainnet *</option>
                                                <option value="1">Testnet</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="firewall" class="form-label">UFW Firewall</label>
                                            <select id="firewall" class="form-select" name="firewall">
                                                <option value="1" selected>Enabled [ SSH22+NITO ] *</option>
                                                <option value="2">Enabled [ NITO ]</option>
                                                <option value="3">Enabled [ SSH ] ( OnlyNet )</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="node" class="form-label">Node</label>
                                            <select id="node" class="form-select" name="node">
                                                <option value="0" selected>0 *</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tor" class="form-label">Tor</label>
                                            <select id="tor" class="form-select" name="tor">
                                                <option value="1" selected>Enabled *</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="run_as" class="form-label">Run as</label>
                                            <select id="run_as" class="form-select" name="run_as">
                                                <option value="1" selected>User *</option>
                                                <option value="0">Root</option>
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="create_user" class="form-label">Create Linux User</label>
                                            <select id="create_user" class="form-select" name="create_user">
                                                <option value="1" selected>Yes *</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="username" class="form-label">Linux Username</label>
                                            <input type="text" class="form-control" id="username" value="node"
                                                pattern="[A-Za-z]+" name="username">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="home_folder" class="form-label">Home Folder</label>
                                            <input type="text" class="form-control" id="home_folder" value="/home/nito"
                                                name="home_folder">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="onlynet" class="form-label">Tor OnlyNet</label>
                                            <select id="onlynet" class="form-select" name="onlynet">
                                                <option value="0" selected>Disabled *</option>
                                                <option value="1">Enabled</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="prune" class="form-label">Prune</label>
                                            <select id="prune" class="form-select" name="prune">
                                                <option value="0" selected>No *</option>
                                                <option value="1">1 GB</option>
                                                <option value="2">2 GB</option>
                                                <option value="3">3 GB</option>
                                                <option value="4">4 GB</option>
                                                <option value="5">5 GB</option>
                                                <option value="6">10 GB</option>
                                                <option value="7">25 GB</option>
                                                <option value="8">50 GB</option>
                                                <option value="9">100 GB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="txindex" class="form-label">TXindex</label>
                                            <select id="txindex" class="form-select" name="txindex">
                                                <option value="0" selected>No *</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>



                                        <div class="col-md-4">
                                            <label for="rpc" class="form-label">RPC Server</label>
                                            <select id="rpc" class="form-select" name="rpc">
                                                <option value="0" selected>Disabled *</option>
                                                <option value="1">Enabled</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rpcusername" class="form-label">RPC Username</label>
                                            <input type="text" class="form-control" id="rpcusername" value="user"
                                                name="rpcusername">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rpcpassword" class="form-label">RPC Password</label>
                                            <input type="text" class="form-control" id="rpcpassword" value="pass"
                                                name="rpcpassword">
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">MAKE INSTALLATION</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <b>UPDATE [ NODE ]</b>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushMenu">
                        <div class="accordion-body">



                            <div class="card">
                                <div class="card-header">
                                    SETTINGS
                                </div>

                                <div class="card-body">
                                    <form class="row g-3" id="configForm2">
                                        <div class="col-md-4">
                                            <label for="os2" class="form-label">Operating System</label>
                                            <select id="os2" class="form-select" name="os2">
                                                <option value="0" selected>Raspberry Pi [ Bookworm ] *</option>
                                                <option value="2">Fedora 40</option>
                                                <option value="3">Debian 11</option>
                                                <option value="4">Debian 12</option>
                                                <option value="5">Ubuntu 22</option>
                                                <option value="6">Ubuntu 24</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="network2" class="form-label">Network</label>
                                            <select id="network2" class="form-select" name="network2">
                                                <option value="0" selected>Mainnet *</option>
                                                <option value="1">Testnet</option>
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="node2" class="form-label">Node</label>
                                            <select id="node2" class="form-select" name="node2">
                                                <option value="0" selected>0 *</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>


                                        <div class="col-md-8">
                                            <label for="home_folder2" class="form-label">Home Folder</label>
                                            <input type="text" class="form-control" id="home_folder2" value="/home/node"
                                                name="home_folder2">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="systemupdate2" class="form-label">System Update</label>
                                            <select id="systemupdate2" class="form-select" name="systemupdate2">
                                                <option value="11" selected>Yes *</option>
                                                <option value="10">No</option>
                                            </select>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">MAKE SCRIPT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>REMOVE [ NODE ]</b>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushMenu">
                        <div class="accordion-body">



                            <div class="card">
                                <div class="card-header">
                                    SETTINGS
                                </div>

                                <div class="card-body">
                                    <form class="row g-3" id="configForm3">
                                        <div class="col-md-4">
                                            <label for="os3" class="form-label">Operating System</label>
                                            <select id="os3" class="form-select" name="os3">
                                                <option value="0" selected>Raspberry Pi [ Bookworm ] *</option>
                                                <option value="2">Fedora 40</option>
                                                <option value="3">Debian 11</option>
                                                <option value="4">Debian 12</option>
                                                <option value="5">Ubuntu 22</option>
                                                <option value="6">Ubuntu 24</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="network3" class="form-label">Network</label>
                                            <select id="network3" class="form-select" name="network3">
                                                <option value="0" selected>Mainnet *</option>
                                                <option value="1">Testnet</option>
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="node3" class="form-label">Node</label>
                                            <select id="node3" class="form-select" name="node3">
                                                <option value="0" selected>0 *</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>


                                        <div class="col-md-12">
                                            <label for="home_folder3" class="form-label">Home Folder</label>
                                            <input type="text" class="form-control" id="home_folder3" value="/home/node"
                                                name="home_folder3">
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">MAKE SCRIPT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>

            <div id="tothisbar" class="p-3 mb-2 bg-primary text-white"></div>

            <div class="card">

                <div class="card-header">
                    LINUX TERMINAL COMMANDS
                </div>

                <div class="card-body">
                    <div id="response" class="mt-3"></div>
                </div>

            </div>



        </div>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebars.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $('.accordion-button').on('click', function () {
            $('#response').empty();
        });
        $(document).ready(function () {
            const $rpcSelect = $('#rpc');
            const $rpcUsername = $('#rpcusername');
            const $rpcPassword = $('#rpcpassword');
            const $runAs = $('#run_as');
            const $homeFolder = $('#home_folder');
            const $username = $('#username');
            const $createUser = $('#create_user');
            const $selecttype = $('#select_type');


    // Custom box
    function resetToDefault() {
        $('#os').val("0");
        $('#network').val("0");
        $('#firewall').val("1");
        $('#node').val("0");
        $('#tor').val("1");
        $('#run_as').val("1");
        $('#create_user').val("1");
        $('#username').val("node");
        $('#onlynet').val("0");
        $('#prune').val("0");
        $('#txindex').val("0");
        $('#rpc').val("0");
        $('#rpcusername').val("user");
        $('#rpcpassword').val("pass");
        $('#tor').prop('disabled', false);
        $('#onlynet').prop('disabled', false);
    }

    

    function setTxindexAndRpc() {
        $('#txindex').val("1");
        $('#rpc').val("1");
    }



    $('#select_type').change(function() {
        resetToDefault();
        if ($selecttype.val() === '1' || $selecttype.val() === '2') {
            
            setTxindexAndRpc();
        }
        toggleRpcFields();
    });

    $('#prune, #txindex, #rpc, #onlynet').change(function() {
        $('#select_type').val("0");
    });



    // Custom box



            function toggleRpcFields() {
                if ($rpcSelect.val() === '0') {
                    $rpcUsername.prop('disabled', true);
                    $rpcPassword.prop('disabled', true);
                } else {
                    $rpcUsername.prop('disabled', false);
                    $rpcPassword.prop('disabled', false);
                }
            }

            function updateHomeFolder() {
                if ($runAs.val() === '0') {
                    $homeFolder.val('/root');
                    $username.prop('disabled', true);
                    $createUser.prop('disabled', true);
                } else {
                    $homeFolder.val('/home/' + $username.val());
                    $username.prop('disabled', false);
                    $createUser.prop('disabled', false);
                }
            }

            toggleRpcFields();
            updateHomeFolder();

            $('#node').change(function () {
                var nodeValue = $(this).val();
                var networkValue = $('#network').val();
                if (nodeValue != "0" || networkValue != "0") {
                    $('#tor').prop('disabled', true);
                    $('#onlynet').prop('disabled', true);
                } else {
                    $('#tor').prop('disabled', false);
                    $('#onlynet').prop('disabled', false);
                }
            });

            $('#tor').change(function () {
                var torValue = $(this).val();
                if (torValue != "1") {
                    $('#onlynet').prop('disabled', true);
                } else {
                    $('#onlynet').prop('disabled', false);
                }
            });

            $('#network').change(function () {
                var nodeValue = $('#node').val();
                var networkValue = $(this).val();
                if (networkValue != "0" || nodeValue != "0") {
                    $('#tor').prop('disabled', true);
                    $('#onlynet').prop('disabled', true);
                } else {
                    $('#tor').prop('disabled', false);
                    $('#onlynet').prop('disabled', false);
                }
            });

            $rpcSelect.on('change', toggleRpcFields);
            $runAs.on('change', updateHomeFolder);
            $username.on('input', updateHomeFolder);
        });


        function scrollToDiv() {
            document.getElementById("tothisbar").scrollIntoView({ behavior: 'smooth' });
        }

        document.getElementById('configForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('process.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('response').innerHTML = data;
                    scrollToDiv();
                })
                .catch(error => {
                    document.getElementById('response').innerText = 'An error occurred: ' + error;
                });
        });

        document.getElementById('configForm2').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('upgrade.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('response').innerHTML = data;
                    scrollToDiv();
                })
                .catch(error => {
                    document.getElementById('response').innerText = 'An error occurred: ' + error;
                });
        });

        document.getElementById('configForm3').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('remove.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('response').innerHTML = data;
                    scrollToDiv();
                })
                .catch(error => {
                    document.getElementById('response').innerText = 'An error occurred: ' + error;
                });
        });
    </script>
</body>

</html>
