export function sessionUserAuth(redirectLocation) {
  const backendUrl = "./Backend/sessionUserAuth.php";

  $.get(backendUrl, function (data, status) {
    const datas = JSON.parse(data);
    console.log(datas);
    if (datas.ifActive) {
      return;
    } else {
      location.href = redirectLocation;
    }
  });
}

// export { sessionUserAuth };
