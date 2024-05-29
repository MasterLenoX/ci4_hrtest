
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title><?= isset($pageTitle) ? $pageTitle : 'Login Page | FFI HRIS' ?></title>

		<!-- Site favicon -->
		<!-- <link
			rel="fisherfarms"
			sizes="180x180"
			href="/images/fisherfarms_logo_icon.png"
		/> -->
		<!-- <link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/images/<?php //get_settings()->blog_favicon ?>"
		/> -->

		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/images/fisherfarms_logo_icon-grad.png"
		/>


		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/backend/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/backend/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/backend/vendors/styles/style.css" />
    
    <?= $this->renderSection('stylesheets') ?>

	</head>
	<body class="login-page">
		<!-- <div class="login-header box-shadow">
			<div
				class="container-fluid d-flex justify-content-between align-items-center"
			>
				<div class="brand-logo">
					<a href="login.html">
						<img src="/images/ffihris-logo-black.png" alt="" />
					</a>
				</div>
				<div class="login-menu">

				</div>
			</div>
		</div> -->
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7">
						<img src="/backend/vendors/images/login-page-img.png" alt="" />
					</div>
					<div class="col-md-6 col-lg-5">
            <?= $this->renderSection('content') ?>
					</div>
				</div>
			</div>
		</div>

		<!-- welcome modal end -->
		<!-- js -->
		<script src="/backend/vendors/scripts/core.js"></script>
		<script src="/backend/vendors/scripts/script.min.js"></script>
		<script src="/backend/vendors/scripts/process.js"></script>
		<script src="/backend/vendors/scripts/layout-settings.js"></script>

    <?= $this->renderSection('scripts') ?>
	</body>
</html>
