
<?php echo form_open(); ?>
<div style = "padding: 100px 100px 10px;">

    <div class = "form-horizontal" id="form" >
<!--        --><?php //echo validation_errors('<div class="error">','</div>'); ?>
        <?php if (isset($message)): ?>
            <div class="text-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class = "row">

            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >E-Mail</label>
                    <input type = "text" class = "form-control" name = "email" value="<?php echo set_value('email'); ?>" placeholder="Enter E-Mail" id="email" onfocus="this.placeholder=''" onblur="this.placeholder='Email address:'" />
                    <span id="email-error" class='text-danger'><?php echo form_error('email'); ?></span>
                </div>
            </div><br>
            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Phone</label>
                    <input type="text" name = "phone" placeholder="(000) 000-0000" value="<?php echo set_value('phone'); ?>" class = "form-control" id="phone" onfocus="this.placeholder=''" onblur="this.placeholder='(000) 000-0000'" />
                    <span id="phone-error" class='text-danger'><?php echo form_error('phone'); ?></span>
                </div>
                <div class = "form-inline">
                    <label >Password</label>
                    <input type="password" name = "password" placeholder="Enter password" value="<?php echo set_value('password'); ?>" class = "form-control" id="password" onfocus="this.placeholder=''" onblur="this.placeholder='Password:'" />
                    <span id="password-error" class='text-danger'><?php echo form_error('password'); ?></span>
                </div>
                <div class = "form-inline">
                    <label >Repeat Password</label>
                    <input type = "password" class = "form-control" name = "password1" value="<?php echo set_value('password1'); ?>" placeholder="Repeat password" id="password1" onfocus="this.placeholder=''" onblur="this.placeholder='Repeat password:'"/>
                    <span id="password1-error" class='text-danger'><?php echo form_error('password1'); ?></span>
                </div>

                <br />
                <label></label><input class="btn btn-primary"  type="submit" value="Register" name="register"/>
            </div>
        </div>
    </div>

</div>
<?php form_close(); ?>