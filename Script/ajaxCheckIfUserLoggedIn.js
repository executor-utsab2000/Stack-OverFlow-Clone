import { sessionUserAuth } from "./Components/sessionUserAuth.js";


$(document).ready(function(){

    const insertAnswerModalBtn= document.getElementById('insertAnswerModalBtn');
    console.log(insertAnswerModalBtn);

    insertAnswerModalBtn.addEventListener('click', ()=>{
        sessionUserAuth('./insertAnswer.php')
    })
})


// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------



// ask a question btn


$(document).ready(function(){

    const askQuestionBtn= document.getElementById('askQuestionBtn');
    console.log(askQuestionBtn);

    askQuestionBtn.addEventListener('click', ()=>{
        sessionUserAuth('./questionAdd.php')
    })
})


// to get data from object  parse is needed