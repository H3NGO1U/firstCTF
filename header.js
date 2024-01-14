var header = document.getElementById("header-comp");
header.innerHTML=`
<div id="header">
<a><img src="hacking.webp" alt="Logo"></a>
<div id="links">
    <a class="link" href="http://firstctf-flag-collector.rf.gd" target="_blank">Submit Flag</a>
    <a class="link" href="home.html">Home</a>
    <a class="link" href="about.html">About</a>
    <a class="link" href="login_page.php">Login</a>
</div>
</div>


<style>
body{
    margin:0;
}
#header{
    display: flex;
    justify-content: space-between;
    background-color: #c9f4f4;
    border-bottom:1px solid black;
    padding:0 10px;
}
img{
    height:50px;
}
#links{
    display: flex;
    margin-top:0;
}
.link{
    padding:10px;
    font:20px monospace;
    text-decoration: none;
    border-left:2px solid #a2d1d1;
    text-align: center;
    color:black;
}
.link:hover{
    background-color:#77c7c7 ;
}
</style>
`