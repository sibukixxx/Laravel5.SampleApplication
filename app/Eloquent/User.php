<?php
namespace App\Eloquent;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'uid', 'email', 'password',
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // モデルのタイムスタンプを更新するかの指示
    //  @var bool
    public $timestamps = true;

    ##############
    # Eloquent のサンプルを以下に記載する##
    ##############

    // API集
    // http://qiita.com/yodatomato/items/50b4b202909e01aebe94

    /**
     * モデルと関連しているテーブル
     * テーブル名の指定（デフォルトの場合、他の名前を明示的に指定しない限り、
     * クラス名を複数形の「スネークケース」にしたものがテーブル名として使用されます。）
     *
     * @var string
     */
//    protected $table = 'my_flights';
//
// 複数代入する属性、つまり指定した属性だけでINSERTが出来る
// = 他の属性を入力する必要がない
// MassAssignment（update()に配列で渡して更新させるやり方。）を実施するときに、
// 更新してもよいカラム（fillable）
// 更新しないでほしいカラム（guarded）
//    protected $fillable = ['name'];
//    protected $guarded = ['price']; // $guardedはその逆；この例ではprice以外の全属性で複数代入ができます。


    // 人気のあるユーザーだけをクエリーするスコープ
    // @return \Illuminate\Database\Eloquent\Builder
    public function scopePopular($query)
    {
        return $query->where('votes', '>', 100);
    }

    // アクティブなユーザーだけをクエリーするスコープ
    // @return \Illuminate\Database\Eloquent\Builder
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeAddWhere( $query, $input )
    {
        foreach( $input as $key => $value ){
            if( empty( $value ) ) continue;
            switch( $key ){
                case 'pref':
                    $query->where( $key, '=', $value);
                    break;
            }
            return $query;
        }
    }

    // 使用方法： Model::addWhere( $input )->get()


}