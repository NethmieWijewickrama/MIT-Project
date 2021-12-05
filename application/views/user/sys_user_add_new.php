<div class="page-inner">
    <div class="page-title">
        <div class="container">
            <h3></h3>
        </div>
    </div>


    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default" data-sortable-id="ui-widget-10">
                    <div class="panel-heading">

                        <h4 class="panel-title">Add New User</h4>
                    </div>
                    <div class="panel-body">

                        <div class="panel-body">
                            <?php if($msg!=""){ ?>
                            <div class="alert <?php echo $class_alert ?>" role="alert">
                                <?php echo $msg; ?>
                            </div>
                            <?php } ?>
                            <form id="form_data" method="post">
                                <div class="form-group">
                                    <li class="fa fa-user">&nbsp;&nbsp;</li>
                                    <label for="input_username">User Name</label>
                                    <br />

                                    <input class="form-control input-rounded" name="username" id="input_username"
                                        placeholder="User Name" required="" type="text">
                                    <label id="input_username-error" style="display:none; color:red;" class="error"
                                        for="input_username">Username Already Exists...!</label>
                                </div>


                                <div class="form-group">
                                    <li class="fa fa-key">&nbsp;&nbsp;</li>
                                    <label>Last Name</label>
                                    <input class="form-control input-rounded" name="last name" placeholder="last name"
                                           required="" type="text">
                                </div>




                                <div class="form-group">
                                    <li class="fa fa-key">&nbsp;&nbsp;</li>
                                    <label>Password</label>
                                    <input class="form-control input-rounded" name="password" placeholder="Password"
                                        required="" type="password">
                                </div>

                                <div class="form-group">
                                    <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                                    <label>Email</label>
                                    <input class="form-control input-rounded" name="email" placeholder="Email"
                                        required="" type="email">
                                </div>

                                <div class="form-group">
                                    <li class="fa fa-eye">&nbsp;&nbsp;</li>
                                    <label>Name</label>
                                    <input class="form-control input-rounded" name="name" placeholder="Name" required=""
                                        type="text">
                                </div>

                                <div class="form-group">
                                    <li class="fa fa-users">&nbsp;&nbsp;</li>
                                    <label>User Role</label>
                                    <select class="form-control m-b-sm input-rounded" name="user_group_id" required="">
                                        <option value="" disabled selected>Select User Role</option>
                                        <?php foreach($user_group->result() as $grops){ ?>
                                        <option value="<?php echo $grops->user_group_id ?>">
                                            <?php echo $grops->user_group ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <li class="fa fa-gears">&nbsp;&nbsp;</li>
                                    <label>User Status</label>
                                    <select class="form-control m-b-sm input-rounded" name="status_id" required="">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>

                                    </select>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <button type="submit" class="btn btn-primary m-r-5 m-b-5">
                                        <i class="fa fa-user"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6">
					<div class="panel panel-white">
					   
					</div>
				</div> -->
            </div>
        </div>
    </div>
</div>
<?php require_once('loader.php'); ?>

<script>
$(window).load(function() {
    $(".se-pre-con").fadeOut("slow");
    $('#input_username').change();
});
$('#input_username').change(function(e) {
    var username_input_text = $.trim($('#input_username').val());
    if (username_input_text.length > 0) {
        $.ajax({
            url: '<?php echo base_url() ?>index.php/user/user/check_valide_username',
            method: 'POST',
            data: {
                username_input_text: username_input_text
            },
            // beforeSend: function() {
            //     $('#ajaxBusy').show();
            // },
            success: function(data) {
                $('#ajaxBusy').hide();
                if ($.trim(data) == true) {
                    $('#input_username-error').show();
                    $('#input_username').focus();
                } else {
                    $('#input_username-error').hide();
                }
            },
            error: function(err, message, xx) {

            }
        });
    }
});
</script>

<script>
    $(document).ready(function () {
        App.init();
        // TableManageButtons.init();
    });

</script>