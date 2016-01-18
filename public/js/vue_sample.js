Vue.config.delimiters = ['(%', '%)'];
var user = new Vue({
    el: '#sample',
    data: {
        firstName: 'Taro',
        lastName: 'Yamada'
    },
    computed: {
        fullName: {
            get: function() {
                return this.firstName + ' ' + this.lastName;
            }
        }
    }
});
var vm = new Vue({
    el: '#app',
    data: {
        messageVue: 'おはようございます！！'
    }
});

var sample = new Vue({
    el: '#sample2',

    data: {
        newMessage: { name: '', message: '' },
        submitted: false
    },

    //動的なプロパティを生成するメソッドを持つオブジェクト。
    // methodsとの違いとして呼び出しに括弧を用いずプロパティであるかのようにアクセス出来る。
    // またgetやsetの定義が出来る
    computed: {
        errors: function() {
            for (var key in this.newMessage) {
                if ( ! this.newMessage[key]) return true;
            }

            return false;
        }
    },

    //ビューモデルに特定の状態が発生したときに実行されるコールバック関数の定義オプションです。
    //データバインドが完了した状態で実行される関数。$dataへのプロパティ追加は無視される
    ready: function(){
        this.fetchMessage();
    },

    // 動的な値をデータバインドする
    // [methods]
    // ビューモデルのメソッドを保持するオブジェクト。
    // methodsに限らないがビューモデル内で定義されたメソッド内でのthisはビューモデル自身を指す
    methods: {
        fetchMessage: function(){
            this.$http.get('/api/messages', function (messages) {
                //$get( keypath ) / $set( keypath, value )
                //$dataが保持するデータの取得/上書きを行う。

                /*
                 this.$http.get(URL, function (data, status, request) {
                 //GETメソッドが成功した場合の処理
                 }).error(function (data, status, request) {
                 //GETメソッドが失敗した場合の処理
                 })
                 }
                 */
                this.$set('message', messages)
            });

        },
        onSubmitForm: function(e) {
            e.preventDefault();

            var message = this.newMessage;

            this.messages.push(message);
            this.newMessage = { name: '', message: '' };
            this.submitted = true;

            this.$http.post('api/messages', message);
        }
    }
});


