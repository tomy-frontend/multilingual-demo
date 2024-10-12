// 初回ロードアニメーション
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

// drawerの開閉
class DrawerMenu {
  constructor() {
    this.button = document.querySelector(".drawer__button");
    this.drawer = document.getElementById("navigation");
    this.focusableElements =
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    this.firstFocusableElement = null;
    this.lastFocusableElement = null;
    this.mediaQuery = window.matchMedia("(min-width: 768px)");

    this.init();
  }

  init() {
    if (this.button) {
      this.button.addEventListener("click", () => this.toggleDrawer());
    }
    document.addEventListener("keydown", (e) => this.handleKeyDown(e));
    this.mediaQuery.addEventListener("change", () => this.handleResize());
    this.setFocusableElements();
  }

  toggleDrawer() {
    if (!this.button) return;
    const isExpanded = this.button.getAttribute("aria-expanded") === "true";
    this.setDrawerState(!isExpanded);
  }

  setDrawerState(isOpen) {
    if (!this.button || !this.drawer) return;
    this.button.setAttribute("aria-expanded", isOpen);
    this.drawer.classList.toggle("is-active", isOpen);
    this.drawer.toggleAttribute("inert", !isOpen);

    if (isOpen) {
      this.lockScroll();
      this.setFocusableElements();
      if (this.firstFocusableElement) {
        this.firstFocusableElement.focus();
      }
    } else {
      this.unlockScroll();
      this.button.focus();
    }

    this.button.setAttribute(
      "aria-label",
      isOpen ? "メニューを閉じる" : "メニューを開く"
    );
  }

  setFocusableElements() {
    if (this.drawer) {
      const focusableContent = this.drawer.querySelectorAll(
        this.focusableElements
      );
      this.firstFocusableElement =
        focusableContent.length > 0 ? focusableContent[0] : null;
      this.lastFocusableElement =
        focusableContent.length > 0
          ? focusableContent[focusableContent.length - 1]
          : null;
    }
  }

  handleKeyDown(e) {
    if (!this.button) return;
    if (
      e.key === "Escape" &&
      this.button.getAttribute("aria-expanded") === "true"
    ) {
      this.setDrawerState(false);
    }

    if (this.button.getAttribute("aria-expanded") === "true") {
      const isTabPressed = e.key === "Tab";

      if (!isTabPressed) return;

      if (e.shiftKey) {
        if (document.activeElement === this.firstFocusableElement) {
          e.preventDefault();
          if (this.lastFocusableElement) {
            this.lastFocusableElement.focus();
          }
        }
      } else {
        if (document.activeElement === this.lastFocusableElement) {
          e.preventDefault();
          if (this.firstFocusableElement) {
            this.firstFocusableElement.focus();
          }
        }
      }
    }
  }

  handleResize() {
    if (!this.button) return;
    if (
      this.mediaQuery.matches &&
      this.button.getAttribute("aria-expanded") === "true"
    ) {
      this.setDrawerState(false);
    }
  }

  lockScroll() {
    document.body.style.overflow = "hidden";
  }

  unlockScroll() {
    document.body.style.overflow = "";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new DrawerMenu();
});

// headerスクロールイベント// scroll-effect.js
document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".header");
  let headerHeight = header.offsetHeight;
  let isScrolled = false;
  let lastScrollTop = 0;
  const scrollBuffer = 50; // スクロールのバッファー値

  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  const handleScroll = debounce(function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (!isScrolled && scrollTop > headerHeight + scrollBuffer) {
      header.classList.add("scrolled");
      isScrolled = true;
    } else if (isScrolled && scrollTop <= headerHeight) {
      header.classList.remove("scrolled");
      isScrolled = false;
    }

    lastScrollTop = scrollTop;
  }, 10); // 10ミリ秒のデバウンス

  window.addEventListener("scroll", handleScroll);

  // ウィンドウサイズが変更された場合にheaderHeightを更新
  window.addEventListener(
    "resize",
    debounce(function () {
      headerHeight = header.offsetHeight;
    }, 100)
  );
});
