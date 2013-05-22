File World!

<a href="?act=UP">UP</a>
<br/>
NOW:<?php echo $pwd;?> <?php echo $this->html->link("OPEN in Finder", "?act=DOWNLOAD&file=" . urlencode($pwd));?>
<table>
    <tr>
        <th>Name</th>
        <th>is_dir</th>
    </tr>
<?php foreach( $files as $file ):?>
    <tr>
        <td>
            <?php
            if ($file["is_dir"] == true ) {
                $act = "LINK";
            } else {
                $act = "DOWNLOAD";
            }
            echo $this->html->link($file["name"],"?act=$act&file=". urlencode($file["name"]),array("hoge"=>"moge"));
            ?>
        </td>
        <td><?=$file["is_dir"] ?></td>
    </tr>
<?php endforeach ?>
</table>
