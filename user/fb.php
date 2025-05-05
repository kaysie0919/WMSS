<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Ensure body and html take up the full viewport height */
        body, html {
            height: 100%;
            margin: 0;
        }

        /* Center content using flexbox */
        .center-viewport {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Full viewport height */
            padding: 1rem;
            background-color: #f8f9fa;
        }

        /* Style the form container */
        .form-container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Ensure the form fields have enough space */
        .form-check, .form-group {
            margin-bottom: 1rem;
        }

        /* Make the form responsive on smaller screens */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }
        }
    </style>
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">User Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.php">All Sent Reports</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="newreport.php">New Report</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="changesettings.php">Change Settings</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="fb.php">Feedback</a>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php">Sign out</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Feedback Form Section -->
<div class="center-viewport">
    <div class="form-container">
        <h2 class="text-center">Feedback Form</h2>
        <p class="text-center">Please help us to serve you better by taking a couple of minutes.</p>

        <form action="feedback.php" method="post">
            <!-- Satisfaction Rating -->
            <h5>How satisfied were you with our service?</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="view" value="excellent" id="excellent" required>
                <label class="form-check-label" for="excellent">Excellent</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="view" value="good" id="good">
                <label class="form-check-label" for="good">Good</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="view" value="neutral" id="neutral">
                <label class="form-check-label" for="neutral">Neutral</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="view" value="poor" id="poor">
                <label class="form-check-label" for="poor">Poor</label>
            </div>

            <!-- Comments Section -->
            <div class="mb-3 mt-4">
                <label for="comments" class="form-label">If you have specific feedback, please write to us...</label>
                <textarea id="comments" name="comments" class="form-control" rows="4" placeholder="Additional comments" required></textarea>
            </div>

            <!-- Optional Fields -->
            <div class="mb-3">
                <label for="name" class="form-label">Your Name (optional)</label>
                <input type="text" class="form-control" name="name" placeholder="Your Name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email (optional)</label>
                <input type="email" class="form-control" name="email" placeholder="Your Email">
            </div>

            <div class="mb-3">
                <label for="num" class="form-label">Your Number (optional)</label>
                <input type="text" class="form-control" name="num" placeholder="Your Number">
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </div>
        </form>
    </div>
</div>

<script src="js/jquery-3.3.1.slim.min.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>
<script src="js/feather.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>
