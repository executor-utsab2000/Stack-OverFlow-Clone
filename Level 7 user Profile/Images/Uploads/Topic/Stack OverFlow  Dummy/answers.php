<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/answers.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>

        <!-- --------------------------------------------------------------------------- -->

        <!-- insert answer modal start -->
        <div class="modal fade " id="insertAnswerModal" tabindex="-1" aria-labelledby="insertAnswerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="insertAnswerModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- insert answer modal end -->

        <div class="container allQuestions">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>


                <div class="col-lg-10 offset-lg-2 rightPanelAnswers">
                    <div class="insertDiv">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#insertAnswerModal"
                            id="insertAnswerModalBtn">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>

                    <!-- content -->
                    <div class="question">
                        <div class="questionTitle">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque delectus voluptate dolor
                            perspiciatis optio debitis saepe eveniet officiis iusto reiciendis! ?
                        </div>

                        <div class="questionIssueDesc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab incidunt quam quidem, expedita
                            in nemo totam sed sit laborum optio commodi quibusdam quia quos id recusandae, neque odit
                            veniam architecto exercitationem non? Vitae vel architecto asperiores exercitationem iste
                            repellendus eaque, cupiditate debitis sapiente fuga aliquid praesentium ut, officiis ipsa.
                            Aut dignissimos necessitatibus, libero itaque debitis laboriosam assumenda velit nihil
                            ipsum, delectus aliquam doloremque quibusdam similique, quia corporis temporibus cum tenetur
                            voluptas animi ad amet in illo? Consequatur eos praesentium numquam quidem deserunt
                            perferendis laboriosam autem animi? Minus quas impedit accusantium nesciunt, est modi, non
                            tempore harum nisi quae saepe praesentium!
                        </div>
                        <div class="userDetails d-flex justify-content-end pe-3">
                            <img src="./Images/UI/line.svg" alt="" class="line">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/028/794/707/small_2x/cartoon-cute-school-boy-photo.jpg"
                                alt="" class="userDp">
                            Excecutor
                        </div>
                        <div class="questionDetails">
                            <div class="questionDetailsSub">15 <i class="fa-regular fa-thumbs-up ms-1"></i> </div>
                            <div class="questionDetailsSub">20Answers </div>
                            <div class="questionDetailsSub">Asked At </div>
                            <div class="questionDetailsSub">Modified At </div>
                        </div>
                    </div>


                    <!-- answer repeatable part start-->
                    <div class="answerContent">
                        <div class="userDp">
                            <img src="https://i.pinimg.com/236x/5d/35/c3/5d35c3084cc6afc27479ba340f27dc15.jpg" alt="">
                        </div>
                        <div class="functions my-auto">
                            <i class="fa-regular fa-thumbs-up my-2"></i>
                            <i class="fa-regular fa-bookmark my-2"></i>
                        </div>
                        <div class="answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum dolore quo
                            laboriosam repellat velit aut iusto officia nostrum quidem veritatis, similique voluptatum,
                            enim alias vel. In commodi magni sapiente ad vel? Dolorem soluta temporibus laudantium
                            recusandae facere corrupti, qui reiciendis fuga harum laborum necessitatibus aliquam
                            perferendis incidunt nemo enim voluptas optio adipisci deleniti cum dolore fugiat? Sequi sed
                            nam, quidem ab consequatur tempore. Quasi error, magni aperiam maxime voluptatem omnis nisi
                            ut dolor distinctio placeat minus doloribus deserunt soluta excepturi ipsa quidem tenetur
                            ipsum non, eveniet dolorem. Harum magnam non voluptatem similique perferendis quisquam id
                            sapiente dolor magni, distinctio quam quaerat expedita aliquam dolorem. Eveniet, ad quis
                            deserunt inventore atque sequi eaque est, doloremque corrupti tempora ea praesentium maxime
                            enim corporis! Maxime reprehenderit voluptates hic provident sed laudantium quo iure
                            quibusdam. Assumenda voluptates corporis eum eius, est consequuntur magnam fuga delectus
                            veritatis sunt provident itaque iure fugit nam. Aspernatur consequuntur, labore mollitia at
                            asperiores rem officiis beatae, autem cumque repellat deleniti ullam voluptatem, nisi
                            aliquam. Sequi repellendus quae ea maiores vel vero, consectetur omnis. Perferendis odit
                            explicabo quia commodi. Numquam enim nostrum nemo incidunt, sit commodi temporibus. Nemo
                            placeat molestias ab odit, dolorum neque, corrupti dolore, animi ipsum minus quis.</div>
                    </div>
                    <!-- answer repeatable part end-->

                </div>
            </div>


        </div>





    </div>
</body>

<script  src="Script/ajaxCheckIfUserLoggedIn.script"></script>

</html>