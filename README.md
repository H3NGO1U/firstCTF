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
This is a full walkthrough for finding the 10 flags in the CTF.
<br>
Trying by yourself before reading it is highly recommended.

### Flag 0 - Examining source code
After heading to the CTF [main page](http://firstctf.atwebpages.com "firstCTF"), we see the following page:

<img width="634" alt="Main page" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/300b53fc-de11-4296-95cc-7d9e1bf1ff12">
<br>
<br>
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
We should check the CSS file of that page, as it is the page responsibe for the style.
<br>
As before, we will look at the source.
<br>
<img width="450" alt="about source" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/ad066128-1135-4914-8ec9-1d4ec0f92cfa">
<br>
We can see there link to the file `a6oUt.css`.
<br>
We will navigate to that page.
<br>
<img width="446" alt="about css" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/720e0fe8-90ff-43a1-8e32-99d60451eefa">
<br>

### Flag 2 - robots.txt
That file is presents in most websites, and its role is to provide search engines crawlers with information
<br>
about which pages they should not access. 
<br>
Putting a page there doesn't necessarily remove it from google search results, and definitely doesn't hide it from unautherized eyes.
<br>
By heading to `http://firstctf.atwebpages.com/robots.txt` we should see the flag, as well as some interesting endpoints we'd like to visit.
<br>

### Flag 3 - query parameter
Let's go to `http://firstctf.atwebpages.com/assets/admin.php`.
<br><img width="250" alt="admin page" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/c13c6f2f-8a19-4fd6-a988-682ebc4f4e4d">
<br>
We hould notice the `admin=no` added in the url (if not - press on the search bar and it should appear).
<br>
If we press the `show secret key` button we will get the message: `Sorry, youre not admin:(((((`.
<br>
The website checked and found out that we are not admins and set this query parameter so it knows
<br>
not to show us the password.
<br>
But it is client side, we can change it to `yes`.
Afterwards press `Enter` and by clicking the `show secret key` button you'll see the code.
<br>
....
<br>
That can't be entered:(
<br>
But if we enter a number that is under 100, we will see another query parameter in the url: `secret_code`
<br>
We can change it to the secret code, and press `Enter`.
Flag should appear:)
<br>

### Flag 4 - directories
When we notice that we are in a directory, we should always check it.
if we try to access 



