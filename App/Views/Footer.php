<div data-aos="fade-up" class="bg-white pt-4 newsletter-section mt-4">
   <div class="container">
      <div class="row g-2">
         <div class="col-12 col-md-3">
            <div class="d-flex gap-3 align-items-center h-100 justify-content-start">
               <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
               </svg>
               <h5 class="mt-2"><?=T::newsletter?></h5>
            </div>
         </div>
         <div class="col-12 col-md-3">
            <div class="form-floating">
               <input type="text" placeholder=" " name="name" value="" class="newsletter_name form-control">
               <label for=""><?=T::name?></label>
            </div>
         </div>
         <div class="col-12 col-md-3">
            <div class="form-floating">
               <input type="text" placeholder=" " name="email" value="" class="newsletter_email form-control">
               <label for=""><?=T::email?></label>
            </div>
         </div>
         <div class="col-12 col-md-3">
            <button class="subscribe btn btn-outline-primary w-100 h-100">
            <?=T::signup?> <?=T::newsletter?>
            </button>
            <div class="loading_button" style="display:none">
               <button style="height:58px !important"
                  class="loading_button btn btn-outline-primary w-100 h-100"
                  type="button" disabled>
               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>


<script>
   $('.subscribe').on('click', function() {
   
       // GETTING VALUES
       var newsletter_name = $('.newsletter_name').val();
       var newsletter_email = $('.newsletter_email').val();
   
       // VALIDATION
       if (newsletter_name == ""){
           alert("<?=T::please_add_your?> <?=T::name?>");
               
           } else {
   
           // VALIDATION
           if (newsletter_email == ""){
               alert("<?=T::please_add_your?> <?=T::email?>");
               
               } else { 
   
               // LOADING ANIMATION
               $('.subscribe').hide();
               $('.loading_button').show();
               
               var form = new FormData();
   
               form.append("name", newsletter_name);
               form.append("email", newsletter_email);
   
               var settings = {
                   "url": "<?=api_url?>newsletter-subscribe",
                   "method": "POST",
                   "timeout": 0,
                   "processData": false,
                   "mimeType": "multipart/form-data",
                   "contentType": false,
                   "data": form
               };
   
               $.ajax(settings).done(function(response) {
                   var data = JSON.parse(response);
                   console.log(data.status);
   
                   // FAILED
                   if (data.status==false){
                       alert("<?=T::email?> <?=T::exist_please_use_different?>");
                       
                       // LOADING ANIMATION
                       $('.subscribe').show();
                       $('.loading_button').hide();
                   }
   
                   // SUCCESS
                   if (data.status==true){
                       alert('<?=T::successfully_subscribed_newsletter?>');
   
                       // LOADING ANIMATION
                       $('.subscribe').show();
                       $('.loading_button').hide();
                       
                   }
   
               });
           }       
       }
   
   });
</script>
<section data-aos="fade-up" class="bg-white footer-area pt-3">
<hr class="bg-white pb-4">
   <div class="container">
      <div class="bg-white">
         <div class="row g-0">
            <div class="col-lg-3 responsive-column">
               <div class="footer-item">
                  <div class="footer-logo padding-bottom-10px">
                     <a href="<?=root?>" class="foot__logo">
                     <img style="max-width: 150px;background:transparent" src="<?=root?>uploads/global/logo.png"
                        alt="logo"></a>
                     </divface>
                     <ul class="list-items pt-3">
                        <?php if (!empty(app()->app->contact_phone)){?>
                        <li><strong> <?=app()->app->contact_phone?> </strong></li>
                        <?php } ?>
                        <?php if (!empty(app()->app->contact_phone)){?>
                        <li><strong><a href="mailto:<?=app()->app->contact_email?>" class=" waves-effect"><?=app()->app->contact_email?></a></strong></li>
                        <?php } ?>
                        <li><a href="<?=root?>page/contact" class=" waves-effect"><strong><?=T::contact_us?></strong></a></li>
                     </ul>
                  </div>
                  <!-- end footer-item -->
               </div>
               <!-- end col-lg-3 -->
            </div>
            <!-- end col-lg-3 -->
            <div class="col-lg-9 responsive-column">
               <ul class="foot_menu w-100">
                  <!-- header manue -->
                  <li class="footm row w-100">
                     <!-- <a href="company" class=" waves-effect"><strong>Company</strong>  </a> -->
                     <ul class="dropdown-menu-item row">
                        <?php  $menu=(base()->cms);   
                           foreach ($menu as $m){
                           if ($m->name=="Footer"){
                           ?>
                        <li class="col-md-4"><a href="<?=root?>page/<?=$m->slug_url?>" class="fadeout  waves-effect"><?=$m->page_name?></a>  </li>
                        <?php } }?>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
         <!-- end row -->
         <div class="row my-3">
            <div class="section-block mt-4"></div>
         </div>
         <div class="row align-items-center g-0 mt-4">
            <div class="col-lg-8">
               <div class="term-box footer-item">
                  <ul class="list-items list--items d-flex align-items-center">
                     <?=T::all_rights_reserved?> <?=(app()->app->business_name)?>
                  </ul>
               </div>
            </div>
            <!-- end col-lg-8 -->
            <div class="col-lg-4">
               <div class="footer-social-box float-end">
                  <ul class="social-profile d-flex align-items-center">
                     <?php if (!empty(app()->app->social_facebook)){?>
                     <!-- FACEBOOK -->
                     <li>
                        <a href="<?=app()->app->social_facebook?>" target="_blank">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGQ9Ik0xNy45OTAyMzQ0LDEuNTk1NzAzMWMtMS4wMDg3ODkxLTAuMTA2NzUwNS0yLjAyMjcwNTEtMC4xNTg2MzA0LTMuMDM3MTA5NC0wLjE1NTI3MzRDMTEuNTg5ODQzOCwxLjQ0MDQyOTcsOS41LDMuNTgxOTcwMiw5LjUsNy4wMzAyNzM0djIuMzQwODIwM0g2LjY3NDgwNDdjLTAuMjc2MDAxLTAuMDAwMTgzMS0wLjQ5OTg3NzksMC4yMjM0NDk3LTAuNSwwLjQ5OTQ1MDd2My44NTExMzUzYy0wLjAwMDE4MzEsMC4yNzYwMDEsMC4yMjM0NDk3LDAuNDk5ODE2OSwwLjQ5OTQ1MDcsMC41SDkuNXY3LjcxODc1Yy0wLjAwMDE4MzEsMC4yNzYwMDEsMC4yMjM0NDk3LDAuNDk5ODE2OSwwLjQ5OTQ1MDcsMC41aDMuOTc4MDg4NGMwLjI3NjAwMSwwLjAwMDE4MzEsMC40OTk4MTY5LTAuMjIzNDQ5NywwLjUtMC40OTk0NTA3di03LjcxOTI5OTNoMi44MTY0NjczYzAuMjUxMjIwNy0wLjAwMDA2MSwwLjQ2MzUwMS0wLjE4NjQwMTQsMC40OTYwOTM4LTAuNDM1NTQ2OWwwLjQ5NzA3MDMtMy44NTA1ODU5YzAuMDM1NzA1Ni0wLjI3MzY4MTYtMC4xNTcyMjY2LTAuNTI0NTM2MS0wLjQzMDk2OTItMC41NjAyNDE3Yy0wLjAyMTYwNjQtMC4wMDI4MDc2LTAuMDQzMzM1LTAuMDA0MjExNC0wLjA2NTEyNDUtMC4wMDQyMTE0aC0zLjMxMzUzNzZWNy40MTIxMDk0YzAtMC45Njk3MjY2LDAuMTk1MzEyNS0xLjM3NSwxLjQwODIwMzEtMS4zNzVsMi4wMzkwNjI1LTAuMDAwOTc2NmMwLjI3NjAwMSwwLjAwMDEyMjEsMC40OTk4MTY5LTAuMjIzNDQ5NywwLjUtMC40OTk0NTA3VjIuMDkxNzk2OUMxOC40MjQ4NjU3LDEuODQwODIwMywxOC4yMzkwMTM3LDEuNjI4NjYyMSwxNy45OTAyMzQ0LDEuNTk1NzAzMXogTTE3LjQyNDgwNDcsNS4wMzYxMzI4bC0xLjUzOTA2MjUsMC4wMDA5NzY2Yy0yLjE1ODIwMzEsMC0yLjQwODIwMzEsMS4zNTU0Njg4LTIuNDA4MjAzMSwyLjM3NXYyLjQ1OTA0NTRjLTAuMDAwMTIyMSwwLjI3NTkzOTksMC4yMjM0NDk3LDAuNDk5ODE2OSwwLjQ5OTQ1MDcsMC40OTk5MzloMy4yNDU2NjY1bC0wLjM2ODE2NDEsMi44NTA1ODU5aC0yLjg3Njk1MzFjLTAuMjc2MDAxLTAuMDAwMTIyMS0wLjQ5OTgxNjksMC4yMjM0NDk3LTAuNSwwLjQ5OTQ1MDd2Ny43MTkyOTkzSDEwLjV2LTcuNzE4NzVjMC4wMDAxODMxLTAuMjc2MDAxLTAuMjIzNDQ5Ny0wLjQ5OTgxNjktMC40OTkzODk2LTAuNUg3LjE3NDgwNDd2LTIuODUwNTg1OUgxMGMwLjI3NjAwMSwwLjAwMDE4MzEsMC40OTk4MTY5LTAuMjIzNDQ5NywwLjUtMC40OTk0NTA3VjcuMDMwMjczNGMwLTIuODc0MDIzNCwxLjY2NDk3OC00LjU4OTg0MzgsNC40NTMxMjUtNC41ODk4NDM4YzEuMDA4Nzg5MSwwLDEuOTE5OTIxOSwwLjA1NDY4NzUsMi40NzE2Nzk3LDAuMTAyNTM5MVY1LjAzNjEzMjh6Ii8+PC9zdmc+">
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_twitter)){?>
                     <!-- TWITTER -->
                     <li>
                        <a href="<?=app()->app->social_twitter?>s" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGQ9Ik0yMi41LDMuNTg4ODY3MmMwLjAwMDI0NDEtMC4yNzYxODQxLTAuMjIzNDQ5Ny0wLjUwMDI0NDEtMC40OTk2MzM4LTAuNTAwNDg4M2MtMC4wODk4NDM4LTAuMDAwMDYxLTAuMTc3OTc4NSwwLjAyNDA0NzktMC4yNTUyNDksMC4wNjk4MjQyYy0wLjcwMzg1NzQsMC40MTk0OTQ2LTEuNDY4NDQ0OCwwLjcyNzUzOTEtMi4yNjY2MDE2LDAuOTEzMDg1OWMtMC44NzE2NDMxLTAuODMyNjQxNi0yLjAzMTg2MDQtMS4yOTUzNDkxLTMuMjM3MzA0Ny0xLjI5MTAxNTZjLTIuNjA4OTQ3OCwwLjAwMzIzNDktNC43MjI5MDA0LDIuMTE3Njc1OC00LjcyNTU4NTksNC43MjY1NjI1YzAsMC4xMzQ3NjU2LDAuMDA1ODU5NCwwLjI3MTQ4NDQsMC4wMTg1NTQ3LDAuNDA5MTc5N0M4LjUxMTI5MTUsNy41OTQ1NDM1LDUuNzM3NzMxOSw2LjA5MTk4LDMuODE3MzgyOCwzLjczNTM1MTZjLTAuMTc1MzU0LTAuMjEzOTI4Mi0wLjQ5MDk2NjgtMC4yNDUxNzgyLTAuNzA0ODk1LTAuMDY5ODI0MmMtMC4wNDY3NTI5LDAuMDM4MzMwMS0wLjA4NjE4MTYsMC4wODQ4Mzg5LTAuMTE2Mzk0LDAuMTM3MjA3QzIuNTgxNjA0LDQuNTI2MzY3MiwyLjM2Mzc2OTUsNS4zNDU4MjUyLDIuMzY0MjU3OCw2LjE3OTc0ODVDMi4zNjI5MTUsNy4wOTUwOTI4LDIuNjI3NTYzNSw3Ljk5MTA4ODksMy4xMjU5NzY2LDguNzU4Nzg5MWMtMC4wMTk1MzEyLTAuMDEwNzQyMi0wLjAzOTk3OC0wLjAyMTQ4NDQtMC4wNTk1NzAzLTAuMDMzMjAzMWMtMC4xNTk2MDY5LTAuMDc3ODgwOS0wLjM0ODQ0OTctMC4wNjU5NzktMC40OTcwNzAzLDAuMDMxMjVjLTAuMTU0NjYzMSwwLjEwMDQwMjgtMC4yNDc3NDE3LDAuMjcyNTgzLTAuMjQ3MDcwMywwLjQ1NzAzMTJDMi4zMTgxMTUyLDkuMzMyMDkyMywyLjMyNTMxNzQsOS40NTA1MDA1LDIuMzQzNzUsOS41NjczMjE4YzAuMDk1NzY0MiwxLjMzNTM4ODIsMC43NTczODUzLDIuNTY2Mjg0MiwxLjgxODM1OTQsMy4zODI4NzM1Yy0wLjA5MjU5MDMsMC4wMjY5MTY1LTAuMTc1MTcwOSwwLjA4MDU2NjQtMC4yMzczMDQ3LDAuMTU0Mjk2OWMtMC4xMTMyODEyLDAuMTMxNDA4Ny0wLjE1MDI2ODYsMC4zMTIxOTQ4LTAuMDk3NjU2MiwwLjQ3NzUzOTFjMC40Njg4MTEsMS40NjE3MzEsMS42MjE0NiwyLjYwMjY2MTEsMy4wODc4Mjk2LDMuMDU2NjQwNmMtMS40NzUzNDE4LDAuODI1OTI3Ny0zLjE3NDU2MDUsMS4xNjMwMjQ5LTQuODUzNTE1NiwwLjk2Mjg5MDZjLTAuMjc0MjMxLTAuMDMzNjMwNC0wLjUyMzgwMzcsMC4xNjE0MzgtMC41NTc0MzQxLDAuNDM1NjY4OWMtMC4wMjMzMTU0LDAuMTkwNDI5NywwLjA2NDI3LDAuMzc3MzgwNCwwLjIyNTQ2MzksMC40ODEzMjMyQzMuNzM4NjQ3NSwxOS44MTI0MzksNi4wNzgwMDI5LDIwLjUwMDM2NjIsOC40Njc3NzM0LDIwLjVjNS41NzQ4MjkxLDAuMDYxNzY3NiwxMC40OTM4OTY1LTMuNjM0MTU1MywxMS45ODYzMjgxLTkuMDA1ODU5NGMwLjMzODkyODItMS4xMzc1MTIyLDAuNTExOTAxOS0yLjMxNzkzMjEsMC41MTM2NzE5LTMuNTA0ODgyOGMwLTAuMTIwMTE3MiwwLTAuMjQ1MTE3Mi0wLjAwMjkyOTctMC4zNzIwNzAzQzIyLjAxNjY2MjYsNi41NDc3Mjk1LDIyLjU3MzMwMzIsNS4wODcwOTcyLDIyLjUsMy41ODg4NjcyeiBNMjAuMDc2MTcxOSw3LjEyMjA3MDNjLTAuMDgyMDkyMywwLjA5Njk4NDktMC4xMjQwMjM0LDAuMjIxNzQwNy0wLjExNzE4NzUsMC4zNDg2MzI4YzAuMDA4Nzg5MSwwLjE3Njc1NzgsMC4wMDg3ODkxLDAuMzUyNTM5MSwwLjAwODc4OTEsMC41MTg1NTQ3Yy0wLjAwMjAxNDIsMS4wOTEzMDg2LTAuMTYxMTkzOCwyLjE3NjY5NjgtMC40NzI2NTYyLDMuMjIyNjU2MkMxOC4xNjY4NzAxLDE2LjE4NDU3MDMsMTMuNjEzNzA4NSwxOS42MDY3NTA1LDguNDY3NzczNCwxOS41Yy0xLjUyNTg3ODksMC4wMDA1NDkzLTMuMDM2Mzc3LTAuMzA0NTY1NC00LjQ0MjM4MjgtMC44OTc0NjA5YzEuNjUyNjQ4OS0wLjE4MzM0OTYsMy4yMjA0NTktMC44Mjc2MzY3LDQuNTI0NDE0MS0xLjg1OTM3NWMwLjIxNzIyNDEtMC4xNzA3NzY0LDAuMjU0ODgyOC0wLjQ4NTI5MDUsMC4wODQxMDY0LTAuNzAyNTE0NkM4LjU0MTEzNzcsMTUuOTIyNTQ2NCw4LjQwMDE0NjUsMTUuODUyNDE3LDguMjUsMTUuODQ5NjA5NGMtMS4zMDE0NTI2LTAuMDIwOTM1MS0yLjQ5NjY0MzEtMC43MjI1MzQyLTMuMTQ5NDE0MS0xLjg0ODYzMjhjMC40MjQwNzIzLDAuMDAxMjgxNywwLjg0NjE5MTQtMC4wNTcyNTEsMS4yNTM5MDYyLTAuMTczODI4MWMwLjI2NTI1ODgtMC4wNzYxNzE5LDAuNDE4NTE4MS0wLjM1MjkwNTMsMC4zNDIzNDYyLTAuNjE4MTY0MUM2LjY0NTA4MDYsMTMuMDI4NjI1NSw2LjQ5NjY0MzEsMTIuODkyNDU2MSw2LjMxMjUsMTIuODU2NDQ1M2MtMS40NjM1NjItMC4yOTI2NjM2LTIuNjA4NjQyNi0xLjQzNDY5MjQtMi45MDUyNzM0LTIuODk3NDYwOWMwLjQyNDU2MDUsMC4xMzc1MTIyLDAuODY2NDU1MSwwLjIxNDExMTMsMS4zMTI1LDAuMjI3NTM5MWMwLjIyNjQ0MDQsMC4wMTY4NDU3LDAuNDMyOTIyNC0wLjEyOTQ1NTYsMC40OTIxODc1LTAuMzQ4NjMyOEM1LjI3OTM1NzksOS42MjUsNS4xOTc2OTI5LDkuMzkzMTg4NSw1LjAxMTcxODgsOS4yNjk1MzEyQzMuOTc4NTE1Niw4LjU4MTYwNCwzLjM1OTY4MDIsNy40MjA5NTk1LDMuMzY0MjU3OCw2LjE3OTY4NzVDMy4zNjM5NTI2LDUuNzY3MjExOSwzLjQzMTIxMzQsNS4zNTc0ODI5LDMuNTYzNDc2Niw0Ljk2Njc5NjlDNS43ODA3NjE3LDcuMzYxMDg0LDguODQ1NTIsOC43OTQ2Nzc3LDEyLjEwNDQ5MjIsOC45NjE5MTQxYzAuMTU4MDgxMSwwLjAxNjcyMzYsMC4zMTMyOTM1LTAuMDUxMjA4NSwwLjQwODIwMzEtMC4xNzg3MTA5YzAuMTAwNTg1OS0wLjEyMDcyNzUsMC4xMzg4NTUtMC4yODE0OTQxLDAuMTAzNTE1Ni0wLjQzNDU3MDNjLTAuMDY2MTYyMS0wLjI3NTc1NjgtMC4wOTk5NzU2LTAuNTU4MjI3NS0wLjEwMDU4NTktMC44NDE3OTY5YzAuMDAxOTUzMS0yLjA1Njk0NTgsMS42Njg2NDAxLTMuNzI0MDYwMSwzLjcyNTU4NTktMy43MjY1NjI1YzEuMDI4MzIwMy0wLjAwMjkyOTcsMi4wMTA5ODYzLDAuNDI0NDk5NSwyLjcxMDAyMiwxLjE3ODcxMDljMC4xMTc4NTg5LDAuMTI2MDk4NiwwLjI5MjYwMjUsMC4xODIyNTEsMC40NjE5MTQxLDAuMTQ4NDM3NWMwLjcwOTY1NTgtMC4xMzk1ODc0LDEuMzk5NTk3Mi0wLjM2NTIzNDQsMi4wNTQ2MjY1LTAuNjcxODc1QzIxLjI5NzYwNzQsNS40NTUwMTcxLDIwLjgxMDczLDYuMzk0OTU4NSwyMC4wNzYxNzE5LDcuMTIyMDcwM3oiLz48L3N2Zz4=" />
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_linkedin)){?>
                     <!-- LINKEDIN -->
                     <li>
                        <a href="<?=app()->app->social_linkedin?>" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGQ9Ik03LjUwMDYxMDQsOUM3LjUwMDM2NjIsOSw3LjUwMDE4MzEsOSw3LjUsOWgtNEMzLjIyMzk5OSw4Ljk5OTgxNjksMy4wMDAxODMxLDkuMjIzNDQ5NywzLDkuNDk5Mzg5NkMzLDkuNDk5NjMzOCwzLDkuNDk5ODE2OSwzLDkuNXYxMmMtMC4wMDAxODMxLDAuMjc2MDAxLDAuMjIzNDQ5NywwLjQ5OTgxNjksMC40OTkzODk2LDAuNUMzLjQ5OTYzMzgsMjIsMy40OTk4MTY5LDIyLDMuNSwyMmg0YzAuMjc2MDAxLDAuMDAwMTgzMSwwLjQ5OTgxNjktMC4yMjM0NDk3LDAuNS0wLjQ5OTQ1MDdDOCwyMS41MDAzNjYyLDgsMjEuNTAwMTgzMSw4LDIxLjV2LTEyQzguMDAwMTgzMSw5LjIyMzk5OSw3Ljc3NjU1MDMsOS4wMDAxODMxLDcuNTAwNjEwNCw5eiBNNywyMUg0VjEwaDNWMjF6IE0xOCw5Yy0xLjA4NDgzODksMC4wMDAwNjEtMi4xMzkzNDMzLDAuMzU4MDkzMy0zLDEuMDE4NTU0N1Y5LjVjMC4wMDAxODMxLTAuMjc2MDAxLTAuMjIzNDQ5Ny0wLjQ5OTgxNjktMC40OTkzODk2LTAuNUMxNC41MDAzNjYyLDksMTQuNTAwMTgzMSw5LDE0LjUsOWgtNGMtMC4yNzYwMDEtMC4wMDAxODMxLTAuNDk5ODE2OSwwLjIyMzQ0OTctMC41LDAuNDk5Mzg5NkMxMCw5LjQ5OTYzMzgsMTAsOS40OTk4MTY5LDEwLDkuNXYxMmMtMC4wMDAxODMxLDAuMjc2MDAxLDAuMjIzNDQ5NywwLjQ5OTgxNjksMC40OTk0NTA3LDAuNWMwLjAwMDE4MzEsMCwwLjAwMDM2NjIsMCwwLjAwMDU0OTMsMGg0YzAuMjc2MDAxLDAuMDAwMTgzMSwwLjQ5OTgxNjktMC4yMjM0NDk3LDAuNS0wLjQ5OTQ1MDdjMC0wLjAwMDE4MzEsMC0wLjAwMDM2NjIsMC0wLjAwMDU0OTNWMTZjMC0wLjgyODQzMDIsMC42NzE1Njk4LTEuNSwxLjUtMS41UzE4LDE1LjE3MTU2OTgsMTgsMTZ2NS41Yy0wLjAwMDE4MzEsMC4yNzYwMDEsMC4yMjM0NDk3LDAuNDk5ODE2OSwwLjQ5OTQ1MDcsMC41YzAuMDAwMTgzMSwwLDAuMDAwMzY2MiwwLDAuMDAwNTQ5MywwaDRjMC4yNzYwMDEsMC4wMDAxODMxLDAuNDk5ODE2OS0wLjIyMzQ0OTcsMC41LTAuNDk5NDUwN2MwLTAuMDAwMTgzMSwwLTAuMDAwMzY2MiwwLTAuMDAwNTQ5M1YxNEMyMi45OTY3NjUxLDExLjIzOTkyOTIsMjAuNzYwMDcwOCw5LjAwMzIzNDksMTgsOXogTTIyLDIxaC0zdi01YzAtMS4zODA3MzczLTEuMTE5MjYyNy0yLjUtMi41LTIuNVMxNCwxNC42MTkyNjI3LDE0LDE2djVoLTNWMTBoM3YxLjIwMzEyNWMwLDAuMjEyNDYzNCwwLjEzNDM5OTQsMC40MDE2NzI0LDAuMzM1MDIyLDAuNDcxNjc5N2MwLjIwMDEzNDMsMC4wNzIxNDM2LDAuNDI0MDExMiwwLjAwNzk5NTYsMC41NTU2NjQxLTAuMTU5MTc5N2MxLjM2MjU0ODgtMS43MjY4MDY2LDMuODY2OTQzNC0yLjAyMjAzMzcsNS41OTM3NS0wLjY1OTQyMzhDMjEuNDQ2Mjg5MSwxMS42MTUyMzQ0LDIyLjAwNTMxMDEsMTIuNzc0NzE5MiwyMiwxNFYyMXogTTUuODY3OTgxLDIuMDAxODMxMUM1Ljc1MDM2NjIsMS45OTM1OTEzLDUuNjMyMzI0MiwxLjk5Mjk4MSw1LjUxNDY0ODQsMkM0LjAwNTM3MTEsMS44OTY5MTE2LDIuNjk4MzAzMiwzLjAzNjg2NTIsMi41OTUyMTQ4LDQuNTQ2MTQyNmMtMC4wMDQxNTA0LDAuMDYwNzMtMC4wMDYyMjU2LDAuMTIxNTIxLTAuMDA2MzQ3NywwLjE4MjM3M2MtMC4wMTMwMDA1LDEuNDk2NDYsMS4xODk1NzUyLDIuNzIwMDkyOCwyLjY4NjAzNTIsMi43MzMwOTMzYzAuMDYxMDk2MiwwLjAwMDU0OTMsMC4xMjIxMzEzLTAuMDAxMDM3NiwwLjE4MzEwNTUtMC4wMDQ2Mzg3aDAuMDI4MzIwM2MxLjUwNjQwODcsMC4xMDU0MDc3LDIuODEyOTg4My0xLjAzMDMzNDUsMi45MTgzOTYtMi41MzY3NDMyUzcuMzc0Mzg5NiwyLjEwNzIzODgsNS44Njc5ODEsMi4wMDE4MzExeiBNNS44MzM0MzUxLDYuNDU5ODM4OUM1LjcxNzk1NjUsNi40NzA0NTksNS42MDE2MjM1LDYuNDY5NTQzNSw1LjQ4NjMyODEsNi40NTY5NzAySDUuNDU4MDA3OEM0LjUwMTg5MjEsNi41MzA0NTY1LDMuNjY3Mjk3NCw1LjgxNTAwMjQsMy41OTM4MTEsNC44NTg4ODY3QzMuNTIwMzI0NywzLjkwMjgzMiw0LjIzNTc3ODgsMy4wNjgxNzYzLDUuMTkxODk0NSwyLjk5NDY4OTlDNS4yOTk0Mzg1LDIuOTg2NDUwMiw1LjQwNzQ3MDcsMi45ODgyMjAyLDUuNTE0NjQ4NCwzQzYuNDcwMDMxNywyLjkxMTk4NzMsNy4zMTU5MTgsMy42MTUxMTIzLDcuNDAzOTkxNyw0LjU3MDQ5NTZDNy40OTIwMDQ0LDUuNTI1OTM5OSw2Ljc4ODg3OTQsNi4zNzE4MjYyLDUuODMzNDM1MSw2LjQ1OTgzODl6Ii8+PC9zdmc+">
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_google)){?>
                     <!-- GOOGLE -->
                     <li>
                        <a href="<?=app()->app->social_google?>" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSI+PHBhdGggc3Ryb2tlPSIjMDAwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiIGQ9Ik0xNy4xOSAxNC4xMTVjLS43MjggMi41MS00LjUyIDQuNy04IDIuNTEtMi44MTctMS43NzItMi45MTYtNS4wMy0xLjkxMy02Ljk5NyAxLjAwMi0xLjk2NyA0LjExMi00LjIxMSA4LjQwOS0xLjYzNWwyLjY0NS0yLjU3NmMtMS41MzItMS43LTYuODk2LTQuMDE1LTExLjM2LS44MzEtNS4zMDQgMy43ODItNC40MDUgOS42MDYtMi40MDMgMTIuNjU2IDEuMjM0IDEuODggNC43NCA0LjkwNCAxMC42MTYgMy4zMSA0LjM2OS0xLjE4NiA2LjA0MS02LjA1NyA1Ljc5Mi05Ljg3MmgtOC43OTl2My42MDFoMy4wMDciLz48L3N2Zz4=" />
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_youtube)){?>
                     <!-- YOUTUBE -->
                     <li>
                        <a href="<?=app()->app->social_youtube?>" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGQ9Ik0xNC43OTE5OTIyLDEwLjc3NTM5MDZsLTMuNjY3OTY4OC0yLjExMjMwNDdjLTAuMjE0NTM4Ni0wLjEyMzU5NjItMC40NTc3NjM3LTAuMTg4ODQyOC0wLjcwNTMyMjMtMC4xODkxNDc5QzkuNjM2MjMwNSw4LjQ3MjgzOTQsOS4wMDEwOTg2LDkuMTA2MjYyMiw5LDkuODg4NjcxOXY0LjIyMjY1NjJjLTAuMDAzMDUxOCwwLjUwNTQ5MzIsMC4yNjY5MDY3LDAuOTczMzI3NiwwLjcwNjA1NDcsMS4yMjM2MzI4YzAuMjE1NzU5MywwLjEyNjA5ODYsMC40NjEwNTk2LDAuMTkyODEwMSwwLjcxMDkzNzUsMC4xOTMzNTk0YzAuMjQ4NjU3Mi0wLjAwMTA5ODYsMC40OTI2NzU4LTAuMDY3MDc3NiwwLjcwODAwNzgtMC4xOTE0MDYybDMuNjY2OTkyMi0yLjExMjMwNDdjMC4yMTU5NDI0LTAuMTI0MzI4NiwwLjM5NTIwMjYtMC4zMDM1ODg5LDAuNTE5NTMxMi0wLjUxOTUzMTJDMTUuNzAwOTI3NywxMi4wMjg3NDc2LDE1LjQ2ODMyMjgsMTEuMTY0Nzk0OSwxNC43OTE5OTIyLDEwLjc3NTM5MDZ6IE0xNC4yOTIwNTMyLDEyLjM1NzQyMTlsLTMuNjY1OTU0NiwyLjExMjMwNDdjLTAuMTI5Mzk0NSwwLjA3NTkyNzctMC4yODk2NzI5LDAuMDc1OTI3Ny0wLjQxOTAwNjMsMGMtMC4xMjkwMjgzLTAuMDcyOTM3LTAuMjA4MzEzLTAuMjEwMjA1MS0wLjIwNzAzMTItMC4zNTgzOTg0VjkuODg4NjcxOWMtMC4wMDEyODE3LTAuMTQ4MTkzNCwwLjA3ODAwMjktMC4yODU0NjE0LDAuMjA3MDMxMi0wLjM1ODM5ODRjMC4wNjQ2MzYyLTAuMDM2ODY1MiwwLjEzNzUxMjItMC4wNTY3MDE3LDAuMjExOTE0MS0wLjA1NzYxNzJDMTAuNDkxNjM4Miw5LjQ3MjkwMDQsMTAuNTYyODA1Miw5LjQ5Mjc5NzksMTAuNjI1LDkuNTMwMjczNGwzLjY2NzA1MzIsMi4xMTIzMDQ3YzAuMDY0NDUzMSwwLjAzNjYyMTEsMC4xMTc3OTc5LDAuMDg5OTA0OCwwLjE1NDM1NzksMC4xNTQzNTc5QzE0LjU1ODU5MzgsMTEuOTk0MzIzNywxNC40ODk1MDIsMTIuMjQ1MjM5MywxNC4yOTIwNTMyLDEyLjM1NzQyMTl6IE0xOSw0SDVDMy4zNDM4NzIxLDQuMDAxODMxMSwyLjAwMTgzMTEsNS4zNDM4NzIxLDIsN3YxMGMwLjAwMTgzMTEsMS42NTYxMjc5LDEuMzQzODcyMSwyLjk5ODE2ODksMywzaDE0YzEuNjU2MTI3OS0wLjAwMTgzMTEsMi45OTgxNjg5LTEuMzQzODcyMSwzLTNWN0MyMS45OTgxNjg5LDUuMzQzODcyMSwyMC42NTYxMjc5LDQuMDAxODMxMSwxOSw0eiBNMjEsMTdjLTAuMDAxNDAzOCwxLjEwNDAwMzktMC44OTU5OTYxLDEuOTk4NTk2Mi0yLDJINWMtMS4xMDQwMDM5LTAuMDAxNDAzOC0xLjk5ODU5NjItMC44OTU5OTYxLTItMlY3YzAuMDAxNDAzOC0xLjEwNDAwMzksMC44OTU5OTYxLTEuOTk4NTk2MiwyLTJoMTRjMS4xMDQwMDM5LDAuMDAxNDAzOCwxLjk5ODU5NjIsMC44OTU5OTYxLDIsMlYxN3oiLz48L3N2Zz4=" /> 
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_whatsapp)){?>
                     <!-- WHATSAPP -->
                     <li>
                        <a href="<?=app()->app->social_whatsapp?>" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PGcgZGF0YS1uYW1lPSImbHQ7R3JvdXAmZ3Q7IiBmaWxsPSJub25lIiBzdHJva2U9IiMzMDNjNDIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCI+PHBhdGggZD0iTTEyIC41YTExLjUgMTEuNSAwIDAgMC05LjU0IDE3LjkyTC41IDIzLjVsNS4yMy0xLjg3QTExLjUgMTEuNSAwIDEgMCAxMiAuNVoiIGRhdGEtbmFtZT0iJmx0O1BhdGgmZ3Q7Ii8+PHBhdGggZD0iTTkuNSAxNC41YzEuMyAxLjMgNC4xNyAzIDUuNSAzYTIuNTMgMi41MyAwIDAgMCAyLjUtMnYtMXMtMS4yMy0uNi0yLTEtMiAxLTIgMUE2LjUyIDYuNTIgMCAwIDEgMTEgMTNhNi41MiA2LjUyIDAgMCAxLTEuNS0yLjVzMS40LTEuMjMgMS0yLTEtMi0xLTJoLTFhMi41MyAyLjUzIDAgMCAwLTIgMi41YzAgMS4zMyAxLjcgNC4yIDMgNS41WiIgZGF0YS1uYW1lPSImbHQ7UGF0aCZndDsiLz48L2c+PC9zdmc+" />
                        </a>
                     </li>
                     <?php } ?>
                     <?php if (!empty(app()->app->social_instagram)){?>
                     <!-- INSTAGRAM -->
                     <li>
                        <a href="<?=app()->app->social_instagram?>" target="_blank" class=" waves-effect">
                        <img src="data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48cGF0aCBmaWxsPSJub25lIiBkPSJNNDAxLjcgMTAxLjljLTcuOCAwLTE0LjEgNi4zLTE0LjEgMTQuMXM2LjMgMTQuMSAxNC4xIDE0LjEgMTQuMS02LjMgMTQuMS0xNC4xUzQwOS41IDEwMS45IDQwMS43IDEwMS45ek0yNTYgMTUzYy01Ni44IDAtMTAzIDQ2LjItMTAzIDEwM3M0Ni4yIDEwMyAxMDMgMTAzIDEwMy00Ni4yIDEwMy0xMDNTMzEyLjggMTUzIDI1NiAxNTN6Ii8+PHBhdGggZmlsbD0ibm9uZSIgZD0iTTM5OS41LDI5LjVoLTI4N0M2NC44LDI5LjUsMjYsNjguMywyNiwxMTZ2MjgwYzAsNDcuNywzOC44LDg2LjUsODYuNSw4Ni41aDI4N2M0Ny43LDAsODYuNS0zOC44LDg2LjUtODYuNQ0KCQlWMTE2QzQ4Niw2OC4zLDQ0Ny4yLDI5LjUsMzk5LjUsMjkuNXogTTI1NiwzNzljLTY3LjgsMC0xMjMtNTUuMi0xMjMtMTIzczU1LjItMTIzLDEyMy0xMjNzMTIzLDU1LjIsMTIzLDEyM1MzMjMuOCwzNzksMjU2LDM3OXoNCgkJIE00MDEuNywxNTAuMWMtMTguOCwwLTM0LjEtMTUuMy0zNC4xLTM0LjFzMTUuMy0zNC4xLDM0LjEtMzQuMXMzNC4xLDE1LjMsMzQuMSwzNC4xUzQyMC41LDE1MC4xLDQwMS43LDE1MC4xeiIvPjxwYXRoIGZpbGw9IiMyMzFmMjAiIGQ9Ik0zOTkuNSw5LjVoLTI4N0M1My44LDkuNSw2LDU3LjMsNiwxMTZ2MjgwYzAsNTguNyw0Ny44LDEwNi41LDEwNi41LDEwNi41aDI4N2M1OC43LDAsMTA2LjUtNDcuOCwxMDYuNS0xMDYuNQ0KCQlWMTE2QzUwNiw1Ny4zLDQ1OC4yLDkuNSwzOTkuNSw5LjV6IE00ODYsMzk2YzAsNDcuNy0zOC44LDg2LjUtODYuNSw4Ni41aC0yODdDNjQuOCw0ODIuNSwyNiw0NDMuNywyNiwzOTZWMTE2DQoJCWMwLTQ3LjcsMzguOC04Ni41LDg2LjUtODYuNWgyODdjNDcuNywwLDg2LjUsMzguOCw4Ni41LDg2LjVWMzk2eiIvPjxwYXRoIGZpbGw9IiMyMzFmMjAiIGQ9Ik0yNTYgMTMzYy02Ny44IDAtMTIzIDU1LjItMTIzIDEyM3M1NS4yIDEyMyAxMjMgMTIzIDEyMy01NS4yIDEyMy0xMjNTMzIzLjggMTMzIDI1NiAxMzN6TTI1NiAzNTljLTU2LjggMC0xMDMtNDYuMi0xMDMtMTAzczQ2LjItMTAzIDEwMy0xMDMgMTAzIDQ2LjIgMTAzIDEwM1MzMTIuOCAzNTkgMjU2IDM1OXpNNDAxLjcgODEuOWMtMTguOCAwLTM0LjEgMTUuMy0zNC4xIDM0LjFzMTUuMyAzNC4xIDM0LjEgMzQuMSAzNC4xLTE1LjMgMzQuMS0zNC4xUzQyMC41IDgxLjkgNDAxLjcgODEuOXpNNDAxLjcgMTMwLjFjLTcuOCAwLTE0LjEtNi4zLTE0LjEtMTQuMXM2LjMtMTQuMSAxNC4xLTE0LjEgMTQuMSA2LjMgMTQuMSAxNC4xUzQwOS41IDEzMC4xIDQwMS43IDEzMC4xeiIvPjwvc3ZnPg==">
                        </a>
                     </li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
            <!-- end col-lg-4 -->
         </div>
         <!-- end row -->
      </div>
      <!-- end container -->
      <div class="mt-4"></div>
      
   </div>
</section>
</body>
<script>
   // LOADING ANIMATION FOR HOME SEARCH
   setTimeout( function(){ 
   $('.load_hide').fadeOut(100)
   $('.loadcontent').fadeIn(250)
   }  , 2000 );
</script>
<script src="<?=root?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?=root?>assets/js/app.js"></script>
<script src="<?=root?>assets/js/bootstrap-select.js"></script>
<?php 
   // CHECK IF USER LOGGED AS A ADMIN
   if(isset($_SESSION['phptravels_backend_user'])){
       $admin = (json_decode(base64_decode($_SESSION['phptravels_backend_user'])));
       if($admin->backend_user_login==1){
       ALERT_MSG('admin_logged');
       }
   }   
?>