<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div>
        <h1>Reporte - Categoria Por Familia</h1>
        <hr>
        <select name="cbxFam" id="cbxFam">
            <option>Seleccione Familia</option>
            <?php
                require_once '../logica/LFamilia.php';
                $logFamilia=new LFamilia();
                $familias=$logFamilia->cargar();
                foreach($familias as $fam){
            ?>
            <option value="<?=$fam->getIdFamilia()?>"><?=$fam->getNombre()?></option>
            <?php
                }
            ?>
        </select>
    </div>
    <div id="res">

    </div>
</body>
</html>
<script>
    $('#cbxFam').change(function(){
        idfam=$('#cbxFam').val();
        param={'idfam':idfam};
        $.ajax({
            url:'reporte1.php',
            data:param,
            type:'get',
            success:function(res){
                $('#res').html(res);
            }
        });
    });
</script>