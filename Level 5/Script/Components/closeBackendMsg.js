// alert close button function 


export default function closeBtnBackend(seperator, arrayIndex) {
  const newUrl = location.href.split(seperator)[arrayIndex];
  location.href = newUrl;
}
