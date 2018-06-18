<html>
<head>
    <title>CodeIgniter </title>
    <link rel="stylesheet" href = "<?php echo base_url(); ?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href = "<?php echo base_url(); ?>public/css/jquery-ui.css" />
    <link rel="stylesheet" href = "<?php echo base_url(); ?>public/css/default.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-3.2.1.min.js">    </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui.js">    </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min.js">    </script>
</head>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php if($this->session->userdata('email')): ?>
            <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">My account</a>
        <?php else:?>
            <a class="navbar-brand" href="<?php echo base_url(); ?>login">Login</a>
            <a class="navbar-brand" href="<?php echo base_url(); ?>register">Register</a>
      <?php endif; ?>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"> <a  href="<?php echo base_url(); ?>">Home</a></li>
                <li><a  href="<?php echo base_url(); ?>about">About</a></li>
                 <?php if($this->session->userdata('email')): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown">More <b class="caret"></b>
                        <ul class="dropdown-menu">
                            <li><a  href="<?php echo base_url();?>#">Photos</a></li>
                            <li><a  href="<?php echo base_url();?>#">Settings</a></li>
                            <li><a href="<?php echo base_url();?>logout">Log out</a></li>
                        </ul>
                    </a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    </div>
</nav>
<body>

<div id="content">

<h1><?php echo $title; ?></h1>