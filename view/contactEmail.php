<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */
use view\TemplateView;

$this->name;
$this->message;
?>
<!DOCTYPE html>
<html>
<body>
<table class="table">

    <tbody>
    <tr>Hi <?php echo TemplateView::noHTML($name) ?>  </tr>
    <tr>
        <td>Thank you for contacting the Swiss Study Portal</td>
    </tr>
    <tr>
        <td>The message sent to Swiss Study Portal is: </td>
    </tr>

    <tr>
        <td><?php echo TemplateView::noHTML($message) ?></td>
    </tr>

    <tr>
        <td>Enjoy our website and kind regards,</td>
    </tr>

    <tr>
        <td>Your Swiss Study Portal Team</td>
    </tr>
    <tr>
        <td>-------------------------------------------------------------------------------------</td>
    </tr>
    </tbody>
</table>
<img src="https://swissstudyportal.herokuapp.com/assets/img/Logo_w_text_small.png" id="brand"
     style="padding-top:0px;margin-top:9px;margin-left:6px;size:100px"></a>
</body>
</html>