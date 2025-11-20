<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-present http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------

namespace app\user\controller;

use cmf\controller\AdminBaseController;

/**
 * Class AdminSignController
 * @package app\user\controller
 */
class AdminSignController extends AdminBaseController
{

    /**
     * 注册管理
     * @adminMenu(
     *     'name'   => '注册管理',
     *     'parent' => 'user/AdminSign/index',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '用户操作管理',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        if (!empty($content)) {
            return $content;
        }
        $cmfSettings    = cmf_get_option('cmf_settings');
        $this->assign("cmf_settings", $cmfSettings);
        return $this->fetch();
    }

    /**
     * 注册管理提交
     * @adminMenu(
     *     'name'   => '注册管理提交',
     *     'parent' => 'indexPost',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '注册管理提交',
     *     'param'  => ''
     * )
     */
    public function indexPost()
    {
        if ($this->request->isPost()) {
            $cmfSettings = $this->request->param('cmf_settings/a');
            $bannedUsernames                 = preg_replace("/[^0-9A-Za-z_\\x{4e00}-\\x{9fa5}-]/u", ",", $cmfSettings['banned_usernames']);
            $cmfSettings['banned_usernames'] = $bannedUsernames;
            cmf_set_option('cmf_settings', $cmfSettings);
            $this->success(lang('EDIT_SUCCESS'), '');
        }
    }

}
