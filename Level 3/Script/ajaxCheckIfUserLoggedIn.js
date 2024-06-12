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

// delete question

$(document).ready(function () {
  const deleteQuestion = document.querySelectorAll(".deleteQuestion");
  // console.log(deleteQuestion);

  deleteQuestion.forEach((elm) => {
    elm.addEventListener("click", () => {
      const questionId =
        elm.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode
          .firstElementChild.value;
      // console.log(questionId);
      sessionUserAuth(
          `./Backend/Question/deleteQuestion.php?questionId=${questionId}`
        );
    });
  });
});

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

// delete question

$(document).ready(function () {
  const editQuestion = document.querySelectorAll(".editQuestion");
  // console.log(editQuestion);

  editQuestion.forEach((elm) => {
    elm.addEventListener("click", () => {
      const questionId =
        elm.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode
          .firstElementChild.value;
      console.log(questionId);
      // sessionUserAuth(
      //     `./Backend/Question/updateQuestion.php?questionId=${questionId}`
      //   );
    });
  });
});
