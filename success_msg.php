<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>

<div class="container-fluid">
    <div class="alert alert-success">
        <p>Programarea dumneavoastră a fost înregistrată cu succes.</p> 
        <p>Personalul autorizat din clinica noastră vă va contacta în cel mai scurt timp posibil.</p> 
        <p>Codul programării dumneavoastră este <b><?= ucwords($_GET['code']) ?></b> Vă mulțumim!</p>
    </div>

    <div class="form-group text-right">
        <button class="btn btn-sm btn-dark btn-flat" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Inchide</button>
    </div>
</div>
<script>
    $(function(){
        $('#uni_modal').on('hide.bs.modal',function(){
            location.reload()
        })
    })
</script>