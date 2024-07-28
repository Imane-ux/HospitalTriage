
$(document).ready(function() {
    $("#registerform").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 2
            },
            first_name: {
                required: true,
                minlength: 2
            },
            last_name: {
                required: true,
                minlength: 2
            },
            age: {
                required: true,
                digits: true,
                range: [0, 999]
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            severity: {
                required: true
            }
        },
        messages: {
            user_name: {
                required: "Please enter your user name",
                minlength: "Your user name must be at least 2 characters long"
            },
            first_name: {
                required: "Please enter your first name",
                minlength: "Your first name must be at least 2 characters long"
            },
            last_name: {
                required: "Please enter your last name",
                minlength: "Your last name must be at least 2 characters long"
            },
            age: {
                required: "Please enter your age",
                digits: "Please enter a valid age",
                range: "Age must be between 0 and 999"
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Please enter a valid phone number",
                minlength: "Phone number must be 10 digits",
                maxlength: "Phone number must be 10 digits"
            },
            severity: {
                required: "Please select the severity"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#loginform").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 2
            },
            user_code: {
                required: true,
                minlength: 3,
                maxlength: 3
            }
        },
        messages: {
            user_name: {
                required: "Please enter your user name",
                minlength: "Your user name must be at least 2 characters long"
            },
            user_code: {
                required: "Please enter your code",
                minlength: "Your code must be exactly 3 characters long",
                maxlength: "Your code must be exactly 3 characters long"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#newuserform").each(function() {
        $(this).validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                first_name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                status: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                first_name: {
                    required: "Please enter your first name",
                    minlength: "Your first name must be at least 2 characters long"
                },
                last_name: {
                    required: "Please enter your last name",
                    minlength: "Your last name must be at least 2 characters long"
                },
                status: {
                    required: "Please enter the status"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $("#userloginform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password",
                minlength: "Your password must be at least 6 characters long"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});