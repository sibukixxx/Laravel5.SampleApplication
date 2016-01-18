<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-size: 24px;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Laravel5.1</div>
        <div class="quote">{{ Inspiring::quote() }}</div>
    </div>
    <div id="app">
        <div v-text="messageVue"></div>
        <p>(%messageVue%)</p>
    </div>
    <div id="sample">
        <div v-text="fullName"></div>
    </div>

    <div id="guestbook">
        <form method="POST" v-on="submit: onSubmitForm">

            <div class="form-group">
                <label for="name">
                    Name:
                    <span class="error" v-if="! newMessage.name">*</span>
                </label>
                <input type="text" name="name" id="name" class="form-control" v-model="newMessage.name">
            </div>

            <div class="form-group">
                <label for="message">
                    Message:
                    <span class="error" v-if="! newMessage.message">*</span>
                </label>
                <textarea type="text" name="message" id="message" class="form-control"
                          v-model="newMessage.message"></textarea>
            </div>

            <div class="form-group" v-if="! submitted">
                <button type="submit" class="btn btn-default" v-attr="disabled: errors">
                    Sign Guestbook
                </button>
            </div>

            <div class="alert alert-success" v-if="submitted">Thanks!</div>
        </form>
        <input type="search" name="" id=""/>
    </div>

</div>
</body>


<script src="http://cdn.jsdelivr.net/vue/latest/vue.js"></script>
<script src="/js/vue_sample.js"></script>


</html>


