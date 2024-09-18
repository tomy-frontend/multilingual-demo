document.addEventListener("DOMContentLoaded", function () {
  const loadingElement = document.querySelector(".loading");
  const isFirstLoad = sessionStorage.getItem("isFirstLoad");

  if (loadingElement) {
    loadingElement.classList.add("active");
  }

  // 初回アクセス時の処理
  if (isFirstLoad !== "true") {
    // 3秒後にローディング画面を非表示にする
    setTimeout(function () {
      if (loadingElement) {
        loadingElement.classList.add("loaded");
      }
      sessionStorage.setItem("isFirstLoad", "true");
    }, 3000);
  } else {
    // 2回目以降のアクセス時の処理
    if (loadingElement) {
      loadingElement.classList.add("loaded");
    }
  }
});
