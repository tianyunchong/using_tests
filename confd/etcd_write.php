<?php
/**
 * 写入配置文件到etcd
 */
use ActiveCollab\Etcd\Client as EtcdClient;
require __DIR__ . '/vendor/autoload.php';
$etcdConfig = array(
    "host" => "127.0.0.1",
    "port" => 2379,
);
$config = array(
    '/gcv3/dev/sys/memcommon'  => array(
        0 => ';公共memcached缓存集群',
        1 => '[memcommon]',
        2 => 'host = 192.168.8.189',
        3 => 'port = 11211',
    ),
    '/gcv3/dev/sys/memtxy'     => array(
        0 => ';腾讯云 暂搜索专用',
        1 => '[memtxy]',
        2 => 'host = 192.168.8.189',
        3 => 'port = 11211',
    ),
    '/gcv3/dev/sys/specialpro' => array(
        0 => ';specialpro 特权产品存储腾讯云memcached',
        1 => '[specialpro]',
        2 => 'host = 192.168.8.189',
        3 => 'port = 11211',
    ),
);
$client = new EtcdClient('http://' . $etcdConfig["host"] . ':' . $etcdConfig["port"]);
//写入下Key值,此行代码本打算写入在confd的模板中语法嵌套组合生成配置文件，但是目前不支持，所以没啥用
$client->set("/gcv3/dev/sys/conf_keys", "memcommon:memtxy:specialpro");
//将配置信息写入etcd
// foreach ($config as $key => $value) {
//     foreach ($value as $key1 => $value1) {
//         $client->set($key . "/" . $key1, $value1);
//     }
// }
//获取目录下拥有的键值对
// if ($client->dirExists("/gcv3/dev")) {
//     var_dump($client->getKeyValueMap("/gcv3/dev"));
// }
