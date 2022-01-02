 <script src="<?php echo base_url()?>assets/scripts/form-samples.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/resources/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/resources/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/resources/jquery-validation/js-validation.js" type="text/javascript"></script>
<script type="text/javascript">
    var FormValidation = function () {

    // basic validation
    var handleValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#frm_changepassword');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                
                rules: {
                    newpassword: {
                        required: true,
                        minlength: 6,
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#newpassword"
                    }
                },

                messages: {
                    confirmPassword: {
                        required: 'Confirm password must match the new password!!!',
                        equalTo: "Password Mismatch!!!",
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var cont = $(element).parent('.input-group');
                    if (cont.size() > 0) {
                        cont.after(error);
                    } else {
                        element.after(error);
                    }
                },

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                    form.preventDefault();
                    form.submit();
                }
            });


    }
    return {
        //main function to initiate the module
        init: function () {
            handleValidation();
        }
    };
}();
jQuery(document).ready(function() {
    FormValidation.init();
});
</script>