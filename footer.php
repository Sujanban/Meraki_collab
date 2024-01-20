 <!-- footer starts here -->
 <footer class="p-8 footer">
   <div class="max-w-5xl mx-auto md:grid grid-cols-5 gap-4">
     <div class="md:grid col-span-2">
       <h1 class="text-2xl font-bold">Meraki Collab</h1>
       <p class="py-2">
         Welcome to Meraki Collab,
         where our passion for sustainable innovation intersects with a vision for a better future.
         Here, we provide the feature of collaboration,donation and Contribution.

       </p>
       <h1 class="py-2 text-2xl font-medium">Follow Us</h1>
       <div>
         <i class="text-2xl m-1 fa-brands fa-facebook"></i>
         <i class="text-2xl m-1 fa-brands fa-linkedin"></i>
         <i class="text-2xl m-1 fa-brands fa-instagram"></i>
       </div>
     </div>
     <div>
       <h1 class="pb-2 text-2xl">Our Services</h1>
       <li class="pb-2"><a href="">Collaborate</a></li>
       <li class="pb-2"><a href="">Donate</a></li>
       <li class="pb-2"><a href="">Contribute</a></li>
     </div>
     <div class="col-span-2">
       <h1 class="pb-2 text-2xl">Contact</h1>
       <li class="pb-2 flex items-center"><i class="text-xl m-1 fa-brands fa-telegram"></i>
         <p>contact@merakicolab.com</p>
       </li>
       <li class="pb-2 flex items-center"><i class="text-xl m-1 fa-solid fa-phone"></i></i>
         <p>+213-559-281-566</p>
       </li>
       <li class="pb-2 flex items-center"><i class="text-xl m-1 fa-solid fa-location-dot"></i>
         <p>Itahari, Nepal.</p>
       </li>
     </div>
   </div>
 </footer>
 <script src="script.js"></script>
 </body>

 </html>

 <script>
   const scrollToTopBtn = document.getElementById("scrollToTopBtn");

   window.addEventListener("scroll", function() {
     const progressBar = document.querySelector(".progress");

     const contentHeight = document.body.scrollHeight - window.innerHeight;
     const scrolled = window.pageYOffset || document.documentElement.scrollTop;
     const progress = scrolled / contentHeight;

     scrollToTopBtn.style.display = progress > 0.1 ? "block" : "none";

     progressBar.style.width = progress * 100 + "%";
   });

   scrollToTopBtn.addEventListener("click", function() {
     window.scrollTo({
       top: 0,
       let:0,
       behavior: "smooth",
     });
   });


 </script>