<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artify × The Met - Customize Museum Art</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- classic serif font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --met-primary: #D94F2B;      /* Met coral red for CTAs */
            --met-dark: #231F20;         /* Met dark gray for text */
            --met-bg: #FFFFFF;           /* Met white background */
            --met-accent: #98765C;       /* Met warm gray for accents */
            --met-light-gray: #F2F2F2;   /* Met light gray for backgrounds */
            --met-medium-gray: #767676;  /* Met medium gray for secondary text */
            --met-border: #DDDDDD;       /* Met border color */
            
            --serif: 'Playfair Display', serif;
            --body-font: 'Libre Baskerville', serif;
            
            --card-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--body-font);
            line-height: 1.6;
            color: var(--met-dark);
            background-color: var(--met-light);
        }

        .loading {
            text-align: center;
            padding: 3rem;
            font-family: var(--serif);
            font-style: italic;
            color: var(--met-gray);
        }

        .loading::after {
            content: '...';
            animation: dots 1.5s infinite;
        }

        @keyframes dots {
            0%, 20% { content: '.'; }
            40% { content: '..'; }
            60% { content: '...'; }
        }

        .error, .no-results {
            text-align: center;
            padding: 2rem;
            font-family: var(--serif);
            font-style: italic;
            color: var(--met-gray);
            background: white;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 4px;
        }

        .header {
            background: var(--met-dark);
            color: white;
            padding: 3rem 5%;
            text-align: center;
            border-bottom: 3px solid var(--met-gold);
        }

        .header h1 {
            font-family: var(--serif);
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }

        .header p {
            font-family: var(--body-font);
            font-size: 1.1rem;
            opacity: 0.9;
            font-style: italic;
            color: var(--met-gold);
        }

        /* main Content */
        .container {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 7fr 3fr;
            gap: 3rem;
        }

        /* search box */
        .search-container {
            background: white;
            padding: 2rem;
            border: 1px solid rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: 1px solid #ddd;
            font-family: var(--body-font);
            font-size: 1rem;
            transition: var(--transition);
        }

        .search-input:focus {
            border-color: var(--met-gold);
            outline: none;
        }

        .filter-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.5rem 1.5rem;
            border: 1px solid var(--met-gray);
            background: transparent;
            color: var(--met-gray);
            font-family: var(--body-font);
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn:hover {
            background: var(--met-gold);
            border-color: var(--met-gold);
            color: white;
        }

        .filter-btn.active {
            background: var(--met-dark);
            border-color: var(--met-dark);
            color: white;
        }

        /* artwork display grid */
        .artwork-grid {
            display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    justify-items: center;
        }

        .artwork-card {
            width: 100%;
    max-width: 300px;
      border: 1px solid #e0e0e0;
      padding: 15px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
        }

        .artwork-card:hover {
            transform: scale(1.05);
        }

        .artwork-card.selected {
            border: 2px solid var(--met-gold);
        }

        .artwork-image {
            width: 100%;
      height: 300px;
      object-fit: cover;
        }

        .artwork-card:hover .artwork-image {
            transform: scale(1.03);
        }

        .artwork-info {
            padding: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .artwork-info h3 {
            font-family: var(--serif);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--met-dark);
        }

        .artwork-info p {
            color: var(--met-gray);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .artwork-info .date {
            font-style: italic;
            font-size: 0.85rem;
        }

        /* customize product area */
        .customization-panel {
            background: white;
            padding: 2rem;
            border: 1px solid rgba(0,0,0,0.1);
            position: sticky;
            top: 2rem;
        }

        .panel-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--met-gold);
        }

        .panel-header h2 {
            font-family: var(--serif);
            color: var(--met-dark);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .panel-header p {
            color: var(--met-gray);
            font-style: italic;
        }

        .product-options {
            display: grid;
            gap: 1rem;
        }

        .product-option {
            padding: 1.5rem;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .product-option:hover {
            border-color: var(--met-gold);
        }

        .product-option.selected {
            border-color: var(--met-dark);
            background: rgba(26, 26, 26, 0.02);
        }

        .product-icon {
            font-size: 1.5rem;
            color: var(--met-gold);
        }

        .product-option h3 {
            font-family: var(--serif);
            margin-bottom: 0.3rem;
        }

        .product-option p {
            color: var(--met-gray);
            font-size: 0.9rem;
        }

        .preview-container {
            margin-top: 2rem;
            text-align: center;
        }

        .preview-image {
            width: 100%;
            height: 300px;
            object-fit: contain;
            margin-bottom: 1rem;
            padding: 1rem;
            background: var(--met-light);
            border: 1px solid rgba(0,0,0,0.1);
        }

        .price {
            font-family: var(--serif);
            font-size: 2rem;
            color: var(--met-dark);
            margin: 1.5rem 0;
            text-align: center;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 1rem;
            background: var(--met-dark);
            color: white;
            border: none;
            font-family: var(--body-font);
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .add-to-cart-btn:hover {
            background: var(--met-gold);
        }

        .add-to-cart-btn:disabled {
            background: var(--met-gray);
            cursor: not-allowed;
        }

        /* responsive elements */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 1fr;
            }

            .customization-panel {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .container {
                padding: 0 1rem;
                margin: 1.5rem auto;
            }

            .artwork-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .product-option {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .artwork-image {
                height: 250px;
            }
        }
    </style>
    <?php
        $server = "carterb1.sgedu.site";
        $userid = "u3fi6z83zcg2y";
        $pw = "artify1234";
        $db = "dbgylh79jpnkih";
    ?>
</head>
<body>
    <header class="header">
        <h1>Artify</h1>
        <p>Transform timeless masterpieces into everyday treasures</p>
    </header>

    <main class="container">
        <section class="gallery-section">
            <div class="search-container">
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Search for artworks, artists, or periods...">
                </div>
                <div class="filter-container">
                    <button class="filter-btn" data-department="11">Paintings</button>
                    <button class="filter-btn" data-department="6">Asian Art</button>
                    <button class="filter-btn" data-department="19">Photography</button>
                    <button class="filter-btn" data-department="12">European Art</button>
                    <button class="filter-btn" data-department="18">Musical Instruments</button>
                    <button class="filter-btn" data-department="13">Greek and Roman Art</button>
                    <button class="filter-btn" data-department="14">Islamic Art</button>
                    <button class="filter-btn" data-department="10">Egyptian Art</button>
                </div>
            </div>

            <div class="artwork-grid" id="artworkGrid">
            </div>
        </section>

        <section class="customization-panel">
            <div class="panel-header">
                <h2>Customize Your Product</h2>
                <p>1. Select an artwork and 2. choose your product</p>
            </div>

            <div class="product-options">
                <?php
                    $conn = new mysqli($server, $userid, $pw);
                    $conn->select_db($db);
                    $result = $conn->query("SELECT * FROM products;");
                    while ($row = $result->fetch_assoc()) {
                        printf(
                            '<div class="product-options" data-product="%s" product-id="%s"><img class="product-image" src="%s"><div><h3>%s</h3><p>%s</p><p class="price">From $%s</p></div>',
                            $row['name'],
                            $row['productid'],
                            $row['image_link'],
                            $row['name'],
                            $row['description'],
                            $row['price']
                        );
                    }
                    $conn->close();
                ?>
            </div>

            <div class="preview-container" id="previewContainer">
                <p>Select an artwork and product to preview</p>
            </div>

            <button class="add-to-cart-btn" id="addToCartBtn" disabled>
                Add to Cart
            </button>
        </section>
    </main>

    <script>
    const MET_API_BASE = 'https://collectionapi.metmuseum.org/public/collection/v1';
    const artworkContainer = document.getElementById('artworkGrid');
    const filterButtons = document.querySelectorAll('.filter-btn');
    let selectedArtwork = null;
    let selectedProduct = null;

    // Function to validate artwork
    function isValidArtwork(artwork) {
    return artwork.primaryImage && artwork.primaryImage.startsWith('http') && artwork.isPublicDomain;
    }

    // Fetch and display artworks by department
    async function fetchAndDisplayArtworks(departmentId) {
        try {
            artworkContainer.innerHTML = '<p>loading curated collection...</p>';
            const response = await fetch(`${MET_API_BASE}/objects?departmentIds=${departmentId}`);
            const data = await response.json();

            if (!data.objectIDs || data.objectIDs.length === 0) {
            artworkContainer.innerHTML = '<p>No artworks found for this department.</p>';
            return;
            }

            // Shuffle and fetch details for a random subset of IDs
            const shuffledIDs = data.objectIDs.sort(() => 0.5 - Math.random()).slice(0, 50);
            const artworks = await Promise.all(shuffledIDs.map(fetchArtworkDetails));
            const validArtworks = artworks.filter(isValidArtwork).slice(0, 20);

            if (validArtworks.length === 0) {
            artworkContainer.innerHTML = '<p>unable to load curated collection. please try again.</p>';
            return;
            }

            renderArtworks(validArtworks);
        } catch (error) {
            console.error('error fetching artworks:', error);
            artworkContainer.innerHTML = '<p>error loading artworks. please try again.</p>';
        }
    }

    // Function to fetch individual artwork details
    async function fetchArtworkDetails(id) {
        try {
            const response = await fetch(`${MET_API_BASE}/objects/${id}`);
            return await response.json();
        } catch {
            return null;
        }
    }

    // Function to render artworks in the grid
    function renderArtworks(artworks) {
        artworkContainer.innerHTML = '';
        artworks.forEach(artwork => {
            const artworkHTML = `
            <div class="artwork-card">
                <img src="${artwork.primaryImage}" alt="${artwork.title || 'Artwork'}" class="artwork-image">
                <div class="artwork-info">
                <h3>${artwork.title || 'Untitled'}</h3>
                <p>By ${artwork.artistDisplayName || 'Unknown Artist'}</p>
                <p class="date">${artwork.objectDate || 'Unknown Date'}</p>
                </div>
            </div>
            `;
            artworkContainer.innerHTML += artworkHTML;
        });
    }

    // handle search with department filtering
    async function handleSearch(searchTerm, department = null) {
        try {
            artworkContainer.innerHTML = '<p>Searching artworks...</p>';

            let query = `${MET_API_BASE}/search?hasImages=true&q=${encodeURIComponent(searchTerm)}`;
            if (department) {
                query += `&departmentId=${department}`;
            }

            const response = await fetch(query);
            const data = await response.json();

            if (!data.objectIDs || data.objectIDs.length === 0) {
                artworkContainer.innerHTML = '<p>No artworks found matching your search.</p>';
                return;
            }

            const artworks = await Promise.all(data.objectIDs.slice(0, 30).map(fetchArtworkDetails));
            const validArtworks = artworks.filter(isValidArtwork).slice(0, 20);

            if (validArtworks.length === 0) {
                artworkContainer.innerHTML = '<p>No suitable artworks found.</p>';
                return;
            }

            renderArtworks(validArtworks);
        } catch (error) {
            console.error('Search error:', error);
            artworkContainer.innerHTML = '<p>Error performing search. Please try again later.</p>';
        }
    }

    // debounce for search
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

    // event listeners
    document.querySelector('.search-input').addEventListener('input', debounce((e) => {
        const searchTerm = e.target.value.trim();
        if (searchTerm.length >= 2) {
            const activeFilter = document.querySelector('.filter-btn.active');
            handleSearch(searchTerm, activeFilter?.dataset.department);
        } else if (searchTerm.length === 0) {
            const activeFilter = document.querySelector('.filter-btn.active');
            fetchAndDisplayArtworks(activeFilter?.dataset.department);
        }
    }, 500));

    filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        fetchAndDisplayArtworks(button.dataset.department);
    });
    });

    // Display Asian Art by default on page load
    fetchAndDisplayArtworks(6);

    
    </script>
</body>
</html>
