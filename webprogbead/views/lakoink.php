<?php if (!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
</head>

<body>
    <?php getHeader(); ?>
    <div class="container">
        <?php getInstance('menu')->getMenu(); ?>
        <h1 class="mt-4 mb-4">Lakóink</h1>
        <div class="row">
            <div class="col-md-6">
                <img class="rounded float-left" src="<?php echo BASE . 'images/levi.png' ?>" width="100%" alt="">
            </div>
            <article class="col-md-6">
                <p>Otthonunk egyaránt fogad több területen nagyfokú önállósággal rendelkező autista, illetve értelmi sérült személyt, illetve nagyobb törődést, segítséget igénylő érintettet is. Lakóközösségünkbe szabad helyek esetén az alábbi érintettséggel várjuk lakóinkat:</p>
                <ul class="list-unstyled">
                    <li>Autizmus</li>
                    <li>Prader Willi Szindróma</li>
                    <li>Asperger</li>
                    <li>Angyal szindróma</li>
                    <li>Down szindróma</li>
                    <li>Egyéb értelmi fogyatékosság</li>
                </ul>
            </article>
        </div>
    </div>
    <?php getFooter(); ?>
</body>

</html>