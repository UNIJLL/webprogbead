<?php
class menu
{
    // public function __construct()
    // {
    //     $this->db = getInstance("db");
    // }

    public function getHeader()
    {
    ?>
        <header class="section-header">
            <div class="container">
                <img src="<?php echo BASE . 'images/patronus.png' ?>" width="150" alt="">
            </div>
        </header>
    <?php
    }

    public function getFooter()
    {
    ?>
        <footer class="section-footer">
            <div class="container text-center">
                Támogatóink:
                <img src="<?php echo BASE . 'images/rsz_21eon_logo700_300.jpg' ?>" width="100" alt="">
                <img src="<?php echo BASE . 'images/leier.png' ?>" width="100" alt="">
                <img src="<?php echo BASE . 'images/cewe.png' ?>" width="100" alt="">
                <img src="<?php echo BASE . 'images/itsh.png' ?>" width="100" alt="">
                <img src="<?php echo BASE . 'images/ozdi_acelmuvek.png' ?>" width="100" alt="">
            </div>
        </footer>
    <?php
    }

    public function getLink($menuItem)
    {
        if (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['method'] != 'index') {
            return BASE . $menuItem['class'] . '/' . $menuItem['method'] . ($menuItem['parameters'] === array() ? '' : '/' . implode('/', $menuItem['parameters']));
        } elseif (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['method'] == 'index') {
            return BASE . $menuItem['class'];
        } elseif (isset($menuItem['link'])) {
            return $menuItem['link'];
        }
    }

    public function getActive($menuItem)
    {
        if (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['class'] == TASK_CLASS && $menuItem['method'] == TASK_METHOD) return ' active';
        return '';
    }

    public function getNav($menuDef, $level = 0)
    {
        $result = "";
        foreach ($menuDef as $key => $menuItem) {

            if (isset($menuItem['group'])) {

                $groupText = $menuItem['group']['group'];
                unset($menuItem['group']);

                if ($level == 0) {
                    $result .= '<li class="nav-item dropdown">';
                    $result .= '<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> ' . $groupText . ' </a>';
                    $result .= '<ul class="dropdown-menu">';
                    $result .= $this->getNav($menuItem, $level + 1);
                    $result .= '</ul>';
                    $result .= '</li>';
                } else {
                    $result .= '<ul class="submenu dropdown-menu">';
                    $result .= $this->getNav($menuItem, $level + 1);
                    $result .= '</ul>';
                }

            } elseif (isset($menuItem['class']) || isset($menuItem['link'])) {

                if ($level == 0) {
                    $result .= '<li class="nav-item' . $this->getActive($menuItem) . '"><a class="nav-link" href="' . $this->getLink($menuItem) . '"> ' . $menuItem['text'] . ' </a></li>';
                } else {
                    $result .= '<li><a class="dropdown-item" href="' . $this->getLink($menuItem) . '"> ' . $menuItem['text'] . ' </a></li>';
                }
                
            } else {
                trigger_error("Invalid menu definition: " . $key, E_USER_ERROR);
            }
        }

        return $result;
    }

    public function getMenu()
    {
        $menuDef = getConfig('menu');
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <?php echo $this->getNav($menuDef['bal']); ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php echo $this->getNav($menuDef['jobb']); ?>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </nav>
    <?php
    }
}
