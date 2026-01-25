document.addEventListener("DOMContentLoaded", () => {
  let lastScroll = 0;
  const nav = document.querySelector("nav");
  const aboutSection = document.getElementById("about-us");

  let aboutTop = 0;
  if (aboutSection) {
    aboutTop = aboutSection.offsetTop - 100;
  }

  window.addEventListener("scroll", () => {
    const current = window.pageYOffset;

    
    if (current > lastScroll && current > 100) {
      nav.classList.add("hide");
    } else {
      nav.classList.remove("hide");
    }
    lastScroll = current;

    
    if (aboutSection && current >= aboutTop) {
      nav.classList.add("scrolled-about");
    } else {
      nav.classList.remove("scrolled-about");
    }
  });
});
