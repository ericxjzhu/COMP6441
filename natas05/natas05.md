# Natas 5

Link: http://natas5.natas.labs.overthewire.org/

![Default web page appearance.](../images/natas5/defaultPage.png)

Opening the page we see that we are not allowed access because we are not logged in. After intercepting the request, we see that there is a loggedin cookie.

![BurpSuite with loggedin cookie highlighted.](../images/natas5/burp.png)

By changing the value to 1 and forwarding the request we are given the password.

![Password.](../images/natas5/password.png)

Password: fOIvE0MDtPTgRhqmmvvAOt2EfXR6uQgR