<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ONE DIMENSION</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>

@font-face {
    font-family: "Monotype Old English Text W01";
    src: url("fonts/txt2.ttf");
 
}

@font-face {
    font-family: "Kanit";
    src: url("fonts/Kanit-Black.ttf");
 
}

@font-face {
  font-family: "drg";
  src:url("fonts/ddtt11.woff") ;
}
/* Styling for the dragon */
/* Dragon styling */
#moving-dragon {
  width: 200px; /* Dragon size */
  height: auto; /* Maintain aspect ratio */
  position: absolute; /* Free positioning */
  top: 50%; /* Initial position */
  left: 50%; /* Initial position */
  transform: translate(-50%, -50%); /* Centered */
  transition: top 0.5s ease, left 0.5s ease; /* Smooth movement */
  cursor: pointer; /* Indicates interactivity */
}

/* Keyframes for dragon's movement */
    /* Smooth scroll behavior for the page */
    html {
      scroll-behavior: smooth;
    }
  
    /* Animation for rotating an element */
    @keyframes rotateY {
      from {
        transform: rotateY(0deg);
      }
      to {
        transform: rotateY(360deg);
      }
    }
  
    /* Applying the rotation animation to elements with this class */
    .rotateY-animation:hover {
      animation: rotateY 2s linear infinite; /* Rotates every 2 seconds infinitely */
      transform-style: preserve-3d; /* Ensures 3D perspective is applied */
    }
    .splash-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
        }

      
  </style>
  

</head>
<body class="w-full " >

  <!-- Loading Screen -->
  <div id="loading-screen" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: black; z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <video id="loading-video" autoplay muted playsinline style="width: 100%; height: auto;">
      <source src="/loading/loading.mp4" type="video/mp4">
      <source src="/loading/loading.webm" type="video/webm">
      Your browser does not support the video tag.
    </video>
  </div>

  <!-- First Section: Carousel and Header -->
  <x-home-page :carouselImages='$carouselImages'></x-home-page>

  

  <!-- Second Section: Hello World -->
  <section class="w-full h-screen bg-gray-200 flex flex-col" style="display: none;">
    <!-- Full-width container -->
    <div id="container" class="flex flex-col w-full h-full">
      <!-- Links Section -->
      <div id="links" class="grid grid-cols-4 max-md:grid-cols-2 w-full h-1/3 max-md:h-2/3">

        <!-- Link 4 -->
        <a href="/" class="flex flex-col items-center justify-center bg-[url('/navimages/schedule.webp')] bg-cover bg-center relative" style="perspective: 1000px;">
testing now
        </a>
          
        <!-- Link 1 -->
        <a href="/menu/Drinks" class="flex flex-col items-center justify-center text-white bg-[url('/activities/menu.webp')] bg-cover bg-center relative">
          <div class="absolute inset-0 bg-green-600 opacity-65"></div>
          <img src="icon/menu.svg" alt="Menu" class="w-32 h-32 relative rotateY-animation" style="transform-style: preserve-3d;">
        </a>
  
        <!-- Link 2 -->
        <a href="/activity" class="flex flex-col items-center justify-center text-white bg-[url('/navimages/activities.webp')] bg-cover bg-center relative">
          <div class="absolute inset-0 bg-yellow-600 opacity-65"></div>
          <img src="icon/activities.svg" alt="Activities" class="w-32 h-32 relative rotateY-animation" style="transform-style: preserve-3d;">
        </a>
  
        <!-- Link 3 -->
        <a href="/boardgames" class="flex flex-col items-center justify-center bg-[url('/navimages/boardgames.webp')] bg-cover bg-center relative">
          <div class="absolute inset-0 bg-red-600 opacity-65"></div>
          <img src="icon/boardgame.svg" alt="Board Games" class="w-32 h-32 relative rotateY-animation" style="transform-style: preserve-3d;">
        </a>
  
        <!-- Link 4 -->
        <a href="/schedule" class="flex flex-col items-center justify-center bg-[url('/navimages/schedule.webp')] bg-cover bg-center relative" style="perspective: 1000px;">
          <div class="absolute inset-0 bg-blue-600 opacity-65"></div>
          <img src="icon/schedule.svg" alt="Schedule" class="w-32 h-32 relative rotateY-animation" style="transform-style: preserve-3d;">
        </a>
      </div>
    
      <!-- Community Section -->
      <div id="community" class="flex items-center justify-center w-full h-2/3 max-md:h-1/3 bg-white shadow-lg bg-[url('/activities/play.webp')] bg-cover bg-center relative">
        <div class="absolute inset-0 bg-white opacity-50"></div>
        <a href="https://chat.whatsapp.com/GnUAVKuoK0KJaKw0R7BVgs" target="_blank" class="bg-transparent text-black border-4 border-black py-3 px-12 text-2xl font-bold rounded-full hover:bg-black hover:text-white transition relative">
          join our community
        </a>
      </div>
    </div>
  </section>
  
  
  <section id="about-us" class="w-full h-screen bg-[url('/background/background.webp')] bg-cover bg-center text-white relative" style="font-family:Monotype Old English Text W01; display: none;" >
    <!-- Overlay (Optional for better text visibility) -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
  
    <!-- Content -->
    <div class="relative flex flex-col items-center justify-start h-full px-4 text-center pt-10" >
      <h1 class="text-4xl sm:text-6xl font-bold mb-5">We Are Hobbits In A Hobbit-Hole.</h1>
      <p id="typing-text" class="text-3xl sm:text-3xl max-w-3xl px-24 mt-10">
        <!-- The text will type itself here -->
      </p>
    </div>
    
  
    <!-- Video -->
    {{-- <video id="moving-video" class="absolute top-1/2 left-1/2 transform -translate-x-1/2" autoplay loop playsinline muted> --}}
      <img src="dragon/dragon1.gif" id="moving-dragon" alt="Dragon GIF" class="absolute top-1/2 left-1/2 transform -translate-x-1/2">

      <source src="dragon/dragon1.gif" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    
  </section>

  <section id="footer" class="w-full bg-[url('/background/background.webp')] bg-cover bg-center text-white relative py-8" style="font-family:Monotype Old English Text W01;display: none; ">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
  
    <!-- Content Wrapper -->
    <div class="relative z-10 container mx-auto px-4 lg:px-8 flex flex-wrap lg:flex-nowrap items-start">
      <!-- Text Section -->
      <div class="text-left w-full lg:w-1/2 space-y-6">
        <h2 class="text-2xl md:text-3xl font-bold">One Dimension</h2>
        <p class="text-base md:text-lg">Near Round Point Byakout</p>
        <p class="text-base md:text-lg">Moultaka Building</p>
        <p class="text-base md:text-lg">Facing Sallet Barakeh Zalka</p>
        <p class="text-base md:text-lg">Same Street of Saydet El Najet</p>
      </div>
  
      <!-- Map Section -->
      <div class="w-full lg:w-1/2 mt-8 lg:mt-0 flex justify-center items-center">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.587056015307!2d35.57725317555375!3d33.90028747321455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f3d0079330fff%3A0x242b3ad097a414ef!2sOne%20Dimension!5e0!3m2!1sen!2slb!4v1739577051966!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
  
  
  
  
  <div id="scroll-indicator" class="absolute bottom-12 left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-3 opacity-90">
    <!-- Scroll Text -->
    <span class="text-lg font-semibold text-white tracking-wide transition-all duration-300 transform group-hover:scale-105">Scroll Down</span>
    
    <!-- Custom Downward Arrow (Triangle Style) -->
    <div class="w-0 h-0 border-l-4 border-r-4 border-t-8 border-transparent border-t-white animate-bounce"></div>
</div>



  <!-- JavaScript for the Carousel -->
  <script>


    // JavaScript for automatic slide transition
    let currentIndex = 0;
    const images = document.querySelectorAll('.carousel-item');
    const totalImages = images.length;

    // Function to change image visibility
    function changeImage() {
      images[currentIndex].classList.remove('opacity-100');
      images[currentIndex].classList.add('opacity-0');
      
      currentIndex = (currentIndex + 1) % totalImages;
      
      images[currentIndex].classList.remove('opacity-0');
      images[currentIndex].classList.add('opacity-100');
    }

    // Automatically transition images every 5 seconds
    setInterval(changeImage, 8000); // 5 seconds interval

    // Manual navigation: Prev button
    const prevButton = document.getElementById('prevButton');
    prevButton.addEventListener('click', () => {
      images[currentIndex].classList.remove('opacity-100');
      images[currentIndex].classList.add('opacity-0');
      currentIndex = (currentIndex - 1 + totalImages) % totalImages;
      images[currentIndex].classList.remove('opacity-0');
      images[currentIndex].classList.add('opacity-100');
    });

    // Manual navigation: Next button
    const nextButton = document.getElementById('nextButton');
    nextButton.addEventListener('click', () => {
      changeImage();
    });

    document.addEventListener("DOMContentLoaded", () => {
    const targetSection = document.getElementById("about-us");
    const typingText = document.getElementById("typing-text");
    const textToType =
      "Even The Smallest Person Can Change The Course Of The Future";

    let currentIndex = 0;

    // Function to type the text
    function typeText() {
      if (currentIndex < textToType.length) {
        typingText.textContent += textToType[currentIndex];
        currentIndex++;
        setTimeout(typeText, 50); // Adjust typing speed (50ms per character)
      }
    }

    
    // Observe when the section is in view
    const observer = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          typeText();
          observer.disconnect(); // Stop observing after the effect runs once
        }
      },
      { threshold: 0.5 } // Trigger when 50% of the section is visible
    );

    observer.observe(targetSection);
  });


  const menuButton = document.getElementById('menuButton');
  const closeMenuButton = document.getElementById('closeMenuButton');
  const mobileMenu = document.getElementById('mobileMenu');

  menuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
    mobileMenu.classList.add('flex');
  });

  closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.add('hidden');
    mobileMenu.classList.remove('flex');
  });

  // Select the dragon element
const dragon = document.getElementById('moving-dragon');

// Add an event listener for mouseover
dragon.addEventListener('mouseover', () => {
  // Generate random positions for the dragon
  const randomTop = Math.random() * 80 + 10; // Random position between 10% and 90% of the screen height
  const randomLeft = Math.random() * 80 + 10; // Random position between 10% and 90% of the screen width

  // Move the dragon to the new position
  dragon.style.top = `${randomTop}%`;
  dragon.style.left = `${randomLeft}%`;
});

// const loadingScreen = document.getElementById("loading-screen");

//     const sections = document.querySelectorAll("section");
//     const loadingVideo = document.getElementById("loading-video");

//     // Event listener for when the video ends
//     loadingVideo.addEventListener("ended", () => {
//       // Hide the loading screen
//       loadingScreen.style.display = "none";
//       // Show all sections
//       sections.forEach((section) => {
//         section.style.display = "block";
//       });
//     });


      // Get references to the video, loading screen, and sections
      const loadingScreen = document.getElementById("loading-screen");
    const sections = document.querySelectorAll("section");
    const loadingVideo = document.getElementById("loading-video");

    // Event listener for when the video ends
    loadingVideo.addEventListener("ended", () => {
      // Hide the loading screen
      loadingScreen.style.display = "none";
      // Show all sections after the video ends
      sections.forEach((section) => {
        section.style.display = "block";
      });
    });


    document.addEventListener("DOMContentLoaded", function () {
    var video = document.getElementById("loading-video");
    if (video) {
      video.play().catch(error => console.log("Autoplay prevented", error));
    }
  });

  </script>

</body>
</html>
