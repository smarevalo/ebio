<style type="text/css">
    body {
        background: #eee;
    }
    .container{
        padding:5%;
    }
    .lead{
        background:#fff;
        padding:4%;
    }
</style>

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <span class="display-1 d-block">ERROR</span>
                <div class="mb-4 lead"> <?= $alerta ?> </div>
                <a href="<?= base_url() ?>" class="btn btn-link">HOME</a>
            </div>
        </div>
    </div>
</div>
