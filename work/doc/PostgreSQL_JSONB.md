## PostgreSQL JSONB取り扱い手順

- [Importing JSON data](http://adpgtech.blogspot.jp/2014/09/importing-json-data.html)
- [JSONB型でpostgresをNoSQLっぽく使う](http://www.slideshare.net/YukiTakeichi/jsonbpostgresnosql?ref=http://wakateweb.connpass.com/event/20386/presentation/?utm_campaign=new_event_links_to_group_member&utm_source=notifications&utm_medium=email&utm_content=detail_btn)
- DSL の型指定はjsonb
    - cf. text[]
- timestamp(0)にすることで「2015-11-02 11:45:34」形式にできる。※しないと、少数秒まで記録される
- [日付/時刻関連のデータ型](http://dbnote.web.fc2.com/note_datetime_010_kihon.html)
>timestampはゼロ(0)を指定しないとμ秒まで保持される。
> current_timestamp等で取得した値を入れると（業務的に必要なくても）小数秒が格納され、
> その扱いの不統一などによって取り出したときの結果が変わるなどのトラブルになりかねない。
> このため「timestamp」ではなく、まずは基本として「timestamp(0)」を挙げた。

- CREATE TABLE
```
        Schema::table('user_details', function (Blueprint $table) {
            $sql = '
                    CREATE TABLE user_details (
                    id serial PRIMARY KEY,
                    contents jsonb not null,
                    created_at timestamp(0) DEFAULT current_timestamp::timestamp(0) not null,
                    updated_at timestamp(0) not null
                    )';
            DB::connection()->getPdo()->exec($sql);
        });

```

- SELECT
    -  -- 演算子 -> , ->> でオブジェクトや配列の中身 にアクセスする
```
select
    id,
    content(カラム名)->'comment（JSONキー）'->>0（json添字） as contents
from
    user_details ;
```

```
insert
    into user_details
values
    ('{"id":1,"post_id":1,"comment":"わかる"}') ,('{"id":2,"post_id":2,"comment":"ウケる"}') ,('{"id":3,"post_id":3,"comment":"神"}') ;
```

```
{
  "id": 1,
  "tags": [
    "book",
    "haskell"
  ],
  "title": "すごいH本読んだ",
  "created_at": "2015-08-16T14:10:02Z"
}
```
