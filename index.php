<?php
// Start the session to store the language preference
session_start();

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}

// taal
if (isset($_GET['l'])) {
	$getlang = $_GET['l'];
}else if(isset($_SESSION['l'])){
	$getlang = $_SESSION['l'];
}else if(isset($_SERVER["HTTP_CF_IPCOUNTRY"])){
	$getlang = strtolower($_SERVER["HTTP_CF_IPCOUNTRY"]);
}


$spanishSpeakingCountries = [
    'ar', // Argentina
    'bo', // Bolivia
    'cl', // Chile
    'co', // Colombia
    'cr', // Costa Rica
    'cu', // Cuba
    'do', // Dominican Republic
    'ec', // Ecuador
    'sv', // El Salvador
    'gq', // Equatorial Guinea
    'gt', // Guatemala
    'hn', // Honduras
    'mx', // Mexico
    'ni', // Nicaragua
    'pa', // Panama
    'py', // Paraguay
    'pe', // Peru
    'es', // Spain
    'uy', // Uruguay
    've'  // Venezuela
];

$frenchSpeakingCountries = [
    'bf', // Burkina Faso
    'bi', // Burundi
    'bj', // Benin
    'ca', // Canada
    'cf', // Central African Republic
    'cg', // Republic of the Congo
    'ch', // Switzerland
    'ci', // Ivory Coast
    'cm', // Cameroon
    'dj', // Djibouti
    'dz', // Algeria
    'fr', // France
    'ga', // Gabon
    'gn', // Guinea
    'ht', // Haiti
    'km', // Comoros
    'lu', // Luxembourg
    'ma', // Morocco
    'mc', // Monaco
    'mg', // Madagascar
    'ml', // Mali
    'mr', // Mauritania
    'ne', // Niger
    'rw', // Rwanda
    'sc', // Seychelles
    'sn', // Senegal
    'td', // Chad
    'tg', // Togo
    'tn', // Tunisia
    'vu', // Vanuatu
    'wf'  // Wallis and Futuna
];


if($getlang == 'de')
{
	$_SESSION['l'] = 'de';
	$lang = 'de';
	$lang_naam = 'DEUTSCH';
}else if(in_array($getlang, $spanishSpeakingCountries))
{
	$_SESSION['l'] = 'es';
	$lang = 'es';
	$lang_naam = 'ESPAÑOL';
}else if(in_array($getlang, $frenchSpeakingCountries))
{
	$_SESSION['l'] = 'fr';
	$lang = 'fr';
	$lang_naam = 'FRANÇAIS';
}else if($getlang == 'nl')
{
	$_SESSION['l'] = 'nl';
	$lang = 'nl';
	$lang_naam = 'NEDERLANDS';
}else if($getlang == 'ru')
{
	$_SESSION['l'] = 'ru';
	$lang = 'ru';
	$lang_naam = 'РУССКИЙ';
}else if($getlang == 'cn')
{
	$_SESSION['l'] = 'cn';
	$lang = 'cn';
	$lang_naam = '中文 (ZHŌNGWÉN)';
}else
{
	$_SESSION['l'] = 'en';
	$lang = 'en';
	$lang_naam = 'ENGLISH';
}
if($lang == 'en'){
	$lang_flag = 'us';
}else{
	$lang_flag = $lang;
}
	

function loadLanguage($lang) {
    $langFile = __DIR__ . "/languages/{$lang}.php";
    if (file_exists($langFile)) {
        return include($langFile);
    }
    return include(__DIR__ . '/languages/en.php');
}

function __($key, $langArray) {
    return $langArray[$key] ?? $key;
}

$langArray = loadLanguage($lang);

// taal

include 'downloads.php';
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Nito.Network</title>
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="icon" type="image/svg" href="assets/img/favicon.svg">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" href="assets/css/meanmenu.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.min.css">
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/style-2.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/flag-icons.min.css">

	<?php 
	//echo time() - rand(1, 999); 
	?>
	<style>
        .modal-footer-nito {
            background-color: #419afc;
			color: white;
        }
		.spacer {
    		width: 60px;
  		}
		.btn-close-white {
			background-color: #f8f9fa;
    	}
		@media (min-width: 1200px) {
            .popup-container {
                max-width: 1140px;
                margin-left: auto;
                margin-right: auto;
            }
        }
		.modal-header.modal-footer-nito {
    		background-color: #797998; 
    		color: white; 
  		}

		.containerx {
      		display: flex;
      		justify-content: space-between;
    	}
    	.divx1, .divx2 {
      		width: 45%;
    	}
    </style>
</head>

<body>
	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div>

	<div class="navbar-section">
		<div class="techvio-responsive-nav">
			<div class="container">
				<div class="techvio-responsive-menu">
					<div class="logo">
						<a href="/">
							<img src="assets/img/logo.png" class="white-logo" alt="logo">
							<img src="assets/img/logo-black.png" class="black-logo" alt="logo">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="techvio-nav">
			<div class="container">
				<nav class="navbar navbar-expand-md navbar-light">
					<a class="navbar-brand" href="/">
						<img src="assets/img/logo.png" class="white-logo" alt="logo">
						<img src="assets/img/logo-black.png" class="black-logo" alt="logo">
					</a>
					<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
						<ul class="navbar-nav">

							<li class="nav-item">
								<a href="#" class="nav-link"><?php echo __('INTRODUCTION', $langArray); ?> <i class="fas fa-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li class="nav-item">
									<a href="#ModalLong" class="nav-link" data-bs-toggle="modal" data-id="1" data-title="<?php echo __('BLOCKCHAIN', $langArray); ?>"><img src="/assets/img/menu/blockchain.png" width="20" height="20"> <?php echo __('BLOCKCHAIN', $langArray); ?></a>
									</li>
									<li class="nav-item">
									<a href="#ModalLong" class="nav-link" data-bs-toggle="modal" data-id="2" data-title="<?php echo __('BLOCKREWARD', $langArray); ?>"><img src="/assets/img/menu/blockreward.png" width="20" height="20"> <?php echo __('BLOCKREWARD', $langArray); ?></a>
									</li>
								</ul>
							</li>


							<li class="nav-item">
								<a href="#" class="nav-link"><?php echo __('RESOURCES', $langArray); ?> <i class="fas fa-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li class="nav-item">
									<a href="https://explorer.nito.network" class="nav-link"><img src="/assets/img/menu/explorer.png" width="20" height="20"> <?php echo __('EXPLORER', $langArray); ?></a>
									</li>
									<li class="nav-item">
									<a href="#ModalLong" class="nav-link" data-bs-toggle="modal" data-id="4" data-title="<?php echo __('POOLS', $langArray); ?>"><img src="/assets/img/menu/pools.png" width="20" height="20"> <?php echo __('POOLS', $langArray); ?></a>
									</li>
								</ul>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link"><?php echo __('SOCIALS', $langArray); ?> <i class="fas fa-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li class="nav-item">
										<a href="https://discord.gg/wBcfKE8nPy" class="nav-link" target="_blank"><img src="/assets/img/menu/discord.png" width="20" height="20"> DISCORD</a>
									</li>
									<li class="nav-item">
										<a href="https://t.me/Nito_Network" class="nav-link" target="_blank"><img src="/assets/img/menu/telegram.png" width="20" height="20"> TELEGRAM</a>
									</li>
									<li class="nav-item">
										<a href="https://x.com/Nito_Network" class="nav-link" target="_blank"><img src="/assets/img/menu/x.png" width="20" height="20"> X.COM</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
							<?php echo "<a href=\"#\" class=\"nav-link\"><span class=\"fi fi-$lang_flag\"></span> $lang_naam <i class=\"fas fa-chevron-down\"></i></a>"; ?>
								<ul class="dropdown-menu">
								<?php if($lang != 'cn'){ echo '<li class="nav-item"><a href="?l=cn" class="nav-link"><span class="fi fi-cn"></span> 中文 (ZHŌNGWÉN)</a></li>'; } ?>
									<?php if($lang != 'de'){ echo '<li class="nav-item"><a href="?l=de" class="nav-link"><span class="fi fi-de"></span> DEUTSCH</a></li>'; } ?>
									<?php if($lang != 'en'){ echo '<li class="nav-item"><a href="?l=en" class="nav-link"><span class="fi fi-us"></span> ENGLISH</a></li>'; } ?>
									<?php if($lang != 'es'){ echo '<li class="nav-item"><a href="?l=es" class="nav-link"><span class="fi fi-es"></span> ESPAÑOL</a></li>'; } ?>
									<?php if($lang != 'fr'){ echo '<li class="nav-item"><a href="?l=fr" class="nav-link"><span class="fi fi-fr"></span> FRANÇAIS</a></li>'; } ?>
									<?php if($lang != 'nl'){ echo '<li class="nav-item"><a href="?l=nl" class="nav-link"><span class="fi fi-nl"></span> NEDERLANDS</a></li>'; } ?>
									<?php if($lang != 'ru'){ echo '<li class="nav-item"><a href="?l=ru" class="nav-link"><span class="fi fi-ru"></span> РУССКИЙ</a></li>'; } ?>
								</ul>
							</li>
						</ul>
						
						<div class="other-option">
							<a class="default-btn" href="#Downloads"><?php echo __('DOWNLOAD', $langArray); ?><span></span></a>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<div class="home-3 home-section">
		<div id="particles-js"></div>
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-12">
							<div class="main-banner-content">
								<h1>Nito/Core Genesis 8-4</h1>
								<p><?php echo __('SLOGAN', $langArray); ?></p>
							</div>
						</div>
						
						<div class="col-lg-6 col-md-12" data-tilt>
    						<div class="banner-image" style="text-align: right;">
        						<img src="assets/img/bg_nito_x.png" alt="image" style="display: inline-block;" width="250">
    						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




  <div class="modal fade" id="ModalLong" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
      <div class="modal-content">
        <div class="modal-header modal-footer-nito">
          <h5 class="modal-title" id="ModalLongTitle">Title</h5>
		  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
			<div class="popup-container">
          		<p id="modal-content"><?php echo __('LOADING', $langArray); ?></p>
		  	</div>
        </div>
        <div class="modal-footer modal-footer-nito">
		<p style="color: white;"><i class="far fa-copyright"></i> <?PHP echo date("Y"); ?> Nito.Network - <?php echo __('COPYRIGHT', $langArray); ?></p>
        </div>
      </div>
    </div>
  </div>



	<section class="counter-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">

						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <div id="aboutnito"></div>


  <section class="about-area bg-grey section-padding">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 col-md-12">
					<div class="about-content">
						<?php echo __('WHATISNITO', $langArray); ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-image">
						<img src="assets/img/nito2.png" loading="lazy" alt="About image">
					</div>
				</div>
			</div>
		</div>
	</section>



	<section class="counter-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">
						
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 counter-item">
					<div class="single-counter">
						<div class="counter-contents">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	


	<div id="Downloads"></div>

	<section class="portfolio-area bg-grey section-padding">
        <div class="container">
		
            <div class="row">
                <div class="col-md-12">
				<h4><span><a href="https://github.com/NitoNetwork/" target="_blank">GITHUB ></a></span></h4>
                    <div class="portfolio-list">
                        <ul class="nav" id="portfolio-flters">
                            <li class="filter filter-active" data-filter=".all"><?php echo __('ALL', $langArray); ?></li>
                            <li class="filter" data-filter=".pc"><?php echo __('PC', $langArray); ?></li>
                            <li class="filter" data-filter=".mobile"><?php echo __('MOBILE', $langArray); ?></li>
                            <li class="filter" data-filter=".source"><?php echo __('SOURCE', $langArray); ?></li>
							<li class="filter" data-filter=".node" data-bs-toggle="modal" data-id="10" data-title="SETUP FULL NODE">?</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portfolio-container">
				<div class="row">
                    <div class="col-lg-4 col-md-6 portfolio-grid-item all pc node">
                        <div class="portfolio-item">
							<img src="assets/img/os/win-exe.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>WINDOWS | SETUP | x86_64</p>
								<h3><a href="<?PHP echo $win64_setup_1; ?>">Setup</a>
								| <a href="<?PHP echo $win64_zip_2; ?>">Win64.zip</a></h3>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-6 portfolio-grid-item all pc node">
                        <div class="portfolio-item">
							<img src="assets/img/os/apple-64.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>APPLE | SETUP | x86_64</p>
								<h3><a href="<?PHP echo $apple_zip_3; ?>">Darwin</a>
								| <a href="<?PHP echo $apple_tar_4; ?>">Darwin.tar.gz</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-grid-item all pc node">
                        <div class="portfolio-item">
							<img src="assets/img/os/linux-64.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>LINUX | x86_64 | ARM64</p>
								<h3><a href="<?PHP echo $linux_x86_64_5; ?>">x86_64</a> 
								| <a href="<?PHP echo $linux_aarch64_6; ?>">ARM_64</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-grid-item all mobile">
                        <div class="portfolio-item">
							<img src="assets/img/os/android_dis.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>ANDROID | APPSTORE | APK</p>
								<h3>-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-grid-item all mobile">
                        <div class="portfolio-item">
							<img src="assets/img/os/ios_dis.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>iOS | APPSTORE</p>
								<h3>-</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-grid-item all source node">
                        <div class="portfolio-item">
							<img src="assets/img/os/github.webp" alt="image">
                            <div class="portfolio-content-overlay">
								<p>GITHUB | SOURCE</p>
								<h3><a href="<?PHP echo $source_zip_11; ?>">Zip</a>
								| <a href="<?PHP echo $source_tar_gz_12; ?>">Tar.gz</a></h3>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    </section>

	
	



	<div class="copyright-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<p><i class="far fa-copyright"></i> <?PHP echo date("Y"); ?> Nito.Network - <?php echo __('COPYRIGHT', $langArray); ?></p>
				</div>
				<div class="col-lg-6 col-md-6">

				</div>
			</div>
		</div>
	</div>

	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<script>
    	const modal = document.getElementById('ModalLong');
    	modal.addEventListener('show.bs.modal', function (event) {
      		const button = event.relatedTarget; 
      		const id = button.getAttribute('data-id'); 
      		const title = button.getAttribute('data-title'); 
      		const modalContent = modal.querySelector('#modal-content');
      		const modalTitle = modal.querySelector('.modal-title');

      		modalTitle.textContent = title;

      		fetch('ajax_info.php?id=' + id)
        		.then(response => response.text())
        		.then(data => {
          			modalContent.innerHTML = data;
        		})
        		.catch(error => {
          		modalContent.innerHTML = 'An error occurred while loading the content.';
          		console.error('Error:', error);
        		});
    		});


		document.getElementById('poolselect').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('pool_list.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('pool_list').innerHTML = data;
                    scrollToDiv();
                })
                .catch(error => {
                    document.getElementById('pool_list').innerText = 'An error occurred: ' + error;
                });
        });


		function updatePoolType() {
  		var poolType = $('#pool_type').val(); 
  		$.ajax({
    			url: 'pool_list.php', 
    			type: 'POST',
    			data: { pool_type: poolType },
    		success: function(response) {
				document.getElementById('pool_list').innerHTML = response;
    			},
  			});
		}
    </script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery.meanmenu.js"></script>
	<script src="assets/js/jquery.appear.min.js"></script>
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/particles-app.js"></script>
	<script src="assets/js/swiper.min.js"></script>
	<script src="assets/js/vanilla-tilt.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/main.js"></script>
	
</body>

</html>
