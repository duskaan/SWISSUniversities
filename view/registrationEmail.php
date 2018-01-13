<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 16:59
 */
use view\TemplateView;

$this->organization
?>
<!DOCTYPE html>
<html>
<body>
<table class="table">

    <tbody>
    <tr>Hi <?php echo TemplateView::noHTML($organization) ?>  </tr>
    <tr>
        <td>Thank you for registration for the Swiss Study Portal</td>
    </tr>
    <tr>
        <td>Please contact us over our contact-form with any questions</td>
    </tr>

    <tr>
        <td>https://swissstudyportal.herokuapp.com/Contact</td>
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
<img src="https://swissstudyportal.herokuapp.com/assets/img/Logo.png" id="brand"
     style="padding-top:0px;margin-top:9px;margin-left:6px;size:100px"></a>
</body>
</html>