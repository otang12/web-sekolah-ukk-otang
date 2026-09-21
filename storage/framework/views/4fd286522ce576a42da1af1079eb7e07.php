<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SMK Negeri 1 Cijati'); ?> | KEREND, Kompeten, Religius, Energik, Nasionalis, Dinamis</title>
    <meta name="description" content="Website resmi SMK Negeri 1 Cijati - KEREND, Kompeten, Religius, Energik, Nasionalis, Dinamis">
    <link rel="icon" type="image/jpeg" href="<?php echo e(asset('img/logo-sekolah.png')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="<?php echo $__env->yieldContent('body-class'); ?>">

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="<?php echo e(asset('js/script.js')); ?>" defer></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\web-sekolah-ukk-otang\resources\views/layouts/app.blade.php ENDPATH**/ ?>