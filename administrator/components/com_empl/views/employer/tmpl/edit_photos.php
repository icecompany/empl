<?php
defined('_JEXEC') or die;
?>
<table>
    <tbody>
    <tr>
        <?php foreach ($this->files as $file) : ?>
            <td style="vertical-align: top;"><?php echo $file['image']; ?></td>
        <?php endforeach; ?>
    </tr>
    </tbody>
</table>