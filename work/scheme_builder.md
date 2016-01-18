// コマンド	説明
$table->bigIncrements('id');	BIGINTを使用した自動増分ID
$table->bigInteger('votes');	BIGINTカラム
$table->binary('data');	BLOBカラム
$table->boolean('confirmed');	BOOLEANカラム
$table->char('name', 4);	CHARカラム
$table->date('created_at');	DATEカラム
$table->dateTime('created_at');	DATETIMEカラム
$table->decimal('amount', 5, 2);	有効／小数点以下桁数指定のDECIMALカラム
$table->double('column', 15, 8);	15桁、小数点以下８桁のDOUBLEカラム
$table->enum('choices', ['foo', 'bar']);	ENUMカラム
$table->float('amount');	FLOATカラム
$table->increments('id');	自動増分ID（主キー）
$table->integer('votes');	INTEGERカラム
$table->json('options');	JSONフィールド
$table->jsonb('options');	JSONBフィールド
$table->longText('description');	LONGTEXTカラム
$table->mediumInteger('numbers');	MEDIUMINTカラム
$table->mediumText('description');	MEDIUMTEXTカラム
$table->morphs('taggable');	INTERGERのtaggable_idと文字列のtaggable_typeを追加
$table->nullableTimestamps();	NULL値を許す以外、timestamps()と同じ
$table->smallInteger('votes');	SMALLINTカラム
$table->tinyInteger('numbers');	TINYINTカラム
$table->softDeletes();	ソフトデリートのためのdeleted_atカラム追加
$table->string('email');	VARCHARカラム
$table->string('name', 100);	長さ指定のVARCHARカラム
$table->text('description');	TEXTカラム
$table->time('sunrise');	TIMEカラム
$table->timestamp('added_on');	TIMESTAMPカラム
$table->timestamps();	created_atとupdate_atカラムの追加
$table->rememberToken();	VARCHAR(100) NULLのremember_tokenを追加
->nullable()	カラムにNULL値を許す
->default($value)	カラムのデフォルト値設定
->unsigned()	INTEGERを符号なしにする
// index
$table->index('state');
// 外部キー
$table->integer('user_id')->unsigned();
$table->foreign('user_id')->references('id')->on('users');

$table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');
      
      
// 複合プライマリキー設定
$table->unique(['following_user_id', 'followed_user_id']);
            
// 削除
$table->dropForeign('posts_user_id_foreign');


// 存在しているテーブルの名前を変更
Schema::rename($from, $to);

// カラム変更
Schema::table('users', function($table)
{
    $table->string('name', 50)->change();
});
// カラムにNULLを許す(NULLABLE)
Schema::table('users', function($table)
{
    $table->string('name', 50)->nullable()->change();
});


// カラム名変更
Schema::table('users', function($table)
{
    $table->renameColumn('from', 'to');
});

// 存在チェック
if (Schema::hasTable('users'))
{
    //テーブルの存在確認
}

if (Schema::hasColumn('users', 'email'))
{
    //カラムの存在確認
}

$table->dropPrimary('users_id_primary');	"users"テーブルから主キーを削除
$table->dropUnique('users_email_unique');	"users"テーブルからユニークキーを削除
$table->dropIndex('geo_state_index');	"geo"テーブルから基本インデックスを削除

$table->dropTimestamps();	created_atとupdate_atカラムの削除
$table->dropSoftDeletes();	deleted_atカラムの削除