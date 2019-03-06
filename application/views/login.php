<div id="bodyLayer">
    <div class="loginLayer">
        <a href="/tourhere">x</a>
        <div class="loginContent">
            <div class="loginTop">
                <h2>Login</h2>
            </div>
            <form action="/auth/authenication" method="post">
                <div class="loginMain">
                   <input type="text" name="id" placeholder="아이디"><br>
                   <input type="password" name="pw" placeholder="비밀번호">
                    <input type="submit" value="로그인">
                </div>
                <div class="loginBottom">
                    <p>아직 회원이 아니세요?</p>
                    <a href="/auth/register">회원가입</a>
                </div>
            </form>
        </div>
    </div>
</div>