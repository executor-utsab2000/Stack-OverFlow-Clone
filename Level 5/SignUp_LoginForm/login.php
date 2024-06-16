<div class="loginContainer">
    <form action="./Backend/Login Signup/login.back.php" method="post">
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Email : </label>
            <input class="inputs" type="text" name="email" placeholder="Enter Your Email">
        </div>
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Password : </label>
            <input class="inputs" type="text" name="password" placeholder="Enter Your Email">
        </div>
        <div class="inputContainer mb-4">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

<!-- forget Password -->
<div class="forgetPassword">
    <a href="" class="nav-link">
        Unable to remember Password ? Click here...
    </a>
</div>


<script>

    const loginForm = document.querySelector('.loginContainer > form')
    const loginInputFields = loginForm.querySelectorAll('.inputs')

    loginForm.addEventListener('submit', (e) => {
        for (let i = 0; i < loginInputFields.length; i++) {
            if (loginInputFields[i].value.trim().length == 0) {
                e.preventDefault();
                const alertMsg = loginInputFields[i].previousElementSibling.innerText.split(':')[0]
                console.log(alertMsg);
                alert(alertMsg);
                break;
            }
        }
    })

</script>