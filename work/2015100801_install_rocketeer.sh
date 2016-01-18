#!/bin/bash

file=rocketeer.phar
dir=./

if [ -e $file ]; then
    # 存在する場合
	sleep 2
else
    # 存在しない場合
	wget http://rocketeer.autopergamene.eu/versions/rocketeer.phar &&
	chmod +x rocketeer.phar &&
	mv rocketeer.phar /usr/local/bin/rocketeer
fi

rocketeer

# Todo : [Laravel+Rocketeer+CircleCIの構成でAWSにデプロイする](http://webmake.info/laravelrocketeercircleci%E3%81%AE%E6%A7%8B%E6%88%90%E3%81%A7aws%E3%81%AB%E3%83%87%E3%83%97%E3%83%AD%E3%82%A4%E3%81%99%E3%82%8B/#LaravelRocketeer)

# rocketeer  ignite  //設定ファイルを作成
# rocketeer deploy --on="conoha_ssh"
