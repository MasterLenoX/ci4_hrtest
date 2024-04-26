<p>Dear <?= $mail_data['user']->name ?> </p><br><br>
<p>

  Your password on CI4Blog system was changed successfully. Here are your new login below:
  <br><br>
  <b>Login Username: </b><?= $mail_data['user']->username ?> or <?= $mail_data['user']->email ?>
  <br><br>
  <b>Password: </b><?= $mail_data['new_password'] ?>
</p>
<br><br>
Please, keep your credentials <b>CONFIDENTIAL</b>. your username and password are your own credentials and you should never share with anybody else.
<p>
  CI4Blog or SampleDashbaordCI4Blog will not be responsible and liable for any misuse of your username and password. 
</p>
<br>
====================================================================================================================
<br>
<p>
  This email was automatically sent by CI4Blog system. <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&pp=ygUjcmljayBhc3RsZXkgbmV2ZXIgZ29ubmEgZ2l2ZSB5b3UgdXA%3D" target="_blank"  style="color:#22cb66;"> Do NOT REPLY IT.</a> 
</p>