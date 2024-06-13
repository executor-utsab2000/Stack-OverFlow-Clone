import { sessionUserAuth } from "../Components/sessionUserAuth.js";

const currUrlInput = document.querySelectorAll(".currUrl");
console.log(currUrlInput);
currUrlInput.forEach((elm) => (elm.value = location.href));

$(document).ready(function () {
  const saveAnswer = document.querySelector(".saveAnswer");
  console.log(saveAnswer);

  const questionId = document.getElementById("questionId").value;
  const answerId = document.getElementById("answerId").value;
  saveAnswer.addEventListener("click", () => {
    sessionUserAuth(
      `./Backend/Answer/answerBookMarked.back.php?answerId=${answerId}&questionId=${questionId}`
    );
  });
});

// replace the questions part by answer
