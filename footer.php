    <div class="container">
    <div class="row footer-menu">
         <div class="col-md-4">
         <h3>Menu</h3>
         <?php wp_nav_menu(array('footer navigation', 'secondary'));  ?>
    </div>
     <div class="col-md-4">
         <?php dynamic_sidebar('footer-first-sidebar');  ?>
    </div>
    <div class="col-md-4">
         <?php dynamic_sidebar('footer-second-sidebar');  ?>
    </div>
    </div>
</div>    
<?php wp_footer();  ?>
   <script type="text/javascript">
           $(document).ready(function(){
        
            $('#sidebar').click(function(){
            $('#star-sidebar').hide(); 
            });
        
            $('#toggle').click(function(){
            $('#star-sidebar').toggle(); 
            });
            
            $('#navi-toggler').click(function(){
               $('.navbar').toggle();
            });
            
});
        </script>
</body>
</html>