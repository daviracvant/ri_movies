<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/11/13
 * Time: 9:12 PM
 * To change this template use File | Settings | File Templates.
 */

class Lib_Menu extends Lib_Loader {
}
class Lib_Menu_Default extends Lib_default
{
    /**
     * constructor.
     */
    public function __construct()
    {
        $dependency = array(
            'library' => array('form_validation'),
            'model' => array("menu_model"),
            'helper' => array('string'),
        );
        $this->_set_dependencies($dependency);
        $this->_load_dependencies();
    }
}

class Lib_Menu_public extends Lib_Menu_Default
{
    /**
     * This would return menu for public access.
     * @return array|bool
     */
    public function get_menu()
    {
        $is_menu = FALSE;
        $menu = $this->menu_model->select_menu();
        if (count ($menu) > 0) {
            $menus = array();
            for ($index = 0; $index < count($menu); $index++)
            {
                $menus[$menu[$index]->name][] = $menu[$index];
            }
            unset($menu);
            $is_menu  = $menus;
        }
        return $is_menu;
    }
}