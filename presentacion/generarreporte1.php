<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Reporte - Categoria Por Familia</h1>
        <hr>
        <select name="cbxFam" id="cbxFam" onchange="enviar()">
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
</body>
</html>
<script>
    function enviar(){
        idfam=document.getElementById('cbxFam').value;
        window.location.href='reporte1.php?idfam='+idfam;
    }
</script>