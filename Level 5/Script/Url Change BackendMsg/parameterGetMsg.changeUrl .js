// if no parameter is present in url or no get request is pressnt in url

import closeBtnBackend from "../Components/closeBackendMsg.js";

document.getElementById("closeBtn").addEventListener("click", () => {
  closeBtnBackend("&", 0);
  // console.log(0);
});
