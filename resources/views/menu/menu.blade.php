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

    /* Chef Signature Styles */
    .chef-signature {
      position: absolute;
      top: 1rem;
      right: 2rem;
      z-index: 20;
      font-size: 1.5rem;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .chef-signature-holographic {
      background: linear-gradient(
        to right, 
        #ff00ff, 
        #00ffff, 
        #ffff00, 
        #ff00ff
      );
      background-size: 400% 100%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-fill-color: transparent;
      animation: holographic-shift 3s ease infinite;
    }

    @keyframes holographic-shift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
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

    /* Responsive Typography */
    @media (max-width: 640px) {
      .chef-signature {
        font-size: 1rem;
        right: 1rem;
      }

      .menu-link {
        padding: 0.75rem 0;
        font-size: 1rem;
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
  </style>
</head>

<body>
  <section class="w-full h-auto min-h-screen fixed-bg bg-[url('/activities/jdidjdid.jpg')]">
    <!-- Chef Signature with Holographic Effect -->
    <div class="chef-signature chef-signature-holographic text-shadow-lg">
      By Chef Georges Nader
    </div>

    <!-- Header Navigation -->
    <header class="w-full flex flex-wrap py-16 text-white relative z-10 px-8" role="navigation">
      @foreach ($mainCategories as $cat)
        <a href="{{ route('menu.show', $cat) }}" 
           class="flex-1 text-center flex justify-center items-center border-l-4 border-white 
                  menu-link py-8 
                  {{ Request::is('menu/'.$cat) ? 'bg-white text-green-600 border-green-600' : 'text-white' }}
                  text-base sm:text-2xl lg:text-3xl"
           aria-label="{{ $cat }} menu">{{ strtoupper($cat) }}</a>
      @endforeach
    </header>
    
    <!-- Subcategories Section -->
    <section class="max-w-7xl mx-auto relative z-10 px-4 md:px-2">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($subcategories as $subcategory)
          <div class="subcategory-card text-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-white mb-6 pb-2 border-b border-white/30 text-shadow-lg">
              {{ $subcategory->name }}
            </h2>

            <ul class="space-y-6">
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
            </ul>
          </div>
        @endforeach
      </div>
    </section>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
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
    });
  </script>
</body>
</html>