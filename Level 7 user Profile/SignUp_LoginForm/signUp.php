<div class="signUpContainer">
    <form action="Backend/Login Signup/register.back.php" method="post">
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Email : </label>
            <input class="inputs" type="text" name="email" placeholder="Enter Your Email   eg. xyz@gmail.com">
        </div>
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Name : </label>
            <input class="inputs" type="text" name="name" placeholder="Enter Your Name  eg. John Doe">
        </div>
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Date of Birth : </label>
            <input class="inputs" type="date" name="dob" placeholder="Enter Your Date of Birth">
        </div>
        <div class="inputContainer mb-4">
            <label for="email">Enter Your Password : </label>
            <input class="inputs" type="Password" name="password" placeholder="Enter Your Password">
        </div>
        <div class="inputContainer mb-4">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>



<script>

    const signupForm = document.querySelector('.signUpContainer > form')
    const signUpInputFields = signupForm.querySelectorAll('.inputs')
    console.log(signUpInputFields);


    signupForm.addEventListener('submit', (e) => {
        for (let i = 0; i < signUpInputFields.length; i++) {
            if (signUpInputFields[i].value.trim().length == 0) {
                e.preventDefault();
                const alertMsg = signUpInputFields[i].previousElementSibling.innerText.split(':')[0]
                console.log(alertMsg);
                alert(alertMsg);
                break;
            }
        }
    })

</script>