### confd测试使用
利用confd生成gcv3到指定机器生成配置目录文件

1. php脚本写入配置数据到etcd
https://github.com/linkorb/etcd-php
2. 建立confd配置模板和配置文件
3. 预先建立gcv3配置目录结构
3. 实现脚本转移confd配置模板和配置文件到配置位置
4. 启动confd,生成配置目录文件