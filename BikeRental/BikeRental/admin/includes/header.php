<div class="brand clearfix animated-navbar">
    <a href="dashboard.php" class="logo-text">🚴 Bike Rental Portal | Admin Panel</a>  
    <span class="menu-btn" onclick="toggleMenu()"><i class="fa fa-bars"></i></span>
    
    <ul class="ts-profile-nav">
        <li class="ts-account">
            <a href="#" class="account-dropdown">
                <img src="img/ts-avatar.jpg" class="ts-avatar glow-avatar hidden-side" alt="Admin Avatar">
                Account <i class="fa fa-angle-down hidden-side"></i>
            </a>
            <ul class="dropdown-menu animated-dropdown">
                <li><a href="change-password.php">🔒 Change Password</a></li>
                <li><a href="logout.php">🚪 Logout</a></li>
            </ul>
        </li>
    </ul>
</div>

<style>
    /* Navbar Slide-in Effect */
    .animated-navbar {
        transform: translateY(-50px);
        opacity: 0;
        animation: slideIn 0.8s forwards;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Logo Styling */
    .logo-text {
        font-size: 22px;
        font-weight: bold;
        color: #fff;
        transition: color 0.3s ease-in-out;
    }

    .logo-text:hover {
        color: #ffcc00;
    }

    /* Menu Button Animation */
    .menu-btn {
        font-size: 24px;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .menu-btn:hover {
        transform: rotate(90deg);
    }

    /* Profile Avatar Hover Glow Effect */
    .glow-avatar {
        transition: box-shadow 0.3s ease-in-out, transform 0.2s;
    }

    .glow-avatar:hover {
        box-shadow: 0 0 10px rgba(255, 204, 0, 0.8);
        transform: scale(1.1);
    }

    /* Dropdown Menu Styling */
    .ts-account {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background: #333;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        top: 40px;
        right: 0;
        width: 180px;
        z-index: 100;
        opacity: 0;
        transform: translateY(-10px);
        animation: fadeDropdown 0.4s forwards;
    }

    .dropdown-menu li {
        list-style: none;
    }

    .dropdown-menu li a {
        display: block;
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .dropdown-menu li a:hover {
        background: #ffcc00;
        color: #333;
    }

    @keyframes fadeDropdown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Show Dropdown on Hover */
    .ts-account:hover .dropdown-menu {
        display: block;
    }
</style>

<script>
    function toggleMenu() {
        const menuIcon = document.querySelector(".menu-btn i");
        menuIcon.classList.toggle("fa-bars");
        menuIcon.classList.toggle("fa-times");
    }
</script>
