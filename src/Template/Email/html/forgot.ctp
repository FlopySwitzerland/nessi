<p>Hello,</p>

<p>You — or someone pretending to be you — requested a password reset for your Nessi account.</p>

<p>You can set your new password by clicking on the big button.</p>

<table class="module" role="module" data-type="button" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" >
    <tr>
        <td style="padding: 0px 0px 50px 0px;" align="center" bgcolor="#ffffff">
            <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile">
                <tr>
                    <td align="center" style="-webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; font-size: 16px;" bgcolor="#1188e6">
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'reset', 'prefix' => false, 'plugin' => false, 'xxb'.$token.'bxx'], ['fullBase' => true]) ?>" class="bulletproof-button" target="_blank" style="height: px; width: px; font-size: 16px; line-height: px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; padding: 12px 18px 12px 18px; text-decoration: none; color: #ffffff; text-decoration: none; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; border: 1px solid #1e824c; display: inline-block;">Reset Your Password</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<p>If you don't want to reset your password, simply ignore this email and it will stay unchanged.</p>

<p>Sincerely,<br>
    The Nessi support team.</p>


