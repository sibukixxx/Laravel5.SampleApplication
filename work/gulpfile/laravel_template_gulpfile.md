## Notes

- [Elixir 3.0.0 がバージョンアップしたことで Laravel 5.0.x で起こりうる障害とその対策](http://qiita.com/ryo88c/items/cf8a7cf12e373b39ee9c)
	- queueTaskの廃止
	- [registerWatcherの廃止](https://github.com/laravel/framework/issues/9771)


- [gulpFilterの変更点](https://github.com/sindresorhus/gulp-filter/issues/42)
	- OK: gulpFilter('/.js', {restore: true});
	- NG: pipe(jsFilter.restore())

- gulp 
	- bower install の実行
	- .bowerrcによってbower_componetsの保存先を変更している
	- installしたい内容はbower.jsonに記載する

- gulp publish
	- bowerでinstallしたファイル群を指定Dirに設置
	- 指定例：public/assets/{js,css,image}/{DLしたファイルが配置される}


