<div class="container">
        <div class="navbar">
            <img src="kasteel-logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="index2.php">test site</a></li>
                </ul>
            </nav>
            <img src="menu.png" class="menu-icon">
        </div>
    </div>
<style>
  nav {
text-align: right;
flex: 1;
}
.container{
    width: 100%;
    height: 100vh;
    background-position: center;
    background-color: gray;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}
.navbar{
    height: 12%;
    display: flex;
    align-items: center;
    
}

.logo{
    width: 50px;
    cursor: pointer;
}

.menu-icon{
    width: 30px;
    cursor: pointer;
    margin-left: 40px;
    color: red;

}
nav ul li {
    list-style: none;
    display: inline-block;
    margin-left: 60px;
    color: red;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 13px;
    color: red;
}
</style>