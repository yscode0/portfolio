"use strict";
// DOMが読み込まれたら実行
document.addEventListener("DOMContentLoaded", function() {
  initBurgerMenu();
  initHeader()
  initFadeInAnimations();
  initAccordion();
});

// ハンバーガーメニューの開閉制御
function initBurgerMenu() {
  const burgerButtons = document.querySelectorAll(".js-menu-toggle");
  const burgerMenu = document.querySelector(".js-menu");
  if (!burgerButtons.length || !burgerMenu) return;

  function updateMenuButtonState(isOpen) {
    burgerButtons.forEach(btn => {
      btn.classList.toggle("is-open", isOpen);
      btn.setAttribute("aria-expanded", String(isOpen));
      btn.setAttribute("aria-label", isOpen ? "メニューを閉じる" : "メニューを開く");
    });
  }

  function openMenu() {
    document.body.classList.add("is-menu-open");
    burgerMenu.classList.add("is-open");
    updateMenuButtonState(true);
  }

  function closeMenu() {
    document.body.classList.remove("is-menu-open");
    burgerMenu.classList.remove("is-open");
    updateMenuButtonState(false);
  }

  updateMenuButtonState(burgerMenu.classList.contains("is-open"));

  burgerButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      const isOpen = burgerMenu.classList.contains("is-open");
      isOpen ? closeMenu() : openMenu();
    });
  });

  burgerMenu.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && burgerMenu.classList.contains("is-open")) {
      closeMenu();
    }
  });
}

// ヘッダー上スクロールで出現、下スクロールで消える
function initHeader() {
  const header = document.querySelector(".js-header");
  const hero = document.querySelector(".js-mv");
  if (!header || !hero) return;

  let lastScrollY = window.scrollY;
  let ticking = false;

  const heroObserver = new IntersectionObserver((entries) => {
    // rAFに包んでclassListの書き込みを描画タイミングに合わせる
    requestAnimationFrame(() => {
      header.classList.toggle("is-active", !entries[0].isIntersecting);
    });
  });
  heroObserver.observe(hero);

  window.addEventListener("scroll", () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(() => {
      const currentScrollY = window.scrollY;
      if (currentScrollY > lastScrollY && currentScrollY > 100) {
        header.classList.add("is-hidden");
      } else {
        header.classList.remove("is-hidden");
      }
      lastScrollY = currentScrollY;
      ticking = false;
    });
  });
}

// フェードインアニメーション
function initFadeInAnimations() {
  const fadeElements = document.querySelectorAll(".js-fade");
  if (!fadeElements.length) return;

  if (!("IntersectionObserver" in window)) {
    fadeElements.forEach(el => el.classList.add("is-show"));
    return;
  }

  const options = {
    threshold: 0.2,
    rootMargin: "0px 0px -50px 0px"
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-show");
        observer.unobserve(entry.target);
      }
    });
  }, options);

  fadeElements.forEach(el => observer.observe(el));
}

// アコーディオン
function initAccordion() {
  const triggers = document.querySelectorAll(".js-accordion-trigger");
  if (!triggers.length) return;

  function toggleAccordion(trigger) {
    const body = document.getElementById(trigger.getAttribute("aria-controls"));
    if (!body) return;

    const isOpen = trigger.classList.contains("is-open");

    // 他を閉じる（1つだけ開く場合）
    // triggers.forEach(t => {
    //   t.classList.remove("is-open");
    //   t.setAttribute("aria-expanded", "false");
    //   document.getElementById(t.getAttribute("aria-controls")).classList.remove("is-open");
    // });

    trigger.classList.toggle("is-open", !isOpen);
    trigger.setAttribute("aria-expanded", String(!isOpen));
    body.classList.toggle("is-open", !isOpen);
  }

  triggers.forEach(trigger => {
    trigger.addEventListener("click", () => {
      toggleAccordion(trigger);
    });

    trigger.addEventListener("keydown", (e) => {
      if (e.key !== "Enter" && e.key !== " ") return;

      e.preventDefault();
      toggleAccordion(trigger);
    });
  });
}
