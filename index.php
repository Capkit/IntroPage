
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="New design">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <link rel="stylesheet" type="text/css" href="main.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Major+Mono+Display|Inconsolata|Raleway" rel="stylesheet">
  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script type="text/javascript" src="jquery-2.1.3.js"></script>
<!--PERSONAL SCRIPT JavaScript-->
<script type="text/javascript">
   $(function() {

	var $menu = $(".menu");
	var $pages = $(".page");
	var $menuLi = $menu.find("li").not(".to-home");
	var $toHome = $menu.find(".to-home");
  var $profileCard = $("#section-home");   
	
	//interna vars
	var currentPage = "";

  $pages.hide();   
     
	$toHome.on("click", function() {
		currentPage = "";
		TweenMax.to($pages, 0.9, {
			left: "-70%"
		});
		TweenLite.to($menuLi.filter(".active"), 0.5, {
			className: "-=active"
		});
    $profileCard.show();
    $pages.hide();
	});
	
	$menuLi.on("click", function(event) {
		
		var $this = $(this);
		var thisHref = $this.find("a").attr("href");
		
		if (currentPage !== thisHref && $pages.filter(thisHref).length > 0) {
			currentPage = thisHref;
     
			TweenMax.to($pages, 2.0, {
				left: 1700,
        scale: 0.9
			}); 

			TweenMax.to($pages.filter(thisHref), 0.5, {
				left: 0
			});
			TweenLite.to($menuLi.filter(".active"), 0.5, {
				className: "-=active"
			});
			TweenLite.to($this, 0.5, {
				className: "+=active"
			});
		}
		$profileCard.hide();
    $pages.show();
		event.preventDefault();
	});
});

</script>

</head>
  
<body>
  <main>
    <section class="starter-page">
    <!--------------------------------------MENU--------------------------------------->
      <nav>
        <ul class="menu">
          <li class="to-home"><a href="#">Home</a></li>
          <li><a href="#projects" class="proj-but">Projects</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#contacts" class="contactForm">Contacts</a></li>
        </ul>
      </nav>
    <!------------------------------------END OF MENU---------------------------------->


      <!---------------------------------PROFILE-CARD----------------------------------->
      <div class="vcard-body section-home" id="section-home">
      <!--vcard-profile photo-->
        <div class= "vcard-profile-photo">
          <img src="https://imgur.com/p3tlQ73.jpg" id="profile-pic1" class= "profileActive"alt="Profile picture"/>
        </div>

        <div class= "vcard-description">
        <!--vcard-Description-Profile-->
          <h1 class= "profile-title"><span class="color1">Kitti, Füredi</span></h1>
          <h2 class= "profile-subtitle">Hobby coder</h2>
          <hr class="hr1">

        <div class= "description-text">
          <span>from</span>
          <p><i class="fas fa-map-marker-alt"></i> Budapest, HU</p>
        </div>

        <div class= "description-footer">
        <!--Item-->
          <div class= "description-footer-item">
            <p class="active"></p>
          </div>
        </div>
       </div>
       <div class= "vcard-footer">
       <!--social icons-->
         <div class="footer-icons">
           <a href="https://www.linkedin.com/in/kitti-furedi/" target="_blank" ><i class="fab fa-linkedin-in"></i></a>
			     <a href="https://github.com/Capkit" target="_blank"><i class="fab fa-github"></i></a>
			     <a href="https://www.instagram.com/furedikitti/" target="_blank"><i class="fab fa-instagram"></i></a>
         </div>
       </div>
    </div>
 <!---------------------------------END OF PROFILE CARD------------------------------->
  </section> 
 <!---------------------------------PROJECTS-SECTION------------------------------->
   <section class="detail-page">
    <div id="projects" class="page">
      <div class="page-content">
        <h2>Projects</h2>
        <h3 data-text="Under development..."class="loading">Under development...</h3>
        <p>Check out some projects on my CodePen and Github profile:</p>
          <div class="project-img">
            <a href="https://codepen.io/Kittencap/"><img src="https://imgur.com/QSFctZO.png" alt="Codepen-link" class="codepen-img"></a>
            <a href="https://github.com/Capkit"><img src="https://imgur.com/7JovEki.jpg" alt="Github-link" class="github-img"></a>
          </div>
      </div>
    </div>
 <!---------------------------------SKILLS-SECTION------------------------------->
    <div id="skills" class="page">
      <div class="page-content">

        <!--------ADVANCED&BASIC SKILLS------->
        <div class="core-skills">
          <ul>
            <h2>Skills:</h2>
            <h3>Advanced:</h3>
            <li>Java Core fundamentals, Java 8, 11</li>
            <li>Java Server</li>
            <li>HTML - CSS</li>
            <li>Spring Boot</li>
            <li>Thymeleaf</li>
          </ul> 
          <ul>
            <h3>Basics:</h3>
            <li>JavaFX</li>
            <li>mySQL, PostgreSQL</li>
            <li>Javasript, ES6</li>
            <li>Node.js</li>
            <li>Yarn, npm</li>
          </ul>
          <ul>
            <h3>Tooling, Framework</h3>
            <li>Spring Framework</li>
            <li>NetBeans</li>
            <li>Eclipse</li>
          </ul>
          <ul>
            <h3>Used Operating Systems</h3>
            <li>Linux - Debian</li>
            <li>Windows 7-10</li>
          </ul>
        </div>
        <!----------------------------->
        <!--------LEARNING-LIST-------->
        <div class="learning-list">
          <ul>
            <h2>Learn and practice java from:</h2>
            <li class="sfj-item"> 
              <h3>SFJ</h3>
              <a href="http://sanfranciscoboljottem.com/" target="_blank">sanfranciscoboljottem.com</a>
              <a href="https://www.youtube.com/channel/UCK_DAaLso6GNsOKyL2funLw" target="_blank" class="sfj"><img src="https://imgur.com/SsU1623.jpg"></a>
            </li>

            <li class="tnb-item">
              <h3>thenewboston</h3> 
              <a href="https://www.youtube.com/channel/UCJbPGzawDH1njbqV-D5HqKw" target="_blank"><img src="https://imgur.com/SsU1623.jpg"></a>
            </li>
            <li>
              <a href="https://www.udemy.com/" target="_blank">Udemy online courses</a>
            </li>
            <li>
              <a href="https://www.edx.org/" target="_blank">edX online courses</a>
            </li>
            <li>
              <h3>Practice</h3>
              <a href="https://codingbat.com/java" target="_blank">codingbat.com</a>
            </li>
           </ul>
           <ul class="learn-from-2">
             <h2>Learn and practice javascript - html - css from:</h2>
             <li>
                <a href="https://codeberryschool.com/" target="_blank">CodeBerry Programozóiskola</a>
             </li>
              <li>
                <a href="https://www.freecodecamp.org/" target="_blank">freeCodeCamp</a>
              </li>
              <li class="chrs-item">
                <h3>Javascript and canvas tricks</h3>
                <a href="https://chriscourses.com/" target="_blank">chriscourses.com</a>
                <a href="https://www.youtube.com/channel/UC9Yp2yz6-pwhQuPlIDV_mjA" target="_blank"><img src="https://imgur.com/SsU1623.jpg"></a>
              </li>
            </ul>
        </div>
        <!---------------------------->
        <!-------OTHER INTERESTS------>
        <div class="other-interests-list">
          <ul>
            <h2>Interested in too:</h2>
            <li class="hack-item">Etichal hacking <a href="https://www.udemy.com/learn-ethical-hacking-from-scratch/" target="_blank">Zaid Sabih - Ethical hacking course</a></li>
            <li>Android App Development</li>
            <li>Game Development</li>
          </ul>
        </div>
         <!-------------------------->
       </div>
    </div>
 <!---------------------------------END OF SKILLS-SECTION------------------------------->

 <!---------------------------------CONTACTS------------------------------->   
    <div id="contacts" class="page">
      <div class="page-content">
        <div class="wrapper">
          <div class="title">Contact me</div>
          <form class="form" action="contactform.php" method="post">
            <input type="text" class="name field-in font" placeholder="         Your Name" name="name"/>
            <input type="text" class="email field-in font" placeholder="          Email" name="email"/>
            <textarea type="text" class="message field-in font" placeholder="     Enter message here..." name="message"></textarea> 
            <button class="submit font" type="submit" name="submit">Submit</button>
          </form>  	
       </div>  
      </div>
    </div>
   </section>
  </main>

<!---------------------------------END OF CONTACTS------------------------------->
  <footer>
    <div class="footer-wrapper">
      <p><small>Online profile card | 2019 </small></p>
    </div>
  </footer>
</body>
</html>
