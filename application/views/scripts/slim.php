<script src="<?= base_url('assets/slim.kickstart.min.js') ?>"></script>
<!-- <script>
$(document).ready(function() {
        $(".slimBanner").slim({
            ratio: '4:3',
            minSize: {
                width: 640,
                height: 480,
            },
            crop: {
                x: 0,
                y: 0,
                width: 100,
                height: 100
            },
            service: 'upload-async.php',
            download: false,
            willSave: function(data, ready) {
                alert('saving!');
                ready(data);
            },
            label: 'Drop your image here.',
            buttonConfirmLabel: 'Ok',
            meta: {
                userId: '1234'
            }
        });
    
});
</script> -->

<style>
    .section-bottom-only {
    padding: 20px !important;
}
</style>

<script src="<?=base_url("assets/js/pages/form-editor.init.js")?>"></script>
<script src="<?=base_url("assets/libs/tinymce/tinymce.min.js")?>"></script>
