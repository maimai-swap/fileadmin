File World!

<a href="index?act=STAY">BACK</a><br/>
NOW:<?php echo $pwd;?> <?php echo $this->html->link("Open in Finder",$pwd);?>
<table>
    <tr>
        <th>Name</th>
        <th>is_dir</th>
    </tr>
    <tr>
        <td>
            <?php echo $this->html->link($path, $path);?>
        </td>
    </tr>
</table>
