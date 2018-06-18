
<form action="" method="post">
<div style = "padding: 100px 100px 10px;">

    <div id="form" class="form-horizontal"  >
        <?php /*echo form_open('form/register'); */?>
        <!--<form action="<?php /*echo URL; */?>form/register" method="post">-->
       <!-- <form action="<?php /*echo base_url(); */?>registration" method="post">-->
        <?php echo validation_errors('<div class="error">','</div>'); ?>
        <?php if (isset($success)): ?>
            <div class="text-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <div class = "row">

            <div class = "col-lg-12">
                <div class = "form-inline">
                    <label >E-Mail</label>
                    <input type = "text" class = "form-control" name = "email" value="<?php echo set_value('email'); ?>" placeholder="Enter E-Mail" id="email" onfocus="this.placeholder=''" onblur="this.placeholder='Email address:'" >
                    <span class="error"> <?php echo form_error('email'); ?></span>
                </div>
                <!--<div class = "form-inline">
                    <label >Phone Number</label>
                    <input type = "text" class = "form-control" name = "last_name" placeholder="Enter Phone Number" id="lastname"/>
                </div>-->
              <!--  <label for="phonenum">Phone Number (format: xxxx-xxx-xxx):</label><br/>
                <input id="phonenum" class="form-control" type="tel" pattern="^\d{4}-\d{3}-\d{3}$" required >-->
            </div><br>
            <div class="form-group">
                <label for="phoneNumberParts" class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-10">
                    <dl id="phoneNumberParts">
                        <dd><span class="form-control-static">(</span>
                            <input type="text" class="form-control grouped-field" id="phonePrefix" name="phonePrefix" value="<?php echo set_value('phonePrefix'); ?>" placeholder="999" size="3" maxlength="3" onfocus="this.placeholder=''" onblur="this.placeholder='999'">
                            <span class="form-control-static">) </span></dd>
                        <dd><input type="text" class="form-control grouped-field" id="phonePrefix" name="phonePart1" value="<?php echo set_value('phonePart1'); ?>" placeholder="999" size="3" maxlength="3" onfocus="this.placeholder=''" onblur="this.placeholder='999'">
                            <span class="form-control-static">-</span></dd>
                        <dd><input type="text" class="form-control grouped-field" id="phonePrefix" name="phonePart2" value="<?php echo set_value('phonePart2'); ?>" placeholder="9999" size="4" maxlength="4" onfocus="this.placeholder=''" onblur="this.placeholder='9999'"></dd>
                    </dl>
                </div>
            </div>

<!--            <div class = "col-lg-12">
                <div class = "form-inline">
                    <div class="container">
                        <div class="col-xs-4">
                            <div class="form-group phone-number">
                                <label >Phone</label>
                                <div class="col-xs-3">
                                    <input type="tel" name="phone" class="form-control" value="" size="3" maxlength="3" required="required" title="">
                                </div>

                                <div class="col-xs-3">
                                    <input type="tel" name="phone" class="form-control" value="" size="3" maxlength="3" required="required" title="">
                                </div>


                                <div class="col-xs-4">
                                    <input type="tel" name="phone" class="form-control" value="" size="4" maxlength="4" required="required" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class = "col-lg-8">
                <div class = "form-inline">
                    <label >Password</label>
                    <input type="password" name = "password" placeholder="Enter password" value="<?php echo set_value('password'); ?>" class = "form-control" id="password" onfocus="this.placeholder=''" onblur="this.placeholder='Password:'" />
                    <span id="password-error"></span>
                </div>
                <div class = "form-inline">
                    <label >Repeat Password</label>
                    <input type = "password" class = "form-control" name = "password1" value="<?php echo set_value('password1'); ?>" placeholder="Repeat password" id="password1" onfocus="this.placeholder=''" onblur="this.placeholder='Repeat password:'"/>
                    <span id="password1-error"></span>
                </div>
                <div class = "row">
                    <div class="col-lg-12">
                        <label></label><span id="error"></span>
                    </div>
                </div>
                <br />
                <label></label><input class="btn btn-primary"  type="submit" value="Register" name="register"/>
            </div>
        </div>
       <!-- --><?php /*echo form_close(); */?>

    </div>

</div>
</form>