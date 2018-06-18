<?php if (isset($message)): ?>
    <div class="text-success"><?php echo $message; ?></div>
<?php endif; ?>


This is dashboard page
<a href="<?php echo base_url();?>logout">Logout</a>
<?php echo form_open('',array('id' => 'myform')); ?>
    <?php
    /*$language = 'english';
    if (isset($_POST['options']))
    {
        $language = $_POST['options'];
    }*/
//    $language = 'armenian';
    $this->lang->load('user',$selected_val);
    $data_dateformat = $this->lang->line('date_format');
    $data_timeformat = $this->lang->line('time_format');
    $data_languageenglish = $this->lang->line('languageenglish');
    $data_languagearmenian = $this->lang->line('languagearmenian');
    $data_hidetime = $this->lang->line('hidetime');
    $data_showtime = $this->lang->line('showtime');
    $data_timezone = $this->lang->line('timezone');

  /*  $this->lang->load('user','english');
    $options = 'english';
    if(isset($_POST['options'])){
        $options = $_POST['options'];
    }
    switch($options){
        case 'english': $this->lang->load('user','english'); break;
        case 'armenian': $this->lang->load('user','armenian'); break;
        default: $this->lang->load('user','english'); break;
    }*/
    ?>
<link rel="stylesheet" href="<?=base_url() ?>public/css/cropper.css">
<script src="<?=base_url() ?>public/js/cropper.js"></script>

<style>
    .modal-dialog
    {
        background-color: white;
    }
    .container1 {
        max-width: 960px;
        margin: 20px auto;
    }
    .cropper-crop{
        display: none;
    }
    .cropper-bg{
        background: none;
    }

    img {
        max-width: 100%;
    }

    .row1,
    .preview {
        overflow: hidden;
    }
</style>

<div align="center">
    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
</div>
<img id="imagecrop" src="public/images/images.jpg">
<script>
    $('#imagecrop').cropper();
    function crop() {
        $('#imagecrop').cropper('getCroppedCanvas').toBlob(function (blob) {
            var formData = new FormData();

            formData.append('croppedImage', blob);

            // $.ajax($.site_config.base_url + 'user/crop_image', {
            $.ajax('<? echo base_url()?>crop', {
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    alert('Upload success');
                },
                error: function () {
                    alert('Upload error');
                }
            });
        });
    }
</script>
<button onclick="crop()">
    Crop
</button>
    <div class="col-lg-2">

    <label>Language</label>
<!--        <select id="selecte" name="options" class="form-control" onchange="this.form.submit()">-->
        <select id="selecte" name="options" class="form-control">
        <!--<option value="english"<?php /*if (isset($options) && $options === 'english') echo 'selected'; */?>><?php /*echo $data_languageenglish; */?></option>
        <option  value="armenian"<?php /*if (isset($options) && $options === 'armenian') echo 'selected'; */?>><?php /*echo $data_languagearmenian; */?></option>
-->
<!--            <option value=""></option>-->
            <option value="english"<?php if($options == "english"){ echo " selected"; }?>><?php echo $data_languageenglish; ?></option>
            <option  value="armenian"<?php if($options == "armenian"){ echo " selected"; }?>><?php echo $data_languagearmenian; ?></option>
            <!--<option value=""></option>
           <option value="english"><?php /*echo $data_languageenglish; */?></option>
           <option  value="armenian"><?php /*echo $data_languagearmenian; */?></option>-->

        </select>
        <input hidden id="submit" type="submit" name="submit" value="Get Selected Values" />
<!--        <input class="btn" type="submit" name="english" value="<?php /*echo $data_languageenglish; */?>"/>
        <input class="btn" type="submit" name="armenian" value="<?php /*echo $data_languagearmenian; */?>"/>-->
</div>
<!--<div class="col-lg-2">
    <label>Language</label>
    <?php /*$options = array('english'=>'English',
                            'armenian'=>'Armenian') */?>

    <select name="lang">
        <?php /*foreach ($options as $key => $val):*/?>
          <?php /* $selected = $_POST['lang'] == $key ? 'selected="selected"' : null;
            echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';*/?>

        <?php /*endforeach */?>

    </select>
</div>-->
<?php //form_close()?>
<br>
<br>
<br>
<br>
<?php //echo form_open(); ?>
<?php //echo form_open('',array('id' => 'myform')); ?>
<div>
<!--    <input id="submit" type="submit" name="submit" value="Get Selected Values" />-->
    <label><?php echo $data_dateformat; ?></label>
    <input class="btn btn-success" type="submit" name="us" value="US (mm-dd-yyyy)"/>
    <input class="btn btn-success" type="submit" name="uk" value="UK (dd-mm-yyyy)"/>
</div>
<div class="col-lg-2">
    <input class="form-control" type="text" name="date" id="to" value="<?php echo $date; ?>" readonly>
</div>

<?php echo form_close(); ?>
<!--<a href="--><?php //echo base_url()?><!--logout" ">Logout</a>-->
<br>
<br>
    <div class = "row">
        <div class = "form-inline">
            <div class="col-lg-8">

                <h3> <button id="button1" class="btn float-right" data-toggle="collapse"  data-target="#data1"><span id="span1">
                           Hide time <?php //echo $data_hidetime; ?></span></button></h3>
            </div>
        </div>
    </div>

    <div id="data1" class="collapse collapse in">
        <div class="form">
                <div class = "row">
                    <div class="col-lg-8">
                        <div class="form_result">

                        </div>
                        <div class = "form-inline">
                            <?php echo form_open(); ?>
                            <div>
                                <label><?php echo $data_timeformat; ?></label>
                                <input class="btn btn-warning" type="submit" name="htwelve" value="12-hour"/>
                                <input class="btn btn-warning" type="submit" name="htwentyfour" value="24-hour"/>
                        </div>
                        <div class="form-inline">
                            <div>
                                <label><?php echo $data_timezone; ?></label>
                                <?php echo timezone_menu('UP4','form-control'); ?>

                        </div>
                            <input class = "form-control" type="text" name="time" value="<?php echo $time; ?>" readonly></div>
                    </div>
                </div>

        </div>
    </div>

        <div class="col-lg-2">
            <span class='text-danger'><?php echo form_error('number'); ?></span>
            <input class = "form-control" type="text" name="number" value="<?php echo $wholenumber; ?>"></div>
        <input class="btn btn-success" type="submit" name="wholenumber" value=". to ,"/>
        </div>
<?php form_close(); ?>
<script>
/*    $(document).ready(function() {
    $('#button1').click(function(){ //you can give id or class name here for $('button')
        $('#span1').text(function(i,old){
            return old ==='Hide time' ?  'Show time' : 'Hide time';
        });
    });
    });*/
/*$(document).bind('click','#button1',function () {
    $( this ).hide();
};*/

 $(document).ready(function() {
     $('#button1').on('click', function(even,odd) { //you can give id or class name here for $('button')
//         return odd = $('#data1').hide() ? $('#data1').hide() : $('#data1').show();
//         $('#data1').hide();
         $('#span1').text(function(i,old){
             return old === 'Hide time' ?  'Show time' : 'Hide time';
//             $('#span1').val(old);
         });
     });
 });
    $(document).ready(function() {
        $('#selecte').on('change', function() {
//            this.form.submit();
//            var selected_val = this.selected().val();
//            $('myform').submit();
            $('#submit').click();
        });
    });
</script>
<!--<script>
    $(document).ready(function() {
        $('#selecte').on('change', function() {
//            this.form.submit();
//            var selected_val = this.selected().val();
//            $('myform').submit();
            $('#submit').click();
           /* $('#submit').click(function (event) {
                event.preventDefault();

                $.ajax({

                    method:"POST",
//                            data:new FormData(this),
                    contentType:false,
                    processData:false
//                            success:function (data) {
//                                alert(data);
//                                $('#image_form')[0].reset();
//                                $('#imageModal').modal('hide');
//                                location.reload();
//                            }
                })

            });*/
        });
    });
</script>-->
<?php //form_close(); ?>
<!--<div>
    <input type="submit" name="show" value="Show time"/>
    <input type="submit" name="hide" value="Hide time"/>
</div>

<div>
    <label>Time zone</label>
    <select>
        <option value="volvo">(UTC+04:00) Yerevan</option>
        <option value="volvo">(UTC+04:30) Kabul</option>
        <option value="volvo">(UTC+05:00) Ashgabat, Tashkent</option>
    </select>
</div>
<div>
    <label>Time format</label>
    <input type="submit" name="h12" value="12-hour"/>
    <input type="submit" name="h24" value="24-hour"/>
</div>
<div>
    <input type="time" name="to" id="to" value="15:43:00">
</div>-->