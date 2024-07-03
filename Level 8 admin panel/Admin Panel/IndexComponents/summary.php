<style>
    .summary .contentDivs {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    .summary .contentDivs .contentContainer {
        min-width: 18rem;
        margin: 1rem;
        display: flex;
        justify-content: space-between;
        max-width: 20rem;
    }

    .summary .contentDivs .contentContainer .imgContainer {
        margin: auto 0;
        padding: 20px;
        border-radius: 50%;
        background-color: #fcbf49;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .summary .contentDivs .contentContainer .imgContainer img {
        height: 30px;
        width: 30px;
    }

    .summary .contentDivs .contentContainer .header {
        color: #6c757d;
        font-size: 0.9rem;
        border-radius: 10px;
    }

    .summary .contentDivs .contentContainer .contentMatter {
        margin-top: 1rem;
        font-weight: 800;
        font-size: 1.6rem;
        text-align: center;
        color: red;
    }
</style>


<div class="subHeader">In a brief</div>
<div class="contentDivs my-2">

    <div class="contentContainer">
        <div class="imgContainer">
            <img src="../Images/UI/Admin/topic.png" class="img-fluid" alt="">
        </div>
        <div class="">
            <div class="header">Total Topics Available</div>
            <div class="contentMatter"><?php echo $totalTopicCount ?> </div>
        </div>
    </div>
    <div class="contentContainer">
        <div class="imgContainer">
            <img src="../Images/UI/Admin/user.png" class="img-fluid" alt="">
        </div>
        <div class="">
            <div class="header">Total Active Users </div>
            <div class="contentMatter"><?php echo $totalUsersCount ?> </div>
        </div>
    </div>
    <div class="contentContainer">
        <div class="imgContainer">
            <img src="../Images/UI/Admin/question.png" class="img-fluid" alt="">
        </div>
        <div class="">
            <div class="header">Total Questions Available</div>
            <div class="contentMatter"><?php echo $totalQuestionCount ?> </div>
        </div>
    </div>
    <div class="contentContainer">
        <div class="imgContainer">
            <img src="../Images/UI/Admin/answer.png" class="img-fluid" alt="">
        </div>
        <div class="">
            <div class="header">Total Answers Available</div>
            <div class="contentMatter"><?php echo $totalAnswerCount ?> </div>
        </div>
    </div>
    <div class="contentContainer">
        <div class="imgContainer">
            <img src="../Images/UI/Admin/qNaRatio.png" class="img-fluid" alt="">
        </div>
        <div class="">
            <div class="header">Question to Answer Ratio</div>
            <div class="contentMatter"><?php echo $questionAnswerRatio ?></div>
        </div>
    </div>

</div>