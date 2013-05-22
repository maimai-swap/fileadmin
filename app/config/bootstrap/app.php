<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ishimaru
 * Date: 2013/05/21
 * Time: 11:21
 * To change this template use File | Settings | File Templates.
 *
 * mount_smbfsでマウントしたファイルをブラウザでみる
 *
 * smbのマウントの方法はコレ↓
 * mkdir /Users/yours/Volumes/file02
 $ mount_smbfs //username@example.com　/mnt/example.com
 */
use lithium\core\Environment;

Environment::set('production',
    [
        // smbのマウントポイント
        'dir_top' => '/Users/yours/Volumes/fileshare',
        // smbのURL
        'dir_top_link' => 'smb://windows.domain.local/fileshare'
    ]
);
Environment::set('staging',
    [
        // マウントポイント
        'dir_top' => '/Volumes/fileshare-1',
        // smbのURL
        'dir_top_link' => 'smb://windows.domain.local/fileshare'
    ]
);
Environment::set('development',
    [
        // マウントポイント
        'dir_top' => '/Volumes/fileshare-1',
        // smbのURL
        'dir_top_link' => 'smb://windows.domain.local/fileshare'
    ]
);