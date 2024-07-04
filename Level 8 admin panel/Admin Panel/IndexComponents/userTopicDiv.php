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
                console.log(editable);

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