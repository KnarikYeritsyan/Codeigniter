
<?php echo form_open(); ?>
<div style = "padding: 100px 100px 10px;">

    <div class = "form-horizontal" id="form" >
       <!-- --><?php /*echo form_open('login'); */?>
        <!--<form action="<?php /*echo base_url(); */?>login" method="post">-->
        <?php echo validation_errors('<div class="error">','</div>'); ?>
        <?php if (isset($message)): ?>
            <div class="text-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class = "row">
            <div class = "col-lg-8">
                <div class = "form-inline">

                    <label >E-Mail</label>

                    <input type = "text" class = "form-control" name = "email" value="<?php echo set_value('email'); ?>" placeholder="Enter E-Mail" id="email"  onfocus="this.placeholder=''" onblur="this.placeholder='Email address:'"/>
                   <!-- --><?php /*echo form_input(array('id' => 'email', 'name' => 'email') ); */?>
                </div>
                <span class="error"></span>
            </div><br>
            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Password</label>
                    <input type="password" name = "password" value="<?php echo set_value('password1'); ?>" placeholder="Enter password" class = "form-control" id="password"  onfocus="this.placeholder=''" onblur="this.placeholder='Password:'"/>
                   <!-- --><?php /*echo form_password(array('id' => 'password', 'name' => 'password')); */?>
                </div>
                </div>
                <div class = "row">
                    <div class="col-lg-8">
                        <label></label><span id="error"></span>
                        <!--<span><?php /*echo validation_errors(); */?></span>-->
                    </div>
                </div>
            <div class="text-danger">
                <?php echo $this->session->flashdata("error");?>
            </div>
                <div class="checkbox">
                    <label></label><label><input type="checkbox" name="remember" id="remember"> Remember me</label>
                </div>
                <br />

                <label></label><input class="btn btn-primary"  type="submit" value="Log In" name="login"/>
           <!-- --><?php /*echo form_submit(array('name' => 'submit'), 'login'); */?>
            </div>
        </div>
        <?php /*echo form_close(); */?>

    </div>

<?php form_close(); ?>