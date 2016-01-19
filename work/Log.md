## ログの出力サンプル

- storage/logs/laravel_○○.log

```
        Log::info('ああああ '.$data['password_confirmation']);
        Log::debug('いいいいい '.$data['password_confirmation']);
        Log::warning('ううう '.$data['password_confirmation']);
        Log::error('えええ '.$data['password_confirmation']);
```