<style>
    .contentContainer {
        min-width: 350px;
        width: 100%;
    }

    .contentContainer .topicsContent .topicsTabs {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 0.5rem;
        border-radius: 10px;
    }

    .contentContainer .topicsContent .topicsTabs .details .editable {
        width: 100%;
        font-weight: 700;
        padding: 0.5rem;
        border: 0;
        outline: 0;
        background-color: transparent;
    }

    .contentContainer .topicsContent .topicsTabs .details .imgContainer {
        margin: auto;
    }

    .contentContainer .topicsContent .topicsTabs .details .imgContainer img {
        height: 70px;
        width: 70px;
        border-radius: 50%;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        object-fit: cover;
    }

    .contentContainer .topicsContent .topicsTabs .details .topicName {
        letter-spacing: 1px;
        font-size: 0.9rem;
        text-transform: capitalize;
        text-align: center;
    }

    .contentContainer .topicsContent .topicsTabs .details .topicDesc {
        margin-top: 0.5rem;
        width: 100%;
    }

    .contentContainer .topicsContent .topicsTabs .details .topicDesc textarea {
        font-size: 0.6rem;
        height: 100px;
        resize: none;
        overflow: scroll;
        /* Enables scrolling */
    }

    .contentContainer .topicsContent .topicsTabs .details .topicDesc ::-webkit-scrollbar {
        display: none !important;
    }

    .contentContainer .topicsContent .topicsTabs .otherInfo {
        padding: 0.5rem;
        width: 100%;
    }

    .contentContainer .topicsContent .topicsTabs .otherInfo .topicReqBy {
        text-align: center;
        border-bottom: 1px solid gray;
        padding-bottom: 0.6rem;
    }

    .contentContainer .topicsContent .topicsTabs .otherInfo .topicReqBy .userId {
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 0.7rem;
        color: red;
    }

    .contentContainer .topicsContent .topicsTabs .otherInfo .topicReqBy .userName {
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 0.7rem;
        color: gray;
    }

    .contentContainer .topicsContent .topicsTabs .otherInfo .dtTime {
        padding: 0.5rem;
        text-align: center;
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 0.7rem;
        color: red;
    }

    .contentContainer .topicsContent .iconAction {
        margin-top: 1.5rem;
        display: flex;
        justify-content: space-around;
    }

    .contentContainer .topicsContent .iconAction button i {
        font-size: 1.1rem;
    }


    /* user Content */


    .userContent .userTabs {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 0.5rem;
        border-radius: 10px;
    }

    .userContent .userTabs .iconUser {
        font-size: 1.2rem;
        margin: 0.5rem;
        color: red;
    }

    .userContent .userTabs .imgContainer {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }

    .userContent .userTabs .imgContainer img {
        height: 40px;
        width: 40px;
        aspect-ratio: 1.5;
        object-fit: contain;
    }

    .userContent .userTabs .subTabs {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin: 0.5rem;
        padding: 0.3rem;
        border-radius: 10px;
        text-align: center;
    }

    .userContent .userTabs .subTabs .text {
        font-size: 0.5rem;
        margin: 0.5rem 0;
        font-weight: 800;
        letter-spacing: 1px;
    }
</style>



<!-- --------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------- -->


<div class="col-lg-6 d-flex justify-content-center">
    <div class="contentContainer">
        <div class="subHeader">Topics</div>
        <div class="topicsContent">
            <?php

            while ($topicsData = mysqli_fetch_assoc($allTopics)) {
                $topicId = $topicsData['topic id'];
                $topicName = $topicsData['topic name'];
                $topicDesc = $topicsData['topic description'];
                $topicImage = $topicsData['topic avtar'];
                $userId = $topicsData['requested by user'];
                $username = $topicsData['username'];
                $dtTime = $topicsData['topic created at'];

                if ($userId == NULL) {
                    $userId = "Added by Admin";
                    $username = '';
                }

                ?>
                <div class="topicsTabs my-3">
                    <form action="./editTopic.back.php" method="post">
                        <input type="hidden" name="topicId" value="<?php echo $topicId ?>">
                        <div class="details">
                            <div class="row">
                                <div class="col-md-2 d-flex justfy-content-center">
                                    <div class=" imgContainer">
                                        <img src="../Images/Uploads/Topic/<?php echo $topicImage ?>" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="topicName">
                                        <input type="text" name="topicName" class="editable" readonly
                                            value="<?php echo $topicName ?>">
                                    </div>
                                    <div class="topicDesc">
                                        <textarea name="topicDesc" class="editable"
                                            readonly><?php echo $topicDesc ?> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justfy-content-center">
                                    <div class="otherInfo my-auto">
                                        <div class="topicReqBy">
                                            <div class="userId"><?php echo $userId ?></div>
                                            <div class="userName"><?php echo $username ?></div>
                                        </div>
                                        <div class="dtTime"><?php echo $dtTime ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="iconAction">
                            <button class="btn editTopic"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn deleteTopic"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- ----------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------- -->

<div class="col-lg-6 d-flex justfy-content-center">
    <div class="contentContainer">
        <div class="subHeader">Users</div>
        <div class="userContent">
            <?php

            while ($userData = mysqli_fetch_assoc($allUserData)) {

                $userId = $userData['userID'];
                $userName = $userData['username'];
                $userEmail = $userData['userEmail'];
                $userDob = $userData['userDob'];
                $userAvtar = $userData['userAvtar'];
                $ansCount = $userData['questionCount'];
                $questCount = $userData['answerCount'];

                if ($userAvtar == null) {
                    $userAvtar = "dummy.png";
                }

                ?>
                <div class="userTabs my-3 px-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="subTabs">
                                <div class="fa-solid fa-user iconUser"></div>
                                <div class="text"><?php echo $userId ?></div>
                            </div>
                            <div class="subTabs">
                                <div class="fa-solid fa-envelope iconUser"></div>
                                <div class="text"><?php echo $userEmail ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="subTabs">
                                <div class="fa-solid fa-at iconUser"></div>
                                <div class="text"><?php echo $userName ?></div>
                            </div>
                            <div class="subTabs">
                                <div class="fa-regular fa-calendar-days iconUser"></div>
                                <div class="text"><?php echo $userDob ?></div>
                            </div>
                        </div>

                        <div class="col-md-2 my-3 d-flex justify-content-around">
                            <div class="imgContainer my-auto">
                                <img src="../Images/Uploads/UserDp/<?php echo $userAvtar ?>" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="subTabs">
                                <div class="fa-regular fa-circle-question iconUser"></div>
                                <div class="text"><?php echo $ansCount ?></div>
                            </div>
                            <div class="subTabs">
                                <div class="fa-solid fa-comment-dots iconUser"></div>
                                <div class="text"><?php echo $questCount ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>





<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->


<script>
    const editTopic = document.querySelectorAll('.editTopic')
    console.log(editTopic);

    editTopic.forEach((editBtn) => {
        editBtn.addEventListener('click', (e) => {
            if (editBtn.innerHTML == '<i class="fa-solid fa-pen-to-square"></i>') {
                e.preventDefault();
                editBtn.innerHTML = '<i class="fa-solid fa-check"></i>'

                const editable = editBtn.parentNode.parentNode.querySelectorAll('.editable');
                // console.log(editable);

                editable.forEach((elm) => {
                    elm.removeAttribute('readonly')
                    elm.style.backgroundColor = '#faedcd'
                })

            }
            else {
                editBtn.innerHTML == '<i class="fa-solid fa-pen-to-square"></i>'
            }
        })
    });
</script>