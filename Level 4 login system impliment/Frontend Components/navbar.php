<style>
    .navBar {
        position: fixed;
        width: 100%;
        background-color: #f5f3f4 !important;
        padding: 1rem 0;
        z-index: 50;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .navBar .navbar-brand img {
        filter: drop-shadow(5px 5px 7px #000000);
        height: 4rem;
        width: auto;
    }

    .navBar .navbar-nav li>a {
        font-weight: 700;
        font-size: 0.8rem;
    }

    .navBar .navUserAvtar img {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }

    .navBar .navUserAvtar .dropdown-menu>li>a {
        font-weight: 700;
        font-size: 0.8rem;
    }

    .navBar .btnS {
        width: 8rem;
        margin: 0.3rem;
        font-weight: 700;
        letter-spacing: 1px;
        font-size: 0.8rem;
        background-color: #38b000;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        color: #073b4c;
    }
</style>


<div class="row">
    <div class="col-12 px-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navBar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="./Images/UI/Logo.png" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allQuestions.php  ">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Topics
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fa-brands fa-html5 me-2"></i>HTML 5</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa-brands fa-css3 me-2"></i>CSS</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-brands fa-react me-2"></i>React
                                        Js</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-brands fa-node me-2"></i>Node Js</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                    <span class="navNotLoggedIn d-none">
                        <a href="login_SignUp.php"> <button class="btn btn-outline-success btnS" type="click">Login</button></a>
                        <a href="login_SignUp.php"> <button class="btn btn-outline-success btnS" type="click">Sign Up</button></a>
                    </span>

                    <span class="nav-item dropdown d-none navUserAvtar">
                        <a class="nav-link userAvtar" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://i.pinimg.com/736x/09/24/a7/0924a7ef295741e916c8f42512bbe5bd.jpg" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./userProfile.php"><i class="fa-solid fa-user me-2"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="Backend/logOut.php"><i
                                        class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</a></li>
                        </ul>
                    </span>




                </div>
            </div>
        </nav>
    </div>
</div>


<script>
    $(document).ready(function () {

        const backendUrl = "./Backend/sessionUserAuth.php";

        $.get(backendUrl, function (data, status) {
            const datas = JSON.parse(data);
            console.log(datas);

            if (!datas.ifActive) {
                document.querySelector('.navNotLoggedIn').classList.remove('d-none')
            }
            else {
                document.querySelector('.navUserAvtar').classList.remove('d-none')
            }

        });
    });
</script>