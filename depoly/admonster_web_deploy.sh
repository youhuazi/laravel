# jenkinsの項目パス
    #export PROJ_PATH=`pwd`
#テスト環境の項目パス
#export WORKSPACE_PATH=/data
#手順
#slack送信デプロイをはじめます
# すべてのコンテナを停止にする　[docker stop $(docker ps -aq)]
docker stop $(docker ps -aq)
#以前のソースを削除する　[rm  -f $WORKSPACE_PATH/*]
rm  -f $WORKSPACE_PATH/*
#更新したソースをテスト環境パスにcopyする [cp -r $PROJ_PATH/laravel/*  $WORKSPACE_PATH]
cp -r $PROJ_PATH/laravel/*  $WORKSPACE_PATH
#すべてのコンテナを立ち上がる [docker run $(docker ps -aq)]
docker run $(docker ps -aq)
#　コンテナに入る
docker exec -it laradock_workspace_1 bash
#　マイグレーションを更新する
php artisan migrate
#言語ファイルを生成する
php artisan vue-i18n:generate
#定数ファイルを生成する
php artisan const:generate
#quit
exit
#デプロイ結果をメールで通知する
#デプロイ結果をslack通知する