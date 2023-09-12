<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($title); ?></title>
</head>
<body>
    <div>
        <div style="background:#ffffff;padding:15px">
            <p>Dear <b><?php echo e($name); ?></b>,</p>

            <p>I am writing to inform you that <?php echo e($message_text); ?></p>

            <p style="margin:0px">Sincerely,</p>
            <?php echo e($name); ?>

        </div>
    </div>
</body>
</html><?php /**PATH /home/u182721273/domains/birds.re/public_html/resources/views/email/orderemail.blade.php ENDPATH**/ ?>