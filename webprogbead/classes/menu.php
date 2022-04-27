<?php if (!defined('BASE_PATH')) exit('No direct script access allowed');

class menu
{
    // public function __construct()
    // {
    // }

    private function getLink($menuItem)
    {
        if (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['method'] != 'index') {
            return BASE . $menuItem['class'] . '/' . $menuItem['method'] . ($menuItem['parameters'] === array() ? '' : '/' . implode('/', $menuItem['parameters']));
        } elseif (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['method'] == 'index') {
            return BASE . $menuItem['class'];
        } elseif (isset($menuItem['link'])) {
            return $menuItem['link'];
        }
    }

    private function getActive($menuItem)
    {
        if (isset($menuItem['class']) && isset($menuItem['method']) && $menuItem['class'] == TASK_CLASS && $menuItem['method'] == TASK_METHOD) return ' active';
        return '';
    }

    private function getNav($menuDef, $level = 0)
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
        $msgs = getInstance('messages')->getMessages();
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
        <div id="JLLMsgArea">
            <?php
            if (count($msgs) > 0) {
                foreach ($msgs as $key => $msgHtml) {
                    echo $msgHtml;
                }
            }
            ?>
        </div>
<?php
    }
}
