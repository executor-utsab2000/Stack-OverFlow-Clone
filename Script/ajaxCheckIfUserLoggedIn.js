import { sessionUserAuth } from "./Components/sessionUserAuth.js";


$(document).ready(function(){

    const insertAnswerModalBtn= document.getElementById('insertAnswerModalBtn');
    console.log(insertAnswerModalBtn);

    insertAnswerModalBtn.addEventListener('click', ()=>{
        // $.get(
        //     "./Backend/sessionUserAuth.php" ,
        //     function(data , status){
        //         const datas= JSON.parse(data) ;
        //       console.log(datas.ifActive);
        //         if(datas.ifActive){
        //             return
        //         }
        //         else{
        //             location.href='index.php'
        //         }
        //     }
        // )
        sessionUserAuth('./index.php')
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
        $.get(
            "./Backend/sessionUserAuth.php" ,
            function(data , status){
                const datas= JSON.parse(data) ;
              console.log(datas.ifActive);
                if(datas.ifActive){
                    location.href = './questionAdd.php'
                }
                else{
                    location.href='index.php'
                }
            }
        )
        // sessionUserAuth('./index.php')
    })
})


// to get data from object  parse is needed