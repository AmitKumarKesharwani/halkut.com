let <?php echo e($chart->id); ?>_rendered = false;
let <?php echo e($chart->id); ?>_load = function () {
    if (document.getElementById("<?php echo e($chart->id); ?>") && !<?php echo e($chart->id); ?>_rendered) {
        <?php if($chart->api_url): ?>
            fetch("<?php echo e($chart->api_url); ?>")
                .then(data => data.json())
                .then(data => { <?php echo e($chart->id); ?>_create(data) });
        <?php else: ?>
            <?php echo e($chart->id); ?>_create(<?php echo $chart->formatDatasets(); ?>)
        <?php endif; ?>
    }
};
window.addEventListener("load", <?php echo e($chart->id); ?>_load);
document.addEventListener("turbolinks:load", <?php echo e($chart->id); ?>_load);<?php /**PATH /var/www/vhosts/oxs.in/halkut.oxs.in/resources/views/vendor/charts/init.blade.php ENDPATH**/ ?>