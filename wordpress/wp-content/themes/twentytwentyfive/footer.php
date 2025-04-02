<?php
/**
 * Footer Template
 */
?>

<footer class="footer mt-16">
    <div class="container" style="max-width: 1500px; padding: 50px; border-radius: 15px;">
        <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row items-center justify-between">
            <a class="flex title-font font-medium items-center text-white" href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo2.png" alt="Positivus logo" class="w-10 h-10" />
                <span class="ml-3">Positivus</span>
            </a>
            <ul class="navbar-nav flex flex-row text-white space-x-4">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Use Cases</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
            <span class="inline-flex space-x-3 social-icons">
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </span>
        </div>
        <div class="row contact-section text-start" style="margin-top: 35px; margin-bottom: 15px;">
            <div class="col-md-6" style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; font-weight: 400;">
                <h5 style="color: #B9FF66;">Contact us:</h5>
                <p>Email: info@positivus.com</p>
                <p>Phone: 555-567-8901</p>
                <p>Address: 1234 Main St, <br>Moonstone City, Stardust State 12345</p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="background-color: #292A32; font-family: 'Space Grotesk', sans-serif; font-size: 20px; font-weight: 400; border-radius: 10px;">
                <input type="email" class="form-control me-1" style="color: white; width: 285px; height: 68px;" placeholder="Email">
                <button class="btn" style="background-color: #B9FF66; width: 249px; height: 68px;">Subscribe to news</button>
            </div>
        </div>
        <div class="bottom-text text-start">
            <p>&copy; <?php echo date('Y'); ?> Positivus. All Rights Reserved. <a href="#">Privacy Policy</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>       
