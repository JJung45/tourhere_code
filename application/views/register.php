<div id="bodyLayer">
    <?php
    echo validation_errors();
    ?>
    <div class="loginLayer">
        <a href="/index.php/tourhere">x</a>
        <div class="loginContent">
            <div class="loginTop">
                <h2>Register</h2>
            </div>
            <form action="/index.php/auth/register" method="post">
                    <input type="text" name="name" placeholder="이름" value="<?php echo set_value('name'); ?>" style="margin-bottom: 30px;margin-top: 40px;"><br>
                    <input type="text" name="id" placeholder="아이디"  value="<?php echo set_value('id'); ?>" style="margin-bottom: 30px;"><br>
                    <input type="password" name="pw" placeholder="비밀번호"  value="<?php echo set_value('pw');?>" style="margin-bottom: 30px;">
                     <input type="password" name="re_pw" placeholder="비밀번호 확인"  value="<?php echo set_value('re_pw');?>" style="margin-bottom: 20px;">
                <div class="loginBottom">
                    <input type="submit" value="회원가입" style="height: 30px;">
                </div>
            </form>
        </div>
    </div>
</div>