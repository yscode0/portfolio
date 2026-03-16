"use strict";
// DOMが読み込まれたら実行
document.addEventListener("DOMContentLoaded", function() {
  initCustomCursor();
  initBurgerMenu();
  initHeader()
  initFadeInAnimations();
  initSmoothScroll();
});

// カスタムカーソル
function initCustomCursor() {
  // タッチデバイスはスキップ
  if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;

  const cursor = document.querySelector('.js-cursor');
  const ring = document.querySelector('.js-cursor-ring');
  if (!cursor || !ring) return;
  let mx = 0, my = 0, rx = 0, ry = 0;

  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cursor.style.left = mx + 'px';
    cursor.style.top  = my + 'px';
  });

  let rafId;
  (function animRing() {
    rx += (mx - rx) * 0.04;
    ry += (my - ry) * 0.04;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';
    rafId = requestAnimationFrame(animRing);
  })();

  document.querySelectorAll('a, button, .p-top__about-skill-item').forEach(el => {
    el.addEventListener('mouseenter', () => document.body.classList.add('is-hove'));
    el.addEventListener('mouseleave', () => document.body.classList.remove('is-hove'));
  });
}

// ハンバーガーメニューの開閉制御
function initBurgerMenu() {
  const burgerButtons = document.querySelectorAll(".js-menu-toggle");
  const burgerMenu = document.querySelector(".js-menu");
  if (!burgerButtons.length || !burgerMenu) return;

  function openMenu() {
    document.body.classList.add("is-menu-open");
    burgerMenu.classList.add("is-open");
    burgerButtons.forEach(btn => {
      btn.classList.add("is-open");
      btn.setAttribute("aria-expanded", "true");
    });
  }

  function closeMenu() {
    document.body.classList.remove("is-menu-open");
    burgerMenu.classList.remove("is-open");
    burgerButtons.forEach(btn => {
      btn.classList.remove("is-open");
      btn.setAttribute("aria-expanded", "false");
    });
  }

  burgerButtons.forEach(btn => {
    btn.setAttribute("aria-expanded", "false");
    btn.addEventListener("click", () => {
      const isOpen = burgerMenu.classList.contains("is-open");
      isOpen ? closeMenu() : openMenu();
    });
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && burgerMenu.classList.contains("is-open")) {
      closeMenu();
    }
  });

  // メニュー外クリックで閉じる
  // document.addEventListener("click", (e) => {
  //   if (!burgerMenu.classList.contains("is-open")) return;
  //   const clickedInsideMenu = burgerMenu.contains(e.target);
  //   const clickedButton = [...burgerButtons].some(btn => btn.contains(e.target));
  //   if (!clickedInsideMenu && !clickedButton) closeMenu();
  // });
}

// スクロールに応じたヘッダー表示制御
// function initScrollHeader() {
//   const header = document.querySelector(".js-header");
//   const hero = document.querySelector(".js-hero");

//   if (!header || !hero) return;

//   const headerHeight = header.offsetHeight;

//   const observer = new IntersectionObserver(
//     (entries) => {
//       const entry = entries[0];
//       header.classList.toggle("is-active", !entry.isIntersecting);
//     },
//     {
//       rootMargin: `-${headerHeight}px 0px 0px 0px`
//     }
//   );

//   observer.observe(hero);
// }

// ヘッダー上スクロールで出現、下スクロールで消える
function initHeader() {
  const header = document.querySelector(".js-header");
  const hero = document.querySelector(".js-mv");

  if (!header || !hero) return;

  let lastScrollY = window.scrollY;

  /* hero監視 */
  const heroObserver = new IntersectionObserver((entries) => {
    const entry = entries[0];

    header.classList.toggle("is-active", !entry.isIntersecting);

  });

  heroObserver.observe(hero);

  /* スクロール方向 */
  window.addEventListener("scroll", () => {

    const currentScrollY = window.scrollY;

    if (currentScrollY > lastScrollY && currentScrollY > 100) {
      header.classList.add("is-hidden");
    } else {
      header.classList.remove("is-hidden");
    }

    lastScrollY = currentScrollY;

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

// スムーススクロール機能
function initSmoothScroll() {
  const header = document.querySelector(".js-header");

  document.addEventListener("click", (e) => {
    const link = e.target.closest('a[href^="#"]');
    if (!link) return;

    if (link.pathname !== location.pathname) return;

    const href = link.getAttribute("href");
    if (href === "#") return;

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();

    const headerOffset = header ? header.offsetHeight : 0;

    const targetPosition =
      target.getBoundingClientRect().top +
      window.scrollY -
      headerOffset;

    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    window.scrollTo({
      top: targetPosition,
      behavior: prefersReducedMotion ? "auto" : "smooth"
    });
  });
}