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
<br>
if we try to access `http://firstctf.atwebpages.com/assets/`, we will find another flag.
<br>

### Flag 5 - using devtools
Rememver the `portal.php` endpoint we discovered in the robots.txt file?
<br>
If you try to access it, you will be redirected to `redirect.html`.

<img width="428" alt="redirect" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/5b5a85e3-3288-4dca-8ee3-1d57c35e9274">

We should check the redirection using the `network` tab in devtools, which is prebuilt in any browser.
<br>
Open it and try once again to access `portal.php`.
<br>
You should see something like this:
<br><img width="437" alt="devtools" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/95564cf0-9983-4ff8-b22c-b8ca00838186">
<br>
The request to `portal.php` has a status code of 302: indicates redirection.
<br>
By pressing this request we should see the headers, which are additional information regarding the request.
<br>
One of the headers is especially interesting:)
<br>

### Flag 6 - SQL injection
SQL is a language for communicating with databases.
<br>
If we had to the login page and, for example, enter `username=admin` and `password=1234`,
<br>
the sql code that is generated is typically:
<br>
`SELECT * FROM users WHERE username='admin' AND password='1234'`
<br>
As in other programming languages, it is possible to make comments in sql - 
<br>
the text in the comments is not part of the code and used, for example, for documentation.
<br>
Comments in sql are done with `--`, and in mysql **followed by a space**.
<br>
So, what happens if we enter `username=admin'-- ` and `password=1234`?
<br>
If the app is vulnerable to sql injection, we get the following sql query:
<br>
`SELECT * FROM users WHERE username='admin'-- ' AND password='1234'`
<br>
Meaning, all the part coming after the username check is **not** part of query, but a comment!
<br>
This way we can log in to `admin`'s account without knowing his password.
<br>
<br>
So in the ctf, just use a username you know is present in the database.
<br>
That information was given in the `home.html` page.
<br>
If we enter `username=cArlos193'-- ` and `password=1234` (password can be anything, just not empty)
<br>
we should be able to login and see the flag.
<br>

### Flag 7 - IDOR
After being redirected to `http://firstctf.atwebpages.com/profile.php?id=1`,
<br>
we can notice the `id` query parameter.
<br>
We, as being logged in to `carlos`'s account, should be able to see only his profile.
<br>
What if we can change the `id` parameter?
<br>
And indeed if you change it to  `id=2` you'll see other user's profile page.
<br>
This vulnerabilty is called [Insecure direct object references](https://portswigger.net/web-security/access-control/idor).
<br>
The flag appear in the avatar of the other user, just use an [image to text](https://www.imagetotext.info/) tool to grab it.
<br>

### Flag 8 - Cookies
[Cookies](https://www.kaspersky.com/resource-center/definitions/cookies) are small text files with some info to send to the server with each request.
<br>
They are stored client side and can be easily manipulated by him, so information that we don't want 
<br>
the client to mess with should not be stored there.
<br>
We see that we are not premium.
<br>
Let's take a look at the cookies, for example by heading to `storage` or `Application` tab in `devtools` (depends on your browser).
<br>
<img width="451" alt="cookies" src="https://github.com/H3NGO1U/firstCTF/assets/100107865/8c0ba1d4-8c45-4e01-80dd-40a31088aa87">
<br>
We can change the value in `premium` to yes, and refresh the page.
<br>
Flag should appear.
<br>

### Flag 9 - hidden
The flag is there, in hidden html tag.
<br>
This tag and its contents don't appear in the page, but can be easily viewed in the source code:)
<br>
<br>

## What next?
After solving this CTF, you can without problems solve the following challenges in [picoCTF](https://play.picoctf.org/practice):
* Inspect HTML
* Includes
* Insp3ct0r
* where are the robots
* Power Cookie
* dont-use-client-side
* sqlilite
* Irish-Name-Repo 1
* Irish-Name-Repo 2
* Local Authority
* Secrets
* Cookies
<br>
  <br>
And then move to other challenges, that might require some research.
<br>
I highly recommend as well using [portswigger academy](https://portswigger.net/web-security/all-topics).
<br>
It's absolutely free, and the majority of the labs can be solved with BurpSuite community, which is a great, free tool for pentesting.
<br>
<br>
*Thanks for reading, good luck with your Cyber Security journey!*

