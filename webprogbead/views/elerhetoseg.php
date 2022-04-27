<?php if (!defined('BASE_PATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">

<head>
    <?php getHead(); ?>
</head>

<body>
    <div class="container">
        <?php getHeader(); ?>
        <?php getInstance('menu')->getMenu(); ?>
        <br>
        <h1>Elérhetőség</h1><br>
        <address>
            <strong>Patrónus Ház Közhasznú Nonprofit Kft.</strong><br>
            Székhey: 2100 Gödöllő, Zarándok u. 5.<br>
            Otthon: 2100 Gödöllő, Rét u. 42.<br>
        </address>
        <address>
            <strong>Intézményvezető: Jádi Krisztina</strong><br>
            Email: <a href="mailto:intezmenyvezeto@patronushaz.hu">intezmenyvezeto@patronushaz.hu</a><br>
            Telefon: <a href="tel:+36301690313">+36 30 169 0313</a>
        </address>
        <address>
            <strong>Ügyvezető: Németh Ildikó</strong><br>
            Email: <a href="mailto:info@patronushaz.hu">info@patronushaz.hu</a><br>
            Telefon: <a href="tel:+36303610953">+36 30 361 0953</a>
        </address>
        <address>
            <strong>Web: </strong><a href="http://patronushaz.hu">patronushaz.hu</a><br>
            <strong>Facebook: </strong><a href="https://www.facebook.com/patronushaz">facebook.com/patronushaz</a><br>
            <strong>Bankszámlaszám: </strong>OTP 11742049-21411113-00000000
        </address>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.4636255750124!2d19.332305015871864!3d47.61711839524413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741ceb6a3e390db%3A0xa21ca47286ba7ec8!2zR8O2ZMO2bGzFkSwgUsOpdCB1LiA0MiwgMjEwMA!5e0!3m2!1shu!2shu!4v1649446188783!5m2!1shu!2shu" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php getFooter(); ?>
    </div>
</body>

</html>