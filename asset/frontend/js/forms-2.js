(function ($) {

    "use strict";

    var $document = $(document),
        forms = {
            contactForm: $('#contactform'),
        };

    $document.ready(function () {
        // contact page form
        if (forms.contactForm.length) {
            var $contactform = forms.contactForm;
            $contactform.validate({
                rules: {
                    firstname: {
                        required: true,
                        minlength: 2
                    },
                    phonenumber: {
                        required: true,
                        minlength: 10
                    },
                    message: {
                        required: true,
                        minlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    firstname: {
                        required: "Please enter your name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    message: {
                        required: "Please enter message",
                        minlength: "Your message must consist of at least 20 characters"
                    },
                    email: {
                        required: "Please enter your email"
                    }
                },
            });
        }

    });

})(jQuery);
