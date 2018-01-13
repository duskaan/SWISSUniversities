<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 13.01.2018
 * Time: 20:49
 */
use view\TemplateView;

$this->university
?>
<!DOCTYPE html>
<html>
<body>
<table class="table">

    <tbody>
    <tr>Hi <?php echo TemplateView::noHTML($university->getOrganization()) ?>  </tr>

    <tr>
        <td>Please use the link bellow to set your new password</td>
    </tr>

    <tr>
        <td>https://swissstudyportal.herokuapp.com/ForgotPasswordSet?id=<?php echo TemplateView::noHTML($university->getIDuniversity());?></td>
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