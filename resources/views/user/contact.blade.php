<html>
  <head>
    <title>Google recapcha demo - Codeforgeek</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  </head>
  <body>
    <h1>Google reCAPTHA Demo</h1>
    <form id="contactus_form" name="contactus_form" action="/recapcha-page" method="post">
        @csrf
      <input type="email" name="email" placeholder="Type your email" size="40"><br><br>
      <textarea name="comment" rows="8" cols="39"></textarea><br><br>
      <input type="button" id="contact_submit" name="submit" value="Post comment"><br><br>
      <div class="g-recaptcha" data-sitekey="{{ RECAPCHA_SITE_KEY }}"></div>
    </form>
  </body>
</html>