<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Chef Georges Nader</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Global Enhancements */
    * {
      box-sizing: border-box;
      transition: all 0.3s ease;
    }

    /* Custom Background and Scrollbar */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      scrollbar-width: thin;
      scrollbar-color: #16a34a #d1fae5;
    }

    body::-webkit-scrollbar {
      width: 8px;
    }

    body::-webkit-scrollbar-track {
      background: #d1fae5;
    }

    body::-webkit-scrollbar-thumb {
      background-color: #16a34a;
      border-radius: 20px;
    }

    /* Background and Overlay Improvements */
    .fixed-bg {
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
    }

    .fixed-bg::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(22,163,74,0.3));
      z-index: 1;
    }

    /* Typography and Text Effects */
    .text-shadow-lg {
      text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
    }

    /* Chef Signature Styles - Integrated into Layout */
    .chef-signature {
      font-family: 'Brush Script MT', cursive;
      font-size: 1.2rem;
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 0.3rem 1rem;
      border-radius: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
      letter-spacing: 1px;
      display: inline-block;
      margin-right: 1rem;
    }

    /* Menu Navigation Improvements */
    .menu-link {
      position: relative;
      overflow: hidden;
    }

    .menu-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: #16a34a;
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.3s ease;
    }

    .menu-link:hover::after {
      transform: scaleX(1);
      transform-origin: left;
    }

    /* Menu Header Container */
    .menu-header-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      position: relative;
      z-index: 10;
    }

    /* Subcategory and Item Card Enhancements */
    .subcategory-card {
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.4s ease;
    }

    .subcategory-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 30px rgba(0,0,0,0.2);
    }

    /* Subcategory Navigation */
    .subcategory-nav {
      display: flex;
      flex-wrap: nowrap;
      overflow-x: auto;
      gap: 1rem;
      padding: 1rem 0;
      margin-bottom: 2rem;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
    }

    .subcategory-nav::-webkit-scrollbar {
      display: none;
    }

    .subcategory-nav-item {
      flex: 0 0 auto;
      padding: 0.5rem 1.5rem;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 30px;
      font-weight: 600;
      cursor: pointer;
      border: 2px solid transparent;
      white-space: nowrap;
    }

    .subcategory-nav-item:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .subcategory-nav-item.active {
      background-color: rgba(22, 163, 74, 0.7);
      border-color: rgba(255, 255, 255, 0.5);
    }

    /* Category Header */
    .category-header {
      position: relative;
      margin-bottom: 2rem;
      padding-bottom: 0.5rem;
    }

    .category-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background-color: #16a34a;
    }

    /* Responsive Typography */
    @media (max-width: 640px) {
      .chef-signature {
        font-size: 1rem;
        padding: 0.2rem 0.8rem;
      }

      .menu-link {
        padding: 0.75rem 0;
        font-size: 1rem;
      }
      
      .menu-header-container {
        padding: 0.5rem 1rem;
      }

      .subcategory-nav-item {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
      }
    }

    /* Read More/Less Button Style */
    .expand-description {
      color: #4ade80;
      font-weight: bold;
      text-decoration: none;
    }

    .expand-description:hover {
      color: #22c55e;
      text-decoration: underline;
    }

    /* Fade Animation */
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body>
  <section class="w-full h-auto min-h-screen fixed-bg bg-[url('/activities/jdidjdid.jpg')]">
    <!-- Menu Header with Chef Signature for food section only -->
    <div class="menu-header-container">
      @if(isset($currentCategory) && $currentCategory == 'Food')
      <div class="chef-signature">
        By Chef Georges Nader
      </div>
      @endif
    </div>

    <!-- Header Navigation -->
    <header class="w-full flex flex-wrap py-8 text-white relative z-10 px-8" role="navigation">
      @if(isset($mainCategories) && count($mainCategories) > 0)
        @foreach ($mainCategories as $cat)
          <a href="{{ route('menu.show', $cat) }}" 
             class="flex-1 text-center flex justify-center items-center border-l-4 border-white 
                    menu-link py-8 
                    {{ request()->is('menu/'.$cat) ? 'bg-white text-green-600 border-green-600' : 'text-white' }}
                    text-base sm:text-2xl lg:text-3xl"
             aria-label="{{ $cat }} menu">{{ strtoupper($cat) }}</a>
        @endforeach
      @endif
    </header>
    
    <!-- Category Title -->
    @if(isset($currentCategory))
    <div class="text-center mb-8 px-4">
      <h1 class="text-4xl md:text-5xl font-bold text-white category-header text-shadow-lg">
        {{ $currentCategory }}
      </h1>
    </div>
    @endif
    
    <!-- Subcategory Navigation -->
    @if(isset($subcategories) && count($subcategories) > 0)
    <div class="max-w-7xl mx-auto px-4 md:px-8 relative z-10">
      <div class="subcategory-nav" id="subcategory-nav">
        <button class="subcategory-nav-item active text-white" data-subcategory="all">
          All
        </button>
        @foreach ($subcategories as $subcategory)
          <button class="subcategory-nav-item text-white" data-subcategory="{{ Str::slug($subcategory->name) }}">
            {{ $subcategory->name }}
          </button>
        @endforeach
      </div>
    </div>
    
    <!-- Subcategories Section -->
    <section class="max-w-7xl mx-auto relative z-10 px-4 md:px-8 pb-20">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="subcategory-container">
        @foreach ($subcategories as $subcategory)
          <div class="subcategory-card text-white rounded-lg shadow-lg p-6" data-subcategory="{{ Str::slug($subcategory->name) }}">
            <h2 class="text-2xl font-bold text-white mb-6 pb-2 border-b border-white/30 text-shadow-lg">
              {{ $subcategory->name }}
            </h2>

            <ul class="space-y-6">
              @if(isset($subcategory->items) && count($subcategory->items) > 0)
                @foreach ($subcategory->items as $item)
                  <li class="flex justify-between items-start">
                    <div class="flex-grow pr-4">
                      <h3 class="text-xl font-semibold mb-2 text-shadow-lg">{{ $item->name }}</h3>
                      <p class="text-gray-200 italic truncate-description" data-full-text="{{ $item->description }}">
                        <span class="short-description">{{ Str::limit($item->description, 50) }}</span>
                        @if (strlen($item->description) > 50)
                          <a href="#" class="expand-description">Read More</a>
                        @endif
                      </p>
                    </div>
                    <span class="text-yellow-400 font-bold text-xl text-shadow-lg">
                      ${{ number_format($item->price, 2) }}
                    </span>
                  </li>
                @endforeach
              @else
                <li>No items available in this category.</li>
              @endif
            </ul>
          </div>
        @endforeach
      </div>
    </section>
    @else
    <div class="text-center text-white py-16">
      <p class="text-xl">No subcategories available.</p>
    </div>
    @endif
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Read More/Less functionality
      document.querySelectorAll('.expand-description').forEach(button => {
        button.addEventListener('click', function (event) {
          event.preventDefault();
          const parent = this.closest('p');
          const fullText = parent.getAttribute('data-full-text');
          const descriptionText = parent.querySelector('.short-description');

          if (this.textContent === "Read More") {
            descriptionText.textContent = fullText;
            this.textContent = "Read Less";
          } else {
            descriptionText.textContent = fullText.slice(0, 50) + '...';
            this.textContent = "Read More";
          }
        });
      });

      // Subcategory navigation functionality
      const subcategoryButtons = document.querySelectorAll('.subcategory-nav-item');
      const subcategoryCards = document.querySelectorAll('.subcategory-card');

      subcategoryButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          subcategoryButtons.forEach(btn => btn.classList.remove('active'));
          
          // Add active class to clicked button
          this.classList.add('active');
          
          const selectedSubcategory = this.getAttribute('data-subcategory');
          
          // Hide all cards first
          subcategoryCards.forEach(card => {
            card.style.display = 'none';
            card.classList.remove('fade-in');
          });
          
          // Show only the selected subcategory or all
          if (selectedSubcategory === 'all') {
            subcategoryCards.forEach(card => {
              card.style.display = 'block';
              setTimeout(() => {
                card.classList.add('fade-in');
              }, 10);
            });
          } else {
            const selectedCards = document.querySelectorAll(`.subcategory-card[data-subcategory="${selectedSubcategory}"]`);
            selectedCards.forEach(card => {
              card.style.display = 'block';
              setTimeout(() => {
                card.classList.add('fade-in');
              }, 10);
            });
          }
        });
      });

      // Scroll subcategory into view if URL has hash
      if (window.location.hash) {
        const subcategoryId = window.location.hash.substring(1);
        const subcategoryButton = document.querySelector(`.subcategory-nav-item[data-subcategory="${subcategoryId}"]`);
        if (subcategoryButton) {
          subcategoryButton.click();
          subcategoryButton.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      }
    });
  </script>
</body>
</html>