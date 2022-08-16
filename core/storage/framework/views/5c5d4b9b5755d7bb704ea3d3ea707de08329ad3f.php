<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">
    <title>
        <?php if(@$general->sitename): ?>
            <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>
    <!-- STYLE LINK -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/jquery-ui.css')); ?>">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/font/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/fontawesome-5-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/font-awesome.min.css')); ?>">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/search.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/aos2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/lightcase.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/menu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/maps.css')); ?>">
    <link rel="stylesheet" id="color" href="<?php echo e(asset('asset/frontend/css/colors/pink.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/cookie.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/frontend/css/iziToast.min.css')); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body class="homepage-9 hp-6 homepage-1 inner-pages">
    <!-- Wrapper -->
    <div id="wrapper">
        
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>

        

        <?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('frontend.sections.partner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.layout.askforprice_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <!-- SCRIPTS -->
        <script src="<?php echo e(asset('asset/frontend/js/jquery-3.5.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/rangeSlider.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/tether.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/moment.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/mmenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/mmenu.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/aos.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/aos2.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/animate.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/slick.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/fitvids.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/jquery.counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/isotope.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/smooth-scroll.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/lightcase.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/search.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/owl.carousel.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/ajaxchimp.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/newsletter.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/jquery.form.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/searched.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/forms-2.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/map-style2.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/range.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/color-switcher.js')); ?>"></script>
        <!-- Slider Revolution scripts -->
        <script src="<?php echo e(asset('asset/frontend/revolution/js/jquery.themepunch.tools.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/revolution/js/jquery.themepunch.revolution.min.js')); ?>"></script>
        <script src="<?php echo e(asset('asset/frontend/js/iziToast.min.js')); ?>"></script>
        <!-- MAIN JS -->
        <script src="<?php echo e(asset('asset/frontend/js/script.js')); ?>"></script>
        <!-- PUSh SCRIPTS -->
        <?php echo $__env->yieldPushContent('script'); ?>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });
        </script>


        <script>
            $('.ask-for-price').on('click', function() {
                const modal = $('#ask');               
                const title = $(this).data('title');
                $('#title').val(title);
                modal.modal('show');
            });

            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 3
                    }
                }
            });

            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 7,
                        margin: 20
                    }
                }
            });

            $(".dropdown-filter").on('click', function() {
                $(".explore__form-checkbox-list").toggleClass("filter-block");
            });
        </script>
        
        <?php if(Session::has('success')): ?>
            <script>
                "use strict";
                iziToast.show({
                    message: "<?php echo e(session('success')); ?>",
                    position: 'topRight',
                    theme: 'dark',
                    icon: 'fas fa-solid fa-check',
                    progressBarColor: 'rgb(0, 255, 184)',
                    color: '#17d990',
                    messageColor: '#ffffff',
                });
            </script>
        <?php endif; ?>

        <?php if(@$errors->any()): ?>
            <script>
                "use strict";
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    iziToast.show({
                        message: "<?php echo e(__($error)); ?>",
                        position: "topRight",
                        theme: 'dark',
                        icon: 'fa fa-exclamation-circle',
                        progressBarColor: '#f78686',
                        color: '#fb405d',
                        messageColor: '#ffffff',
                    });
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </script>
        <?php endif; ?>
        

        <script>
            'use strict';

            $(document).ready(function() {
                $(document).on('submit', '#subscribe', function(e) {
                    e.preventDefault();
                    const email = $('.subscribe-email').val();
                    var url = "<?php echo e(route('subscribe')); ?>";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            email: email,
                        },
                        success: (data) => {
                            iziToast.success({
                                message: data.message,
                                position: 'topRight',
                                theme: 'dark',
                                icon: 'fas fa-solid fa-check',
                                progressBarColor: 'rgb(0, 255, 184)',
                                color: '#17d990',
                                messageColor: '#ffffff',
                            });
                            $('.subscribe-email').val('');

                        },
                        error: (error) => {
                            if (typeof(error.responseJSON.errors.email) !== "undefined") {
                                iziToast.error({
                                    message: error.responseJSON.errors.email,
                                    position: "topRight",
                                    theme: 'dark',
                                    icon: 'fa fa-exclamation-circle',
                                    progressBarColor: '#f78686',
                                    color: '#fb405d',
                                    messageColor: '#ffffff',
                                });
                            }

                        }
                    })

                });
            });
        </script>

    </div>

</body>


</html>
<?php /**PATH C:\xampp\htdocs\asset\core\resources\views/frontend/layout/master.blade.php ENDPATH**/ ?>