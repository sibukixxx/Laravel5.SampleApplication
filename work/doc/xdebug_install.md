# Xdebugのインストール手順

## 事前準備
yum install --enablerepo=remi-php55 php-devel
pecl install xdebug
エクステンションのパスが出力されるのでメモする。
-> Installing '/usr/lib64/php/modules/xdebug.so'

## php.ini修正
```/etc/php.ini
zend_extension="/usr/lib64/php/modules/xdebug.so"

; see http://xdebug.org/docs/all_settings
html_errors=on
xdebug.remote_autostart=on
xdebug.remote_enable=on
xdebug.remote_handler=dbgp
xdebug.remote_host=localhost
xdebug.remote_port=9001
xdebug.remote_handler=dbgp
xdebug.idekey = "phpstorm"
```
## apache再起動
/etc/init.d/httpd restart