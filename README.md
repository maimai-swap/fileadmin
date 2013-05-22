File Explore
=========

Mac OSX File Explore

MacでFinderでsmbを見るときに遅いのでファイルを探すために作りました。

smbをmacにマウントしてその設定をapp/config/bootstrap/app.php
に設定すると動きます。

$ mkdir /Users/yours/Volumes/file02
$ mount_smbfs //username@example.com　/Users/yours/Volumes/file02

Setting
--------

app/config/bootstrap/app.php

    Environment::set('production',
        [
            // smbのマウントポイント
            'dir_top' => '/Users/yours/Volumes/fileshare',
            // smbのURL

            'dir_top_link' => 'smb://windows.domain.local/fileshare'
        ]
    );
