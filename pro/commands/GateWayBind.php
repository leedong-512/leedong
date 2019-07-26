<?php
namespace app\commands;



class GateWayBind {
    const REGIST_IP = '127.0.0.1:1238';
    public function __construct() {
        Gateway::$registerAddress = self::REGIST_IP;
    }

    /**
     * @function 绑定uid
     * @param $uid
     * @param $client_id
     * @return bool
     * @author lidong@simpleedu.com.cn
     */
    public static function Binduid($uid, $client_id) {
        Gateway::bindUid($client_id, $uid);
        return true;
    }

    /**
     * @function 解除绑定uid
     * @param $uid
     * @param $client_id
     * @return bool
     * @author lidong@simpleedu.com.cn
     */
    public static function unBindUid($uid, $client_id) {
        Gateway::unbindUid($client_id, $uid);
        return true;
    }
    /**
     * @function 私发消息
     * @param $uid
     * @param $message
     * @return bool
     * @author lidong@simpleedu.com.cn
     */
    public static function SendMessage($uid, $message) {
        Gateway::sendToUid($uid, $message);
        return true;
    }
}