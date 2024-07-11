<!-- footer.php -->
<?php
$esFeriaDeCiencias = true;
if ($esFeriaDeCiencias){
    $credits = "&copy; 6to 'C' 2023 | EEST N° 1 | Profesor: Sergio Caffaro";
}
else{
    $credits = "&copy; 7to 'B' 2024 | EEST N° 1 | Profesor: Sergio Caffaro";
}
?>
<footer>
    <div class="contenedor-footer">
        <div class="cont-foo">
            <h4>Telefono</h4>
            <p>
                <a href="tel:02346431330" style="color: white;">
                    <i class="bi bi-telephone-fill"></i> 2346-431330
                </a>
            </p>
        </div>
        <div class="cont-foo">
            <h4>Localidad</h4>
            <p>Chivilcoy, Buenos Aires</p>
        </div>
    </div>
    <div class="footer-bottom">
        <h3><?php echo $credits; ?></h3>
    </div>
</footer>