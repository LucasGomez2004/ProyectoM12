const container = document.querySelector(".container");
//const menuIcon = document.querySelector(".menu-icon");
const headingRight = document.querySelector(".main-heading-right");
const headingLeft = document.querySelector(".main-heading-left");

/*menuIcon.addEventListener("click", () => {
  container.classList.toggle("navigate");
});*/

const responsiveDesign = () => {
  if (window.innerWidth <= 700) {
    headingRight.style.display = "none";
    headingLeft.textContent = "ESCAPE OR DIE";
  } else {
    headingRight.style.display = "block";
    headingLeft.textContent = "ESCAPE";
  }
};

window.addEventListener("resize", () => {
  responsiveDesign();
});

setTimeout(function() {
  document.getElementById('status-message').style.opacity = '0';
  setTimeout(function() {
      document.getElementById('status-message').style.display = 'none';
  }, 2000);
}, 3000);

responsiveDesign();