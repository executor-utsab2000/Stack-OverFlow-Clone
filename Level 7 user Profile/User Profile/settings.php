<style>
    input {
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 0.7rem 1rem;
        border: #bcb8b1 1px solid;
        outline: 0;
        border-radius: 10px;
        font-weight: 700;
        letter-spacing: 1px;
        font-size: 0.7rem;
    }

    .titleSub>p {
        margin-top: 1rem;
        line-height: 1px;
        font-size: 0.7rem;
        color: red;
        font-weight: 800;
    }

    .btnContainer {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .btnContainer .subBtnContainer {
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: 1rem;
        width: 30vw;
        min-width: 18rem;
        font-weight: 700;
        color: #6c757d;
        /* border: 2px solid black; */
        padding: 0.8rem;
        border-radius: 10px;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }

    .subBtnContainer .title {
        font-size: 0.8rem;
    }

    .subBtnContainer .titlDesc {
        font-size: 0.6rem;
    }

    .updatePassword button {
        min-width: 10rem;
        margin: 1rem;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 0.5rem;
        background-color: #ef233c;
        color: #ffd60a;
        border: 0;
    }

    .subBtnContainer button {
        min-width: 10rem;
        margin: 1rem;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.7rem;
        padding: 0.5rem;
        background-color: #ef233c;
        color: #ffd60a;
        border: 0;
    }
</style>


<div class="settingsTab">


    <div class="headerPanel">Settings</div>

    <div class="contentContainerBox">
        <div class="itemTitle">Change Password</div>
        <div class="itemDesc">
            <input type="text" name="updatePassword" placeholder="Enter your new Password">
            have provided.
        </div>
        <a href="" class="nav-link updatePassword">
            <button>Save Password</button>
        </a>
    </div>
</div>

<div class="contentContainerBox">
    <div class="itemTitle">Delete</div>
    <div class="itemTitle titleSub">
        <p> *Note :</p>
        <p>Once Deleted it cant be reversed</p>
    </div>

    <div class="btnContainer">
        <div class="subBtnContainer">
            <div class="title">Delete All Responses :</div>
            <div class="titlDesc">This will <span class="text-danger"> delete all responses( answers ) </span> you
                have provided.</div>
            <a href="./Backend/deleteAll.php?deleteCriteria=allAnswers" class="nav-link">
                <button>Delete</button>
            </a>
        </div>

        <div class="subBtnContainer">
            <div class="title">Delete All Enquiries :</div>
            <div class="titlDesc">
                <ul>
                    <li>This will <span class="text-danger"> delete all enquiries( questions ) </span> you have
                        provided.</li>
                    <li>On deleting all questions all answers in respect with the question will be deleted</li>
                </ul>
            </div>
            <a href="./Backend/deleteAll.php?deleteCriteria=allQuestions" class="nav-link">
                <button>Delete</button>
            </a>
        </div>

        <div class="subBtnContainer">
            <div class="title">Delete Account :</div>
            <div class="titlDesc">
                <ul>
                    <li>This will <span class="text-danger"> delete all records of you. Your record includes
                            <ul>
                                <li>Account Details</li>
                                <li>Questions You Enquired About</li>
                                <li>Answers you provided against the questions asked publicly </li>
                                <li>Questions you saved</li>
                                <li>Answers you saved</li>
                            </ul>
                    </li>
                </ul>
            </div>
            <a href="./Backend/deleteAll.php?deleteUser=accountDetails" class="nav-link">
                <button>Delete</button>
            </a>
        </div>

    </div>
</div>

</div>