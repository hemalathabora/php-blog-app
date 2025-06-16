<?php
$conn = new mysqli("localhost", "root", "", "blog_db");

// Handle search input
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Pagination variables
$limit = 3; // posts per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $limit;

// Search query with pagination
$sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY created_at DESC LIMIT $start_from, $limit";
$result = $conn->query($sql);

// Count total results for pagination
$count_sql = "SELECT COUNT(*) FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
$total_result = $conn->query($count_sql);
$total_posts = $total_result->fetch_row()[0];
$total_pages = ceil($total_posts / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog App</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">My Blog</h1>
    
    <!-- Search Form -->
    <form class="d-flex mb-4" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search posts..." value="<?= htmlspecialchars($search) ?>">
  <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <!-- Post List -->
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title"><?= $row['title'] ?></h3>
                <p class="card-text"><?= substr($row['content'], 0, 150) . '...' ?></p>
                <small class="text-muted">Posted on <?= $row['created_at'] ?></small>
            </div>
        </div>
    <?php endwhile; ?>

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <script>
  const searchInput = document.querySelector('input[name="search"]');
  
  searchInput.addEventListener('search', function () {
    if (!this.value) {
      window.location = 'index.php'; // reload to show all posts
    }
  });
</script>

</body>
</html>
