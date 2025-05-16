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
    $menu_select = 'nitopool';
    include '../menu.php';
    ?>

    <div class="container-wrapper">
        <div class="container">


            <div class="accordion accordion-flush" id="accordionFlushMenu">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b>INSTALL [ STRATUM ]</b>
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
                                    <select id="select_type" name="select_type" class="form-select" disabled>
                                        <option value="1" selected>SOLO</option>
                                        <option value="2">POOL</option>
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
                                                <option value="1" selected>Yes *</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="node" class="form-label">EasyNode</label>
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
                                            <label for="iphost" class="form-label">External IP/Host Address</label>
                                            <input type="text" class="form-control" id="iphost" value="127.0.0.1"
                                                name="iphost">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="stratumport" class="form-label">Port</label>
                                            <input type="number" class="form-control" id="stratumport" value="28333"
                                                name="stratumport" min="1000" max="40000">
                                        </div>


                                        <div class="col-md-4">
                                            <label for="run_as" class="form-label">Run as</label>
                                            <select id="run_as" class="form-select" name="run_as">
                                                <option value="1" selected>User *</option>
                                                <option value="0">Root</option>
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
                                            <label for="rpcusername" class="form-label">RPC Username</label>
                                            <input type="text" class="form-control" id="rpcusername" value="user"
                                                name="rpcusername">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rpcpassword" class="form-label">RPC Password</label>
                                            <input type="text" class="form-control" id="rpcpassword" value="pass"
                                                name="rpcpassword">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nitoaddress" class="form-label" disabled>Nito Address</label>
                                            <input type="text" class="form-control" id="nitoaddress" value="-" name="nitoaddress" disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="mindiff" class="form-label">mindiff</label>
                                            <input type="number" class="form-control" id="mindiff" value="1"
                                                name="mindiff">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="startdiff" class="form-label">startdiff</label>
                                            <input type="number" class="form-control" id="startdiff" value="2048"
                                                name="startdiff">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="maxdiff" class="form-label">maxdiff</label>
                                            <input type="number" class="form-control" id="maxdiff" value="0"
                                                name="maxdiff">
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
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            <b>REMOVE [ STRATUM ]</b>
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
            const $network = $('#network');
            const $network3 = $('#network3');
            const $rpcUsername = $('#rpcusername');
            const $rpcPassword = $('#rpcpassword');
            const $runAs = $('#run_as');
            const $node = $('#node');
            const $homeFolder = $('#home_folder');
            const $runAs3 = $('#run_as3');
            const $node3 = $('#node3');
            const $homeFolder3 = $('#home_folder3');
            const $username = $('#username');
            const $stratumport = $('stratumport');


            function updateHomeFolder() {
                if ($runAs.val() === '0') {
                    $homeFolder.val('/root/nito-' + $node.val());
                    if ($network.val() === '1') {
                        $homeFolder.val('/root/nito-t-' + $node.val());
                    }else{
                        $homeFolder.val('/root/nito-' + $node.val());
                    }
                    $username.prop('disabled', true);
                } else {
                    if ($network.val() === '1') {
                        $homeFolder.val('/home/' + $username.val() + '/nito-t-' + $node.val());
                    }else{
                        $homeFolder.val('/home/' + $username.val() + '/nito-' + $node.val());
                    }
                    $username.prop('disabled', false);
                }
                if ($network.val() === '1') {
                    $('#stratumport').val(29333 + parseInt($node.val()));
                }else{
                    $('#stratumport').val(28333 + parseInt($node.val()));
                }
            }



            updateHomeFolder();

            $runAs.on('change', updateHomeFolder);
            $username.on('input', updateHomeFolder);
            $node.on('input', updateHomeFolder);
            $network.on('input', updateHomeFolder);

        });
 

        function scrollToDiv() {
            document.getElementById("tothisbar").scrollIntoView({ behavior: 'smooth' });
        }

        document.getElementById('configForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('pool-process.php', {
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

            fetch('pool-remove.php', {
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
