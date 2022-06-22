<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.js" integrity="sha512-bwanfE29Vxh7VGuxx44U2WkSG9944fjpYRTC3GDUjh0UJ5FOdCQxMJgKWBnlxP5hHKpFJKmawufWEyr5pvwYVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        //mobile mask method
        $('#barContact').mask('0000-000-000');

        //brella mask method
        $('#brellaNum').mask('000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // physical address validation method
        $.validator.addMethod('st_address', function(value, element, param) {
            var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
            return value.match(nameRegex);
        });

        // create new bar validation 
        $("#createBarForm").validate({
            rules: {
                barName: {
                    required: true,
                    name_validation: true
                },
                brellaNum: {
                    required: true,
                    minlength: 6
                },
                barOwner: {
                    required: true,
                    email: true
                },
                barEmail: {
                    required: true,
                    email: true
                },
                barContact: {
                    required: true
                },
                address: {
                    required: true,
                    st_address: true
                },
                num_employees: {
                    required: true,
                }
            },
            messages: {
                barName: {
                    required: "Bar Name is required",
                },

                brellaNum: {
                    required: "Brella number is required",
                    minlength: "Brella number is invalid"
                },
                barOwner: {
                    required: "Bar owner Name is required",
                },
                barEmail: {
                    required: "Bar email is required",
                    email: "Bar email is invalid"
                },
                barContact: {
                    required: "Bar contact is required"
                },
                address: {
                    required: "Physical address is required",
                    st_address: "Physical address is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    $(document).ready(function() {

        //mobile mask method
        $('#barContact').mask('0000-000-000');

        //brella mask method
        $('#brellaNum').mask('000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // physical address validation method
        $.validator.addMethod('st_address', function(value, element, param) {
            var nameRegex = /^[#.0-9a-zA-Z\s,-]+$/;
            return value.match(nameRegex);
        });

        // create new bar validation 
        $("#editBarForm").validate({
            rules: {
                barName: {
                    required: true,
                    name_validation: true
                },
                brellaNum: {
                    required: true,
                    minlength: 6
                },
                barOwner: {
                    required: true,
                    email: true
                },
                barEmail: {
                    required: true,
                    email: true
                },
                barContact: {
                    required: true
                },
                address: {
                    required: true,
                    st_address: true
                },
                num_employees: {
                    required: true,
                }
            },
            messages: {
                barName: {
                    required: "Bar Name is required",
                },

                brellaNum: {
                    required: "Brella number is required",
                    minlength: "Brella number is invalid"
                },
                barOwner: {
                    required: "Bar owner Name is required",
                },
                barEmail: {
                    required: "Bar email is required",
                    email: "Bar email is invalid"
                },
                barContact: {
                    required: "Bar contact is required"
                },
                address: {
                    required: "Physical address is required",
                    st_address: "Physical address is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    $(document).ready(function() {

        // mobile mask
        $('#contact').mask('0000-000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // create Employee validation 
        $("#createEmployeeForm").validate({
            rules: {
                fullname: {
                    required: true
                },
                contact: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                confirmPassword: {
                    required: true
                },
                barId: {
                    required: true
                }
            },
            messages: {
                fullname: {
                    required: "fullname is required",
                },

                contact: {
                    required: "mobile is required",
                    minlength: "mobile is invalid"
                },
                email: {
                    required: "email is required",
                    email: "email is invalid"
                },
                password: {
                    required: "password is required"
                },
                confirmPassword: {
                    required: "confirm password is required"
                },
                barId: {
                    required: "barId is required"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });


    $(document).ready(function() {

        // mobile mask
        $('#contact').mask('0000-000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // create manager validation 
        $("#createManagerForm").validate({
            rules: {
                fullname: {
                    required: true
                },
                contact: {
                    required: true,
                    minlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                confirmPassword: {
                    required: true
                },
                barId: {
                    required: true
                }
            },
            messages: {
                fullname: {
                    required: "fullname is required",
                },

                contact: {
                    required: "mobile is required",
                    minlength: "mobile is invalid"
                },
                email: {
                    required: "email is required",
                    email: "email is invalid"
                },
                password: {
                    required: "password is required"
                },
                confirmPassword: {
                    required: "confirm password is required"
                },
                barId: {
                    required: "barId is required"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    $(document).ready(function() {

        // mobile mask
        $('#Phone').mask('0000-000-000');

        // email validation method
        $.validator.addMethod('email', function(value, element, param) {
            var nameRegex = /^\S+@\S+\.\S+$/;
            return value.match(nameRegex);
        });

        // create userProfile validation 
        $("#userProfileForm").validate({
            rules: {
                fullName: {
                    required: true
                },
                Phone: {
                    required: true,
                    minlength: 10
                },
                Email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                fullName: {
                    required: "fullname is required",
                },

                Phone: {
                    required: "mobile is required",
                    minlength: "mobile is invalid"
                },
                Email: {
                    required: "email is required",
                    email: "email is invalid"
                }

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>