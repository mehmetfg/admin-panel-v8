
<?php



if(session("success")){

?>

<script>
    iziToast.success({
        title: 'Başarılı',
        message: '{{session("success")}}',
        position : "topCenter"
    })
</script>

<?php } if(session("error")) { ?>

<script>
    iziToast.error({
        title: 'Başarısız.',
        message: '{{session("error")}}',
        position : "topCenter"
    })
</script>

<?php
} ?>
