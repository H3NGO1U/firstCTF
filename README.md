# First CTF!
Welcome to FirstCTF!
<br>
A web CTF for absolute beginners.
<br>
Check it out [here](http://firstctf.atwebpages.com "firstCTF")
<br>
## Prior knowledge
No prior knowledge is required.
<br>
If you struggle, check out the full walkthrough down below.
<br>
## Vulnerabilities
This CTF includes:
* Examining source code
* robots.txt
* Query parameters
* Redirection
* HTTP headers
* SQL injection
* IDOR
* Cookies manipulation

## Walkthrough
After heading to the CTF [main page](http://firstctf.atwebpages.com "firstCTF"), we see the following page:

<img width="634" alt="Main page" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/300b53fc-de11-4296-95cc-7d9e1bf1ff12">
<br>
<br>

### Flag 0 - Examining source code
To look at the source we press `ctrl U` or right click -> View Page Source.
<br>
Alternatively, we can [inspect](https://zapier.com/blog/inspect-element-tutorial) the webpage.
<br>
We will focues on the script the checks if the code entered is correct or not:
<br>
<code>function check(){
            your_pass = document.getElementById("secret_code").value;
            if(your_pass=="firstCTF{0_Gr3At_j0b3__aDfeT23V^4}"){
                alert("Great job!");
                window.location.replace("home.html");
            }
            else
                alert("No.......");
        }</code>
  <br>
  Here's our flag!
  <br>
  We can enter `firstCTF{0_Gr3At_j0b3__aDfeT23V^4}`, or we can type in the url `http://firstctf.atwebpages.com/home.html`.
  <br>
  As observed, this is the page toward which we are navigating, and the app suffers from [Broken Access Control](https://owasp.org/Top10/A01_2021-Broken_Access_Control).
### Submiting flags!
In the main page, we have a `Submit Flag` button, there you can sign up and collect the flags.
<br>
Can be found also [here](http://firstctf-flag-collector.rf.gd/).
<br>
### Flag 1 - Examining assets
If we close the announcement in the home page, we see that we are invited to check the about page.
<br>
<br><img width="337" alt="About" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/3e859495-2594-40e5-93d0-64edf2b03891">
<br>
We should check the CSS file of that page, as it is the page responsibe for the style

