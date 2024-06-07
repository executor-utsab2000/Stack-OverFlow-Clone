

    export default function closeBtnBackend(seperator , arrayIndex){
        const newUrl = location.href.split(seperator)[arrayIndex]
        location.href = newUrl

    }

    // const closeBtn = document.getElementById('closeBtn');

    // closeBtn.addEventListener('click', () => {
    // })


