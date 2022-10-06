"use strict";
// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});
$('input[type="checkbox"].custom-checkbox, input[type="radio"].custom-radio').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%'
});
$("#dob").datetimepicker({
    format: 'YYYY-MM-DD',
    widgetPositioning:{
        vertical:'bottom'
    },
    keepOpen:false,
    useCurrent: false,
    maxDate: moment().add(1,'h').toDate()
});
$("#commentForm").bootstrapValidator({
    fields: {
        first_name: {
            validators: {
                stringLength: {
                    min: 3,
                    message: 'Please enter atleast 3 Alphabet'
                },
                notEmpty: {
                    message: 'Please supply your first name'
                },
                callback: {
                    message: 'please enter only letters',
                    callback: function(value, validator, $field) {
                        if (!isValid(value)) {
                            return {
                                valid: false,
                            };
                        }
                        else
                        {
                            return {
                                valid: true,
                            };
                        }

                    }
                }
            }
        },
        last_name: {
            validators: {
                stringLength: {
                    min: 3,
                    message: 'Please enter atleast 3 Alphabet'
                },
                notEmpty: {
                    message: 'Please supply your last name'
                },
                callback: {
                    message: 'please enter only letters',
                    callback: function(value, validator, $field) {
                        if (!isValid(value)) {
                            return {
                                valid: false,
                            };
                        }
                        else
                        {
                            return {
                                valid: true,
                            };
                        }

                    }
                }
            }
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Password is required'
                }
            }
        },
        password_confirm: {
            validators: {
                notEmpty: {
                    message: 'Confirm Password is required'
                },
                identical: {
                    field: 'password'
                },
                stringLength: {
                    min: 3,
                    message: 'Please enter at least 3 character or numbers'
                }

            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                },
                regexp: {
                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                    message: 'The value is not a valid email address'
                }
            }
        },
        activate: {
            validators: {
                notEmpty: {
                    message: 'Please check the checkbox to activate'
                }
            }
        },
        group: {
            validators:{
                notEmpty:{
                    message: 'You must select a group'
                }
            }
        }
    }
});
function isValid(value)
{
    var fieldNum = /^[a-z]+$/i;

    if ((value.match(fieldNum))) {
        return true
    }
    else
    {
        return false
    }

}
$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#commentForm').data('bootstrapValidator').validate();
        return $validator.isValid();
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if ($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
    }});

$('#rootwizard .finish').click(function () {
    var $validator = $('#commentForm').data('bootstrapValidator').validate();
    if ($validator.isValid()) {
        document.getElementById("commentForm").submit();
    }

});
$('#activate').on('ifChanged', function(event){
    $('#commentForm').bootstrapValidator('revalidateField', $('#activate'));
});
$('#commentForm').keypress(
    function(event){
        if (event.which == '13') {
            event.preventDefault();
        }
    });