
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title><?= isset($pageTitle) ? $pageTitle : 'HRIS || New Page'; ?></title>

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

		<!-- toastr css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<link rel="stylesheet" href="/extra-assets/ijabo/ijaboCropTool/ijaboCropTool.min.css">
		<link rel="stylesheet" type="text/css" href="/backend/vendors/styles/style.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
		<?= $this->renderSection('stylesheets') ?>
		<style>
			.swal-popup{
				font-size: .87em;
			}
		</style>
	</head>
	<body>
    <?php include('inc/header.php') ?>
    <?php include('inc/right-sidebar.php') ?>
    <?php include('inc/left-sidebar.php') ?>
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
          <div>
            <?= $this->renderSection('content') ?>
          </div>
        </div>	
        <?php include('inc/footer.php') ?>
			</div>
		</div>

    <!-- js -->
		<script src="/backend/vendors/scripts/core.js"></script>
		<script src="/backend/vendors/scripts/script.min.js"></script>
		<script src="/backend/vendors/scripts/process.js"></script>
		<script src="/backend/vendors/scripts/layout-settings.js"></script>
		<script src="/extra-assets/ijabo/ijaboCropTool/ijaboCropTool.min.js"></script>
		<!-- toastr js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<!-- ijaboCropTool -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    
    <!-- Your script that uses swal -->
		
    <?= $this->renderSection('scripts') ?>
	</body>
</html>
