<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/allQuestions.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>

        <!-- --------------------------------------------------------------------------- -->

        <div class="container allQuestions">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>


                <div class="col-lg-10 offset-lg-2 rightPanel">

                    <!-- header Section -->
                    <div class="headerSection">
                        <div class="subHeaderSection">
                            <div>
                                <div class="header1">all questions</div>
                                <div class="header2">
                                    <span class="text-danger"> <?php echo $totalQuestions ?></span>
                                    Questions
                                </div>
                            </div>

                            <div class="my-auto">
                                <div class="questionBtn my-2">
                                    <button class="btn" id="askQuestionBtn">Ask a Question <i
                                            class="fa-solid fa-question ms-1"></i>
                                    </button>
                                </div>
                                <div class="filter my-2">
                                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#filter"
                                        aria-expanded="true" aria-controls="filter">Filter</button>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------- -->
                        <div class="accordion" id="filterAccordian">
                            <div class="accordion-item">
                                <div id="filter" class="accordion-collapse collapse" data-bs-parent="#filterAccordian">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <!-- to impliment ajax to filter rows -->

                                            <div class="col-sm-3">
                                                <div class="filterHeader">Topics : </div>
                                                <div class="filterOptions">

                                                    <?php

                                                    while ($filtertopics = mysqli_fetch_assoc($QueryExec1)) {
                                                        $topicName = $filtertopics['topic name'];

                                                        echo '
                                                                <div class="items my-2">
                                                                <input type="radio" name="topic" id="' . $topicName . '" value="' . $topicName . '">
                                                                <label for="' . $topicName . '">' . $topicName . '</label>
                                                            </div>';
                                                    }

                                                    ?>

                                                </div>
                                            </div>


                                            <div class="col-sm-3">
                                                <div class="filterHeader">Sort By : </div>
                                                <div class="filterOptions">

                                                    <div class="items my-2">
                                                        <input type="radio" name="timePosted" id="react" value="react">
                                                        <label for="react">Recently Posted</label>
                                                    </div>
                                                    <div class="items my-2">
                                                        <input type="radio" name="timePosted" id="react" value="react">
                                                        <label for="react">Newer First</label>
                                                    </div>
                                                    <div class="items my-2">
                                                        <input type="radio" name="timePosted" id="react" value="react">
                                                        <label for="react">Older First</label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-sm-3">
                                                <div class="filterHeader">Answers : </div>
                                                <div class="filterOptions">

                                                    <div class="items my-2">
                                                        <input type="radio" name="answerNumber" id="react"
                                                            value="react">
                                                        <label for="react">No Answers</label>
                                                    </div>
                                                    <div class="items my-2">
                                                        <input type="radio" name="answerNumber" id="react"
                                                            value="react">
                                                        <label for="react">Most Answers</label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-sm-3">
                                                <div class="filterHeader">Between : </div>
                                                <div class="filterOptions">

                                                    <div class="items my-2">
                                                        <label for="startDate">Start Date</label>
                                                        <input type="date" name="periodBetween" id="startDate">
                                                    </div>
                                                    <div class="items my-2">
                                                        <label for="endDate" class="me-2">End Date</label>
                                                        <input type="date" name="periodBetween" id="endDate">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center justify-content-lg-end">
                                                <button class="btn filterClearBtn" id="filterClearBtn">Clear
                                                    Filter</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--------------------- header section complete ---------------------------------->

                    <!-- questions container start  -->

                    <div class="row questionContainer">
                        <div class="col-12 my-2">
                            <div class="row">
                                <div class="col-2 questionsleftPanel">
                                    <div class="my-2">0 Answers</div>
                                    <div class="my-2">0 Likes</div>
                                    <d-v class="my-auto"><i class="fa-regular fa-bookmark me-2"></i>Save Question </d-v>
                                </div>
                                <div class="col-10">
                                    <div class="questionTitle">
                                        <a href="answers.php?questionId=5" class="nav-link">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
                                            dignissimos
                                            velit nam libero incidunt possimus ad quod repudiandae est necessitatibus ?
                                        </a>
                                    </div>
                                    <div class="questionIssue">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. In incidunt vero nam
                                        voluptas quibusdam non asperiores debitis mollitia adipisci accusantium?
                                        Exercitationem sequi minus earum facilis corrupti, laudantium accusantium
                                        libero, dicta doloremque suscipit, aut expedita beatae impedit quae consectetur?
                                        Harum, nemo vitae ullam porro perferendis dolorum soluta voluptate libero amet
                                        a.
                                    </div>
                                    <div class="userDiv_time d-flex justify-content-lg-end justify-content-center">
                                        <img src="https://img.freepik.com/free-vector/cheerful-boy-cartoon-hoodie-sitting-wooden-log_1308-158147.jpg"
                                            alt="" class="img-fluid">
                                        <span class="my-auto"><span class="text-danger pe-2">Executor </span> asked 11
                                            mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- questions container end  -->
                </div>
            </div>


        </div>





    </div>
    <script src="Script/ajaxCheckIfUserLoggedIn.script"></script>
</body>

</html>