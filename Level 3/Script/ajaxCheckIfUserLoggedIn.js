import { sessionUserAuth } from "./Components/sessionUserAuth.js";
// ask a question btn

$(document).ready(function () {
  const askQuestionBtn = document.getElementById("askQuestionBtn");
  // console.log(askQuestionBtn);

  askQuestionBtn.addEventListener("click", () => {
    sessionUserAuth("./questionAdd.php");
  });
});

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

// insert Answer
$(document).ready(function () {
  const insertAnswer = document.getElementById("insertAnswer");
  // console.log(insertAnswer);

  insertAnswer.addEventListener("click", () => {
    const questionId = insertAnswer.previousElementSibling.value;
    // console.log(questionId);
    sessionUserAuth(`./insertAnswer.php?questionId=${questionId}`);
  });
});

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

// bokmarkQuestion

$(document).ready(function () {
  const saveQuestion = document.querySelectorAll(".saveQuestion");
  // console.log(saveQuestion);

  saveQuestion.forEach((elm) => {
    elm.addEventListener("click", () => {
      const questionId =
        elm.parentNode.parentNode.parentNode.parentNode.parentNode
          .firstElementChild.value;
      // console.log(questionId);
      sessionUserAuth(
        `./Backend/Question/questionBookMarked.back.php?questionId=${questionId}`
      );
    });
  });
});

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

// if logged in show edit delete section  to user =>question page => answer page

$(document).ready(function () {
  const editDeleteBtn = document.querySelectorAll(".editDeleteBtn");
  const backendUrl = "./Backend/sessionUserAuth.php";

  $.get(backendUrl, function (data, status) {
    const datas = JSON.parse(data);
    // console.log(datas);

    if (datas.ifActive) {
      editDeleteBtn.forEach((elm) => elm.classList.remove("d-none"));
    } else {
      return;
    }
  });
});

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
