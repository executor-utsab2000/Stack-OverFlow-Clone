import { sessionUserAuth } from "../Components/sessionUserAuth.js";

const currUrlInput = document.querySelectorAll('.currUrl');
console.log(currUrlInput); 
currUrlInput.forEach(elm => elm.value = location.href)



$(document).ready(function () {
  const saveAnswer = document.querySelectorAll(".saveAnswer");
  console.log(saveAnswer);

  saveAnswer.forEach((elm) => {
    elm.addEventListener("click", () => {
      // console.log(elm.parentNode.children[0]);
      const answerId = elm.parentNode.children[0].value;
      const questionId = window.location.href.split("?")[1];
      sessionUserAuth(
        `./Backend/Answer/answerBookMarked.back.php?answerId=${answerId}&questionId=${questionId}`
      );
    });
  });
});

// replace the questions part by answer
