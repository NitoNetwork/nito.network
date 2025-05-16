<?php
// Redirects to a new page
header("Location: https://Nito.Network/tools/easynode");
exit();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nito DEV">
    <meta name="author" content="Nito.Network">
    <link rel="icon" type="image/svg" href="../assets/img/favicon.svg">
    <title>Nito DEV</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
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

    <link href="css/sidebars.css" rel="stylesheet">
    <script src="js/easynode.js" defer></script>
</head>


<body>

<?php 
$menu_select = 'network';
include 'menu.php';
?>

    <div class="container-wrapper">
        <div class="container">
            






        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

    $('.accordion-button').on('click', function() {
        $('#response').empty();
    });
    $(document).ready(function() {
        const $rpcSelect = $('#rpc');
        const $rpcUsername = $('#rpcusername');
        const $rpcPassword = $('#rpcpassword');
        const $runAs = $('#run_as');
        const $homeFolder = $('#home_folder');
        const $username = $('#username');
        const $createUser = $('#create_user');

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

        $('#node').change(function() {
            var nodeValue = $(this).val();
            var networkValue = $('#network').val();
            if (nodeValue != "0" || networkValue != "0") {
                $('#tor').prop('disabled', true);
                $('#onlynet').prop('disabled', true);
                $('#hiddenservice').prop('disabled', true);
            } else {
                $('#tor').prop('disabled', false);
                $('#onlynet').prop('disabled', false);
                $('#hiddenservice').prop('disabled', false);
            }
        });

        $('#tor').change(function() {
            var torValue = $(this).val();
            if (torValue != "1") {
                $('#onlynet').prop('disabled', true);
                $('#hiddenservice').prop('disabled', true);
            } else {
                $('#onlynet').prop('disabled', false);
                $('#hiddenservice').prop('disabled', false);
            }
        });

        $('#network').change(function() {
            var nodeValue = $('#node').val();
            var networkValue = $(this).val();
            if (networkValue != "0" || nodeValue != "0") {
                $('#tor').prop('disabled', true);
                $('#onlynet').prop('disabled', true);
                $('#hiddenservice').prop('disabled', true);
            } else {
                $('#tor').prop('disabled', false);
                $('#onlynet').prop('disabled', false);
                $('#hiddenservice').prop('disabled', false);
            }
        });

        $rpcSelect.on('change', toggleRpcFields);
        $runAs.on('change', updateHomeFolder);
        $username.on('input', updateHomeFolder);
    });


    function scrollToDiv() {
      document.getElementById("tothisbar").scrollIntoView({ behavior: 'smooth' });
    }

    document.getElementById('configForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('easynode/process.php', {
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

    document.getElementById('configForm2').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('easynode/upgrade.php', {
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

    document.getElementById('configForm3').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('easynode/remove.php', {
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
