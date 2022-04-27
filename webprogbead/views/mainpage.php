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
        <img src="<?php echo BASE . 'images/rsz_telefonos_kp1b.jpeg' ?>" width="100%" alt="">
        <br><br>
        <h1>Az otthon</h1>
        <p>Bentlakásos otthonunk teljes körű ellátást biztosít 12 autista, középsúlyos értelmi fogyatékos lakója számára.</p>
        <p>Lakóinkat privát életterük megőrzése céljából egyágyas szobákban helyezzük el.</p>
        <p>Az otthonon belül a tágas közös étkező-nappali kialakítása mellett sportszobát, sószobát, relaxációs szobát és kézműves foglalkozásra alkalmas helységeket is igénybe vehetnek a lakók.</p>
        <p>A kert kialakításakor törekedtünk a szenzoros érzékenységnek megfelelő eszközöket, megoldásokat biztosítani, ezért tágas fedett terasz, csobogó, több hintázási lehetőség, elbújó helyek és kreatív rész is színesíti a szabadidő eltöltését.</p>
        <br><br>
        <?php echo getInstance('video')->getYoutubeIframeTagWidthPercent("https://www.youtube.com/watch?v=JdUq2opPY-Q", 100); ?>
        <br><br>
        <div class="videocontainer">
            <video width="100%" controls autoplay muted>
                <source src="<?php echo BASE . 'video/mercedes_vs_death.mp4' ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <br><br>
        <?php getFooter(); ?>
    </div>
</body>

</html>