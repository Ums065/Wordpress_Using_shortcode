// collaps card section
function toggleContent(contentId, sectionId, iconId) {
  const content = document.getElementById(contentId);
  const section = document.getElementById(sectionId);
  const icon = document.getElementById(iconId);

  const isHidden = content.classList.contains("hidden");

  if (isHidden) {
    // Open the content
    content.classList.remove("hidden");
    content.style.maxHeight = content.scrollHeight + "px"; // Smooth slide down
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-minus");
    section.style.backgroundColor = "#B9FF66"; // Change background to active color
  } else {
    // Close the content
    content.style.maxHeight = "0"; // Smooth slide up
    setTimeout(() => {
      content.classList.add("hidden");
    }, 300); // Wait for sliding animation to complete
    icon.classList.remove("fa-minus");
    icon.classList.add("fa-plus");
    section.style.backgroundColor = "#F3F3F3"; // Reset to idle color
  }
}

//   collaps end
// Slider
const slider = document.getElementById("slider");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");
const dotsContainer = document.getElementById("dots-container");

// Duplicate first and last slides for infinite effect
const slides = document.querySelectorAll(".slider-item");
const firstSlide = slides[0].cloneNode(true);
const lastSlide = slides[slides.length - 1].cloneNode(true);

slider.appendChild(firstSlide);
slider.insertBefore(lastSlide, slider.firstChild);

let slideWidth = slides[0].offsetWidth;
let currentIndex = 1;

// Create SVG dots dynamically
const dots = [];
for (let i = 0; i < slides.length; i++) {
  const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
  svg.setAttribute("width", "14");
  svg.setAttribute("height", "14");
  svg.setAttribute("viewBox", "0 0 14 14");
  svg.classList.add("dot");

  const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
  path.setAttribute(
    "d",
    "M7.0099 2.05941L14 0L11.9604 7.0099L14 14L7.0099 11.9604L0 14L2.05941 7.0099L0 0L7.0099 2.05941Z"
  );
  path.setAttribute("fill", i === 0 ? "#b9ff66" : "#888"); // Set initial fill color
  svg.appendChild(path);

  svg.dataset.index = i; // Add index for manual navigation
  dots.push(svg);
  dotsContainer.appendChild(svg);
}

// Update active dot
function updateActiveDot() {
  dots.forEach((dot, index) => {
    const path = dot.querySelector("path");
    path.setAttribute("fill", index === currentIndex - 1 ? "#b9ff66" : "white");
  });
}

// Set initial position
slider.scrollLeft = slideWidth * currentIndex;

// Move to the previous slide
prevButton.addEventListener("click", () => {
  if (currentIndex === 0) {
    slider.scrollLeft = slideWidth * slides.length;
    currentIndex = slides.length;
  } else {
    currentIndex--;
  }
  slider.scrollTo({
    left: slideWidth * currentIndex,
    behavior: "smooth",
  });
  updateActiveDot();
});

// Move to the next slide
nextButton.addEventListener("click", () => {
  if (currentIndex === slides.length + 1) {
    slider.scrollLeft = slideWidth;
    currentIndex = 1;
  } else {
    currentIndex++;
  }
  slider.scrollTo({
    left: slideWidth * currentIndex,
    behavior: "smooth",
  });
  updateActiveDot();
});

// Add manual navigation via SVG dots
dots.forEach((dot) => {
  dot.addEventListener("click", (e) => {
    const targetIndex = parseInt(e.target.closest("svg").dataset.index) + 1;
    currentIndex = targetIndex;
    slider.scrollTo({
      left: slideWidth * currentIndex,
      behavior: "smooth",
    });
    updateActiveDot();
  });
});

// Adjust slide width on resize
window.addEventListener("resize", () => {
  slideWidth = slides[0].offsetWidth;
  slider.scrollLeft = slideWidth * currentIndex;
});

// Loop slider when scrolling manually
slider.addEventListener("scroll", () => {
  if (slider.scrollLeft <= 0) {
    slider.scrollLeft = slideWidth * slides.length;
    currentIndex = slides.length;
  } else if (slider.scrollLeft >= slideWidth * (slides.length + 1)) {
    slider.scrollLeft = slideWidth;
    currentIndex = 1;
  }
});
