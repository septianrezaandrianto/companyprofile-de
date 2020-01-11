<?php 
// Site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<!-- Icon -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/upload/images/thumbs/'.$site_info->icon) ?>">

	<!-- Description -->
	<meta name="description" content="<?php echo $deskripsi ?>">
	<!-- keyword -->
	<meta name="keyword" content="<?php echo $title.', '.$keywords ?>">
	<!-- author -->
	<meta name="author" content="<?php echo $title ?>">

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/font-awesome/css/all.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css">

	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/style.css">

</head>
<body>