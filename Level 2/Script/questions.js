import { sessionUserAuth } from "./Components/sessionUserAuth.js";
// ask a question btn

$(document).ready(function () {
  const saveQuestion = document.querySelectorAll(".saveQuestion");
  console.log(saveQuestion);

  saveQuestion.forEach((elm) => {
    elm.addEventListener("click", () => {
      const questionId = elm.parentNode.parentNode.firstElementChild.value;
    //   console.log(questionId);
      sessionUserAuth(`./Backend/Question/questionBookMarked.back.php?questionId=${questionId}`)
    });
  });
});
